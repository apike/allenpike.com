import assert from "node:assert/strict";
import { execFileSync } from "node:child_process";
import { mkdtemp, readFile, rm } from "node:fs/promises";
import { tmpdir } from "node:os";
import { join } from "node:path";

const [command, ...args] = process.argv.slice(2);
assert.ok(["deploy", "preview"].includes(command), "Expected deploy or preview");
const runNodeScript = (script, args = [], options = {}) => execFileSync(process.execPath,
  [script, ...args], { stdio: "inherit", ...options });

// pnpm deploy:cloudflare / preview:cloudflare build the site before calling this.
const directory = await mkdtemp(join(tmpdir(), "allenpike-deploy-"));
try {
  // 1. Deploy using Wrangler. Its JSON-lines output identifies the new deployment
  // without scraping terminal messages or guessing a preview hostname.
  const output = join(directory, "wrangler.jsonl");
  runNodeScript("node_modules/wrangler/bin/wrangler.js", [command, ...args], {
    env: { ...process.env, WRANGLER_OUTPUT_FILE_PATH: output },
  });
  const records = (await readFile(output, "utf8")).trim().split("\n").map(JSON.parse);
  const result = records.findLast(record => record.type === command);
  // Wrangler uses different field names for deploy and preview results.
  const urls = command === "preview" ? result?.deployment_urls : result?.targets;
  const origin = urls?.find(url => typeof url === "string" && /^https:\/\/[^/]+\.workers\.dev\/?$/.test(url));
  assert.ok(origin, "Wrangler did not report a workers.dev deployment URL; cannot verify deployment");
  // 2. Exercise the deployed site.
  // Failure marks CI failed, but does not roll back the already-live deployment.
  console.log(`Verifying deployed site: ${origin}`);
  runNodeScript("cloudflare/tests/hosting.mjs", [origin]);
} finally {
  await rm(directory, { recursive: true, force: true });
}
