import { execFileSync } from "node:child_process";
import { media } from "../media.mjs";

// Explicit --remote is required to touch Cloudflare; default is local preview data.
const remote = process.argv.includes("--remote");
for (const { key, contentType } of media) {
  execFileSync(process.execPath, [
    "node_modules/wrangler/bin/wrangler.js", "r2", "object", "put",
    `allenpike-com-media/${key}`, "--file", key,
    "--content-type", contentType, remote ? "--remote" : "--local",
  ], { stdio: "inherit" });
}
