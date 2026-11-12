import assert from "node:assert/strict";
import { mkdtemp, readFile, rm } from "node:fs/promises";
import { tmpdir } from "node:os";
import { join } from "node:path";
import { createHash } from "node:crypto";
import { execFileSync } from "node:child_process";
import { media } from "../media.mjs";

// Read the private bucket directly before deployment, not a cached public URL.
// Missing credentials/objects or changed bytes must stop deployment.
const directory = await mkdtemp(join(tmpdir(), "allenpike-r2-check-"));
const digest = bytes => createHash("sha256").update(bytes).digest("hex");
try {
  for (const { key } of media) {
    const target = join(directory, "object");
    execFileSync(process.execPath, [
      "node_modules/wrangler/bin/wrangler.js", "r2", "object", "get",
      `allenpike-com-media/${key}`, "--remote", "--file", target,
    ], { stdio: "inherit" });
    const remoteHash = digest(await readFile(target));
    const originalHash = digest(await readFile(key));
    assert.equal(remoteHash, originalHash,
      `R2 object differs from the repository original: ${key}`);
    await rm(target);
    console.log(`PASS R2 SHA-256 ${key}`);
  }
} finally {
  await rm(directory, { recursive: true, force: true });
}
