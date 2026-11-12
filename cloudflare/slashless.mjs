import { readFile, writeFile, readdir, rename, access } from "node:fs/promises";

// Feed endpoints keep their historical paths. Legacy asset directories use
// relative resources and must retain directory-style URL resolution.
const preserve = (path) => /^(feed|atom|admin|images|slides)(\/|$)/.test(path);

export async function prepareSlashless(output) {
  const files = await readdir(output, { recursive: true });
  const pages = files.filter(path => path.endsWith("/index.html") && !preserve(path));
  const urls = new Set(pages.map(path => `/${path.slice(0, -"/index.html".length)}`));
  const canonical = (value) => {
    const match = /^(https?:\/\/(?:www\.)?allenpike\.com)?(\/[^?#]*)([?#].*)?$/.exec(value);
    if (!match) return value;
    const path = match[2].replace(/(?:\/index\.html|\/index|\.html|\/)$/, "");
    return urls.has(path) ? `${match[1] ?? ""}${path}${match[3] ?? ""}` : value;
  };

  for (const path of pages) {
    const target = `${output}/${path.slice(0, -"/index.html".length)}.html`;
    try {
      await access(target);
      throw new Error(`Slashless output collides with an existing file: ${target}`);
    } catch (error) {
      if (error.code !== "ENOENT") throw error;
    }
    await rename(`${output}/${path}`, target);
  }
  // Rewrite only URL attributes in rendered HTML, never prose or feed bodies.
  for (const path of await readdir(output, { recursive: true })) {
    if (!path.endsWith(".html") || preserve(path)) continue;
    const original = await readFile(`${output}/${path}`, "utf8");
    const updated = original.replace(/\b(href|src|action|content)=(['"])(.*?)\2/g,
      (attribute, name, quote, value) => `${name}=${quote}${canonical(value)}${quote}`);
    if (original !== updated) await writeFile(`${output}/${path}`, updated);
  }
  const sitemap = await readFile(`${output}/sitemap.xml`, "utf8");
  await writeFile(`${output}/sitemap.xml`, sitemap.replace(/<loc>(.*?)<\/loc>/g,
    (_, value) => `<loc>${canonical(value)}</loc>`));
  console.log(`Prepared ${urls.size} slashless content pages; feed and asset directories preserved.`);
  return canonical;
}
