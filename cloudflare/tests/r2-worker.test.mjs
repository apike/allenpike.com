import { after, before, test } from "node:test";
import assert from "node:assert/strict";
import { Miniflare } from "miniflare";
import { media } from "../media.mjs";

let mf;
let etag;
const path = `/${media[0].key}`;
const fetch = (pathname = path, init) => mf.dispatchFetch(`https://example.com${pathname}`, init);

before(async () => {
  mf = new Miniflare({
    modules: true,
    scriptPath: "cloudflare/r2-worker.mjs",
    compatibilityDate: "2026-04-26",
    r2Buckets: ["MEDIA"],
    serviceBindings: { ASSETS: () => new Response("static") },
  });
  const bucket = await mf.getR2Bucket("MEDIA");
  const object = await bucket.put(media[0].key, "0123456789");
  etag = object.httpEtag;
});
after(async () => { await mf?.dispose(); });

test("streams media with its original URL, type, and size", async () => {
  const response = await fetch();
  assert.equal(response.status, 200);
  assert.equal(response.headers.get("content-type"), "video/mp4");
  assert.equal(response.headers.get("content-length"), "10");
  assert.equal(await response.text(), "0123456789");
});
test("supports video seeking, open-ended ranges, and suffix ranges", async () => {
  for (const [range, expected, contentRange] of [
    ["bytes=2-5", "2345", "bytes 2-5/10"],
    ["bytes=8-", "89", "bytes 8-9/10"],
    ["bytes=-3", "789", "bytes 7-9/10"],
    ["bytes=8-100", "89", "bytes 8-9/10"],
    ["bytes=-100", "0123456789", "bytes 0-9/10"],
  ]) {
    const response = await fetch(path, { headers: { Range: range } });
    assert.equal(response.status, 206);
    assert.equal(response.headers.get("content-range"), contentRange);
    assert.equal(await response.text(), expected);
  }
});
test("HEAD reports full size without a body", async () => {
  const response = await fetch(path, { method: "HEAD" });
  assert.equal(response.status, 200);
  assert.equal(response.headers.get("content-length"), "10");
  assert.equal(await response.text(), "");
});
test("unsatisfiable ranges return 416 and malformed ranges fall back to 200", async () => {
  for (const range of ["bytes=100-", "bytes=-0"]) {
    const response = await fetch(path, { headers: { Range: range } });
    assert.equal(response.status, 416);
    assert.equal(response.headers.get("content-range"), "bytes */10");
  }
  for (const range of ["bytes=5-2", "bytes=-", "bytes=0-1,4-5"]) {
    const response = await fetch(path, { headers: { Range: range } });
    assert.equal(response.status, 200);
    assert.equal(await response.text(), "0123456789");
  }
});
test("conditional requests avoid resending unchanged media", async () => {
  const response = await fetch(path, { headers: { "If-None-Match": etag } });
  assert.equal(response.status, 304);
  assert.equal(await response.text(), "");
  const failed = await fetch(path, { headers: { "If-Match": '"old"' } });
  assert.equal(failed.status, 412);
});
test("If-Range safely falls back to the complete object", async () => {
  const response = await fetch(path, { headers: { Range: "bytes=2-5", "If-Range": '"old"' } });
  assert.equal(response.status, 200);
  assert.equal(await response.text(), "0123456789");
});
test("missing media returns 404; writes are disallowed; other URLs use assets", async () => {
  assert.equal((await fetch(`/${media[1].key}`)).status, 404);
  assert.equal((await fetch(path, { method: "POST" })).status, 405);
  assert.equal(await (await fetch("/feed.json")).text(), "static");
});

test("workers.dev media responses discourage indexing; public domains do not", async () => {
  for (const options of [{}, { method: "HEAD" }, { method: "POST" }, { headers: { Range: "bytes=2-5" } }]) {
    const response = await mf.dispatchFetch(`https://blog.account.workers.dev${path}`, options);
    assert.equal(response.headers.get("x-robots-tag"), "noindex");
    await response.arrayBuffer();
  }
  const response = await fetch();
  assert.equal(response.headers.get("x-robots-tag"), null);
  await response.arrayBuffer();
});
