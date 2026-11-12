import assert from "node:assert/strict";
import { execFileSync } from "node:child_process";
import { mkdtemp, readFile, rm } from "node:fs/promises";
import { tmpdir } from "node:os";
import { join } from "node:path";

const [command, ...args] = process.argv.slice(2);
assert.ok(["deploy", "preview"].includes(command), "Expected deploy or preview");
const run = (script, args = [], options = {}) => execFileSync(process.execPath,
  [script, ...args], { stdio: "inherit", ...options });

run("scripts/check-cloudflare-media.mjs");
const directory = await mkdtemp(join(tmpdir(), "allenpike-deploy-"));
try {
  const output = join(directory, "wrangler.jsonl");
  run("node_modules/wrangler/bin/wrangler.js", [command, ...args], {
    env: { ...process.env, WRANGLER_OUTPUT_FILE_PATH: output },
  });
  const records = (await readFile(output, "utf8")).trim().split("\n").map(JSON.parse);
  const result = records.findLast(record => record.type === command);
  const urls = command === "preview" ? result?.deployment_urls : result?.targets;
  const origin = urls?.find(url => typeof url === "string" && /^https:\/\/[^/]+\.workers\.dev\/?$/.test(url));
  assert.ok(origin, "Wrangler did not report a workers.dev deployment URL; cannot verify deployment");
  console.log(`Verifying deployed site: ${origin}`);
  run("scripts/test-hosting.mjs", [origin]);
} finally {
  await rm(directory, { recursive: true, force: true });
}
