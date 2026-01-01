/**
 * Filters for RSS/Atom/JSON feed formatting
 */

const SITE_URL = "https://www.allenpike.com";

// Convert relative URLs to absolute for feeds
// Also adds max-width to images in XML-escaped content (for Atom/RSS)
function relative_urls_to_absolute(content) {
  if (!content) return "";
  return content
    .replace(/src="\//g, `src="${SITE_URL}/`)
    .replace(/src='\//g, `src='${SITE_URL}/`)
    .replace(/href="\//g, `href="${SITE_URL}/`)
    .replace(/src=&quot;\//g, `src=&quot;${SITE_URL}/`)
    .replace(/href=&quot;\//g, `href=&quot;${SITE_URL}/`)
    .replace(/&lt;img /g, "&lt;img style='max-width: 100%' ");
}

// XML date format for Atom feed (UTC with +00:00 offset)
function date_to_xmlschema(dateValue) {
  if (!dateValue) return "";
  const d = new Date(dateValue);
  const pad = (n) => n.toString().padStart(2, "0");

  return `${d.getUTCFullYear()}-${pad(d.getUTCMonth() + 1)}-${pad(d.getUTCDate())}T${pad(d.getUTCHours())}:${pad(d.getUTCMinutes())}:${pad(d.getUTCSeconds())}+00:00`;
}

// XML escape for Atom feed
function xml_escape(text) {
  if (!text) return "";
  return text
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#39;");
}

// Escape content for JSON feed (uses JSON.stringify for correctness)
function escape_for_json(content) {
  if (!content) return "";
  return JSON.stringify(content).slice(1, -1);
}

module.exports = {
  relative_urls_to_absolute,
  date_to_xmlschema,
  xml_escape,
  escape_for_json,
};
