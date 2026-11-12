import { media } from "./media.mjs";

// Serves the oversized files in media.mjs from R2. Ordinary pages and assets
// are served directly by Cloudflare; wrangler.jsonc routes these media paths here.
export default {
  async fetch(request, env) {
    const url = new URL(request.url);
    const path = url.pathname.slice(1);
    const asset = media.find(({ key }) => key === path);
    if (!asset) return env.ASSETS.fetch(request);

    const headers = new Headers();
    // Static _headers rules do not apply to Worker responses. Ask search engines
    // not to index workers.dev media; this does not make previews private.
    if (url.hostname.endsWith(".workers.dev")) {
      headers.set("X-Robots-Tag", "noindex");
    }
    if (!["GET", "HEAD"].includes(request.method)) {
      headers.set("Allow", "GET, HEAD");
      return new Response(null, { status: 405, headers });
    }

    const requestedRange = parseByteRange(request.headers.get("Range"));
    // R2 does not implement If-Range. Send the complete file in that case so
    // clients cannot accidentally combine bytes from different file versions.
    const useRange = request.method === "GET" && requestedRange !== null &&
      !request.headers.has("If-Range");
    const options = { onlyIf: request.headers };
    if (useRange) options.range = request.headers;
    // R2 applies the conditions/range and returns a stream, not a buffered file.
    const object = await env.MEDIA.get(path, options);
    if (!object) return new Response("Not found", { status: 404, headers });

    object.writeHttpMetadata(headers);
    headers.set("Content-Type", asset.contentType);
    headers.set("ETag", object.httpEtag);
    headers.set("Last-Modified", object.uploaded.toUTCString());
    headers.set("Accept-Ranges", "bytes");
    headers.set("Cache-Control", "public, max-age=3600");
    // A conditional R2 read can return metadata without a body. Translate that
    // into HTTP's failed-precondition or already-cached response.
    if (!("body" in object)) {
      const precondition = request.headers.has("If-Match") || request.headers.has("If-Unmodified-Since");
      return new Response(null, { status: precondition ? 412 : 304, headers });
    }

    let status = 200;
    let length = object.size;
    if (useRange) {
      const startsPastEnd = requestedRange.start !== undefined && requestedRange.start >= object.size;
      const requestsZeroBytes = requestedRange.suffixLength === 0;
      if (startsPastEnd || requestsZeroBytes) {
        await object.body.cancel();
        // An unsatisfied range still reports the total size, e.g. "bytes */100".
        headers.set("Content-Range", `bytes */${object.size}`);
        return new Response(null, { status: 416, headers }); // Range Not Satisfiable
      }
    }
    if (useRange && object.range) {
      // R2 describes the returned slice as offset/length or a suffix length.
      // HTTP needs inclusive start/end positions plus the size of the full file.
      const { offset, length: rangeLength, suffix } = object.range;
      const start = offset ?? Math.max(0, object.size - suffix);
      length = rangeLength ?? object.size - start;
      const endInclusive = start + length - 1;
      headers.set("Content-Range", `bytes ${start}-${endInclusive}/${object.size}`);
      status = 206; // Partial Content
    }
    headers.set("Content-Length", String(length));
    if (request.method === "HEAD") await object.body.cancel();
    return new Response(request.method === "HEAD" ? null : object.body, { status, headers });
  },
};

// Single byte ranges support video seeking and PDF readers:
// bytes=2-5 selects inclusive positions; bytes=8- selects through EOF;
// bytes=-3 selects the last three bytes. Ignore malformed/multiple ranges and
// serve the whole file. R2 receives the original header after this validation.
function parseByteRange(header) {
  const match = /^bytes=(\d*)-(\d*)$/.exec(header ?? "");
  if (!match) return null;
  const [, startText, endText] = match;
  if (!startText && !endText) return null;
  if (!startText) return { suffixLength: Number(endText) };
  const start = Number(startText);
  const end = endText ? Number(endText) : undefined;
  if (end !== undefined && start > end) return null;
  return { start, end };
}
