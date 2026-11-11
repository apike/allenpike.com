import assert from "node:assert/strict";
import { readFile } from "node:fs/promises";

// Run after both builds. Hosting changes must not alter subscriber identities,
// dates, links, or feed bodies used by RSS readers and the mailing list.
for (const path of ["feed/index.html", "atom/index.html", "feed.json"]) {
  assert.deepEqual(
    await readFile(`.cloudflare/site/${path}`),
    await readFile(`_site/${path}`),
    `Cloudflare feed differs from the standard build: ${path}`,
  );
}
console.log("All three Cloudflare feeds match the standard build byte for byte.");
