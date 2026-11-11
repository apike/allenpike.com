import { media } from "./media.mjs";

export default {
  async fetch(request, env) {
    const path = new URL(request.url).pathname.slice(1);
    const asset = media.find(({ key }) => key === path);
    if (!asset) return env.ASSETS.fetch(request);
    if (!["GET", "HEAD"].includes(request.method)) {
      return new Response(null, { status: 405, headers: { Allow: "GET, HEAD" } });
    }

    // R2 does not implement If-Range. A full response is safe when resuming
    // against a validator; never combine bytes from different object versions.
    const requestedRange = /^bytes=(\d*)-(\d*)$/.exec(request.headers.get("Range") ?? "");
    const validRange = requestedRange && (requestedRange[1] || requestedRange[2]) &&
      !(requestedRange[1] && requestedRange[2] && Number(requestedRange[1]) > Number(requestedRange[2]));
    const useRange = request.method === "GET" && validRange && !request.headers.has("If-Range");
    // R2 evaluates conditional requests and byte ranges without buffering media.
    const object = await env.MEDIA.get(path, {
      onlyIf: request.headers,
      ...(useRange ? { range: request.headers } : {}),
    });
    if (!object) return new Response("Not found", { status: 404 });

    const headers = new Headers();
    object.writeHttpMetadata(headers);
    if (new URL(request.url).hostname.endsWith(".workers.dev")) {
      headers.set("X-Robots-Tag", "noindex");
    }
    headers.set("Content-Type", asset.contentType);
    headers.set("ETag", object.httpEtag);
    headers.set("Last-Modified", object.uploaded.toUTCString());
    headers.set("Accept-Ranges", "bytes");
    headers.set("Cache-Control", "public, max-age=3600");
    if (!("body" in object)) {
      const precondition = request.headers.has("If-Match") || request.headers.has("If-Unmodified-Since");
      return new Response(null, { status: precondition ? 412 : 304, headers });
    }

    let status = 200;
    let length = object.size;
    if (useRange && (Number(requestedRange[1]) >= object.size ||
      (!requestedRange[1] && Number(requestedRange[2]) === 0))) {
      await object.body.cancel();
      headers.set("Content-Range", `bytes */${object.size}`);
      return new Response(null, { status: 416, headers });
    }
    if (useRange && object.range) {
      const offset = object.range.offset ?? Math.max(0, object.size - object.range.suffix);
      length = object.range.length ?? object.size - offset;
      headers.set("Content-Range", `bytes ${offset}-${offset + length - 1}/${object.size}`);
      status = 206;
    }
    headers.set("Content-Length", String(length));
    if (request.method === "HEAD") await object.body.cancel();
    return new Response(request.method === "HEAD" ? null : object.body, { status, headers });
  },
};
