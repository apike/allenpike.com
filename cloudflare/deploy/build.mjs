import Eleventy from "@11ty/eleventy";
import { rm, stat, readdir } from "node:fs/promises";
import { media } from "../media.mjs";

const output = "_site";
await rm(output, { recursive: true, force: true });
await new Eleventy(".", output, { source: "cli" }).write();
// R2 serves oversized media at their original URLs; omit them from static assets.
for (const { key } of media) {
  await stat(`${output}/${key}`); // Missing originals should fail the build.
  await rm(`${output}/${key}`);
}
for (const path of await readdir(output, { recursive: true })) {
  const info = await stat(`${output}/${path}`);
  if (info.isFile() && info.size > 25 * 1024 * 1024) {
    throw new Error(`Static asset exceeds 25 MiB; add an R2 route before deployment: ${path}`);
  }
}
console.log("Cloudflare assets prepared. R2 originals must be uploaded separately before deployment.");
