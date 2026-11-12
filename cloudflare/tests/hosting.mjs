import assert from "node:assert/strict";
import { readFile } from "node:fs/promises";
import { media } from "../media.mjs";

// Build locally from the deployed commit first. Requests never follow redirects,
// so a redirect to production cannot accidentally make a preview test pass.
if (!process.argv[2]) {
  console.error("Usage: pnpm test:hosting <https://deployment-url>");
  process.exit(1);
}
const base = new URL(process.argv[2]);
assert.ok(["https:", "http:"].includes(base.protocol));
assert.equal(base.pathname, "/", "Supply the deployment origin, without a path");
const preview = base.hostname.endsWith(".workers.dev");
let passed = 0;
let failed = 0;
async function check(name, run) {
  try {
    await run();
    passed++;
    console.log(`PASS ${name}`);
  } catch (error) {
    failed++;
    console.error(`FAIL ${name}: ${error.message}`);
  }
}
async function request(path, options = {}) {
  const response = await fetch(new URL(path, base), {
    ...options, redirect: "manual", signal: AbortSignal.timeout(30_000),
  });
  const body = Buffer.from(await response.arrayBuffer());
  return { response, body };
}

// These expectations intentionally describe existing public URL contracts,
// independently of the Cloudflare redirect configuration.
for (const [paths, location, status] of [
  [["/461/project", "/461/project/", "/461", "/461/"], "https://allenpike.com/modeling-plants-with-l-systems", 301],
  [["/antipode", "/antipode/"], "https://allenpike.com/feed", 301],
  [["/archives", "/archives/"], "https://allenpike.com/archive", 301],
  [["/subscribe", "/subscribe/"], "https://allenpike.com/follow", 301],
  [["/feed", "/feed/", "/feed/old"], "https://feeds.allenpike.com/feed/", 302],
]) {
  for (const path of paths) await check(`redirect ${path}`, async () => {
    const { response } = await request(path);
    assert.equal(response.status, status);
    assert.equal(response.headers.get("location"), location);
  });
}

for (const [path, file, contentType] of [
  ["/", "index.html", "text/html"],
  ["/archive", "archive/index.html", "text/html"],
  ["/2026/gravity-of-cross-platform-apps", "2026/gravity-of-cross-platform-apps/index.html", "text/html"],
  ["/atom/", "atom/index.html", null],
  ["/feed.json", "feed.json", "application/json"],
  ["/robots.txt", "robots.txt", "text/plain"],
  ["/css/main2.css", "css/main2.css", "text/css"],
  ["/favicon.ico", "favicon.ico", null],
]) await check(`content ${path}`, async () => {
  const { response, body } = await request(path);
  assert.equal(response.status, 200);
  if (contentType) assert.ok(response.headers.get("content-type")?.startsWith(contentType));
  assert.deepEqual(body, await readFile(`_site/${file}`), "Response differs from the local build");
  if (preview) assert.match(response.headers.get("x-robots-tag") ?? "", /noindex/);
});

await check("sitemap entries", async () => {
  const { response, body } = await request("/sitemap.xml");
  assert.equal(response.status, 200);
  // Eleventy's collection enumeration order can differ between OSes/builds.
  const entries = (xml) => [...xml.matchAll(/<url>[\s\S]*?<\/url>/g)].map(([entry]) => entry).sort();
  const expected = entries(await readFile("_site/sitemap.xml", "utf8"));
  assert.ok(expected.length > 0);
  assert.deepEqual(entries(body.toString()), expected);
});
for (const path of ["/2026/gravity-of-cross-platform-apps", "/archive", "/me", "/series/tech"]) {
  for (const suffix of ["/", ".html", "/index.html"]) await check(`slashless redirect ${path}${suffix}`, async () => {
    const { response } = await request(`${path}${suffix}?source=smoke`);
    assert.equal(response.status, 307);
    assert.equal(new URL(response.headers.get("location"), base).href,
      new URL(`${path}?source=smoke`, base).href);
    const { response: destination } = await request(path);
    assert.equal(destination.status, 200, "Redirect target must serve directly");
  });
}
await check("legacy directory and relative image", async () => {
  const { response, body } = await request("/images/461/");
  assert.equal(response.status, 200);
  assert.ok(body.toString().includes('aq.jpg'));
  const { response: image } = await request("/images/461/aq.jpg");
  assert.equal(image.status, 200);
  assert.ok(image.headers.get("content-type").startsWith("image/"));
});
await check("custom 404", async () => {
  const { response, body } = await request("/__hosting_smoke_test_missing__");
  assert.equal(response.status, 404);
  assert.deepEqual(body, await readFile("_site/404.html"));
});

for (const { key, contentType } of media) await check(`R2 ${key}`, async () => {
  const original = await readFile(key);
  const { response: head, body } = await request(`/${key}`, { method: "HEAD" });
  assert.equal(head.status, 200);
  assert.equal(body.length, 0);
  assert.equal(Number(head.headers.get("content-length")), original.length);
  assert.equal(head.headers.get("content-type"), contentType);
  assert.equal(head.headers.get("accept-ranges"), "bytes");
  assert.ok(head.headers.get("etag"));
  for (const [range, start, end] of [
    ["bytes=0-99", 0, 99],
    ["bytes=-100", original.length - 100, original.length - 1],
  ]) {
    const { response, body: bytes } = await request(`/${key}`, { headers: { Range: range } });
    assert.equal(response.status, 206);
    assert.equal(response.headers.get("content-range"), `bytes ${start}-${end}/${original.length}`);
    assert.deepEqual(bytes, original.subarray(start, end + 1));
  }
  const { response: cached, body: empty } = await request(`/${key}`, {
    headers: { "If-None-Match": head.headers.get("etag") },
  });
  assert.equal(cached.status, 304);
  assert.equal(empty.length, 0);
});
console.log(`\n${passed} passed, ${failed} failed against ${base.origin}`);
process.exitCode = failed ? 1 : 0;
