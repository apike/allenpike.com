/**
 * Custom Eleventy filters (ported from Jekyll plugins)
 */

const feedFormatting = require("./feed-formatting");

const MONTHS = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

// widow.rb - Prevent widows in titles by adding &nbsp; before last word
function widow(text) {
  if (!text) return text;
  return text.replace(/ ([^ ]*)$/, "&nbsp;$1");
}

// allenpike.rb - Default share image
function defaultshareimg(text) {
  return text || "/images/simple-opengraph-banner.png";
}

// allenpike.rb - Reading time calculator
function reading_time(content) {
  if (!content) return "1 min";

  // Strip HTML and pre tags
  const text = content
    .replace(/<pre[\s\S]*?<\/pre>/gi, "")
    .replace(/<[^>]+>/g, "");

  const words = text.trim().split(/\s+/).length;
  const wordsPerMinute = 210;
  const minutes = Math.round(words / wordsPerMinute);

  if (minutes < 1) return "30 sec";
  return `${minutes} min`;
}

// Date filter for posts (Jekyll-style format strings)
function date(dateValue, format) {
  if (!dateValue) return "";
  const d = new Date(dateValue);

  if (format === "%B %-d, %Y") {
    return `${MONTHS[d.getMonth()]} ${d.getDate()}, ${d.getFullYear()}`;
  }
  if (format === "%Y") {
    return d.getFullYear().toString();
  }

  return d.toLocaleDateString();
}

module.exports = {
  widow,
  defaultshareimg,
  reading_time,
  date,
  // Feed formatting filters
  ...feedFormatting,
  // Alias for backwards compatibility
  escape_quotes: feedFormatting.escape_for_json,
};
