import Eleventy from "@11ty/eleventy";
import { readFile, writeFile, rm, stat, readdir } from "node:fs/promises";
import { media } from "../cloudflare/media.mjs";

const output = ".cloudflare/site";
await rm(output, { recursive: true, force: true });
await new Eleventy(".", output, {
  source: "cli",
  config: config => config.addGlobalData("cloudflareBuild", true),
}).write();
const canonical = value => value.replace(/^(https?:\/\/(?:www\.)?allenpike\.com\/.+)\/$/, "$1");

// Keep the Netlify build intact while translating its redirect semantics.
const redirects = (await readFile("_redirects", "utf8"))
  .split("\n")
  .filter((line) => line.trim() && !line.trim().startsWith("#"))
  .flatMap((line) => {
    const [source, destination, code = "301"] = line.trim().split(/\s+/);
    const status = code.replace(/!$/, "");
    const rules = [`${source} ${canonical(destination)} ${status}`];
    // Netlify matches both trailing-slash forms; Cloudflare matches literally.
    if (!source.includes("*") && source !== "/") {
      const alias = source.endsWith("/") ? source.slice(0, -1) : `${source}/`;
      rules.push(`${alias} ${canonical(destination)} ${status}`);
    }
    return rules;
  });
// Preserve the Atom subscription URL and directory-relative legacy images.
for (const path of ["/atom", "/images/461"]) {
  redirects.push(`${path} ${path}/ 301`, `${path}/ ${path} 200`);
}
await writeFile(`${output}/_redirects`, redirects.join("\n") + "\n");
// Keep staging and PR previews out of search results without changing the blog.
await writeFile(`${output}/_headers`,
  "https://:version.:subdomain.workers.dev/*\n  X-Robots-Tag: noindex\n");

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
