import Eleventy from "@11ty/eleventy";
import { rm, stat, readdir } from "node:fs/promises";

const output = "_site";
await rm(output, { recursive: true, force: true });
await new Eleventy(".", output, { source: "cli" }).write();
// Cloudflare rejects static assets over 25 MiB; fail here with a clear message.
for (const path of await readdir(output, { recursive: true })) {
  const info = await stat(`${output}/${path}`);
  if (info.isFile() && info.size > 25 * 1024 * 1024) {
    throw new Error(`Static asset exceeds 25 MiB; compress it or host it elsewhere: ${path}`);
  }
}
