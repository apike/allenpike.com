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

// allenpike.rb - Reading time calculator (matches Jekyll version exactly)
function reading_time(content) {
  if (!content) return "1 min";

  // Strip pre tags first, then strip HTML (matches Jekyll's get_plain_text)
  const text = content
    .replace(/<pre(?:(?!<\/pre).|\s)*<\/pre>/gmi, "")
    .replace(/<[^>]+>/g, "");

  const totalWords = text.split(/\s+/).filter(w => w.length > 0).length;
  const wordsPerMinute = 210;

  // Matches Jekyll's hardcoded ranges
  if (totalWords <= 89) return "30 sec";
  if (totalWords <= 269) return "1 min";
  if (totalWords <= 449) return "2 min";
  if (totalWords <= 629) return "3 min";
  if (totalWords <= 809) return "4 min";
  if (totalWords <= 1050) return "5 min";

  const minutes = Math.floor(totalWords / wordsPerMinute);
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
