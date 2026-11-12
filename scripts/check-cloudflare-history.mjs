import { mkdtemp, cp, mkdir, symlink, readFile, writeFile, rm } from "node:fs/promises";
import { tmpdir } from "node:os";
import { join, dirname } from "node:path";
import { execFileSync } from "node:child_process";
import assert from "node:assert/strict";

// Expand feeds only in an isolated copy; never publish full-history test feeds.
const root = await mkdtemp(join(tmpdir(), "allenpike-feed-history-"));
try {
  const paths = execFileSync("git", ["ls-files", "-co", "--exclude-standard", "-z"], { encoding: "utf8" })
    .split("\0").filter(Boolean);
  for (const path of new Set(paths)) {
    await mkdir(dirname(join(root, path)), { recursive: true });
    await cp(path, join(root, path));
  }
  await symlink(join(process.cwd(), "node_modules"), join(root, "node_modules"), "dir");
  for (const path of ["feed/index.html", "atom/index.html", "feed.json.liquid"]) {
    const source = await readFile(join(root, path), "utf8");
    assert.ok(source.includes("collections.posts limit:3"), `Unexpected feed loop: ${path}`);
    await writeFile(join(root, path), source.replace("collections.posts limit:3", "collections.posts"));
  }
  for (const script of ["build", "build:cloudflare", "check:cloudflare-feeds"]) {
    execFileSync("pnpm", ["run", script], { cwd: root, stdio: "pipe" });
  }
  const feed = JSON.parse(await readFile(join(root, "_site/feed.json"), "utf8"));
  assert.ok(feed.items.length > 400, "Full-history feed was unexpectedly truncated");
  assert.equal(new Set(feed.items.map(item => item.id)).size, feed.items.length);
  for (const item of feed.items) {
    const path = item.id;
    assert.ok(path.startsWith("/") && !path.endsWith("/"), `Historical post ID changed: ${path}`);
    const html = await readFile(join(root, `.cloudflare/site${path}.html`), "utf8");
    assert.ok(html.includes(`<h1><a href="${path}">`), `Post title link is not slashless: ${path}`);
    const og = /<meta property="og:url" content="([^"]+)"/.exec(html);
    if (og) assert.equal(og[1], `https://allenpike.com${path}`);
  }
  console.log(`All three full-history feeds are byte-identical: ${feed.items.length} unique post identities.`);
  console.log(`All ${feed.items.length} posts have flat output and slashless title links/metadata.`);
} finally {
  await rm(root, { recursive: true, force: true });
}
