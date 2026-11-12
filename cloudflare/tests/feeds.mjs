import assert from "node:assert/strict";
import { execFileSync } from "node:child_process";
import { cp, mkdir, mkdtemp, readFile, rm, symlink, writeFile } from "node:fs/promises";
import { tmpdir } from "node:os";
import { dirname, join } from "node:path";

// Migration regression baseline: the main commit before Cloudflare work began.
// This old build exists only in a temporary test directory, not as a supported
// deployment target. Do not refresh the baseline to make a feed regression pass.
const baselineCommit = "9a1e55027ee7de2f7323c7abfe0e4bde86a4d38b";
const fullHistory = process.argv.includes("--full-history");
const repository = process.cwd();
const temporary = await mkdtemp(join(tmpdir(), "allenpike-feed-test-"));
const baseline = join(temporary, "baseline");
let current = repository;

async function expandFeeds(directory) {
  for (const file of ["feed/index.html", "atom/index.html", "feed.json.liquid"]) {
    const path = join(directory, file);
    const source = await readFile(path, "utf8");
    assert.ok(source.includes("collections.posts limit:3"), `Unexpected feed loop: ${file}`);
    await writeFile(path, source.replace("collections.posts limit:3", "collections.posts"));
  }
}
function runNode(directory, script) {
  execFileSync(process.execPath, [script], { cwd: directory, stdio: "pipe" });
}

try {
  // Build the actual pre-migration source using the installed dependencies.
  await mkdir(baseline);
  const archive = join(temporary, "baseline.tar");
  execFileSync("git", ["archive", baselineCommit, "--output", archive]);
  execFileSync("tar", ["-xf", archive, "-C", baseline]);
  await symlink(join(repository, "node_modules"), join(baseline, "node_modules"), "dir");

  if (fullHistory) {
    // Expand feeds in an isolated working-copy snapshot, never in deploy output.
    current = join(temporary, "current");
    const paths = execFileSync("git", ["ls-files", "-co", "--exclude-standard", "-z"], { encoding: "utf8" })
      .split("\0").filter(Boolean);
    for (const path of new Set(paths)) {
      await mkdir(dirname(join(current, path)), { recursive: true });
      try {
        await cp(path, join(current, path));
      } catch (error) {
        if (error.code !== "ENOENT") throw error; // Unstaged tracked deletion.
      }
    }
    await symlink(join(repository, "node_modules"), join(current, "node_modules"), "dir");
    await expandFeeds(baseline);
    await expandFeeds(current);
    runNode(current, "cloudflare/deploy/build.mjs");
  }
  runNode(baseline, "node_modules/@11ty/eleventy/cmd.cjs");

  for (const file of ["feed/index.html", "atom/index.html", "feed.json"]) {
    assert.deepEqual(await readFile(join(current, "_site", file)),
      await readFile(join(baseline, "_site", file)), `Feed changed from pre-migration baseline: ${file}`);
  }
  const feed = JSON.parse(await readFile(join(current, "_site/feed.json"), "utf8"));
  if (fullHistory) {
    assert.ok(feed.items.length > 400, "Full-history feed was unexpectedly truncated");
    assert.equal(new Set(feed.items.map(item => item.id)).size, feed.items.length);
    for (const { id } of feed.items) {
      const html = await readFile(join(current, `_site${id}/index.html`), "utf8");
      assert.ok(html.includes(`<h1><a href="${id}">`), `Post title link is not slashless: ${id}`);
      const og = /<meta property="og:url" content="([^"]+)"/.exec(html);
      if (og) assert.equal(og[1], `https://allenpike.com${id}`);
    }
  }
  console.log(`All three feeds match the pre-migration baseline byte for byte (${feed.items.length} posts).`);
} finally {
  await rm(temporary, { recursive: true, force: true });
}
