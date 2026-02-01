const yaml = require("js-yaml");
const smartquotes = require("smartquotes");
const { parseHTML } = require("linkedom");
const filters = require("./_config/filters");
const collections = require("./_config/collections");
const { createMarkdownLibrary } = require("./_config/markdown");

module.exports = function (eleventyConfig) {
  // ============================================
  // Ignore directories and files
  // ============================================
  eleventyConfig.ignores.add("_posts"); // Jekyll posts source (we use /posts/)
  eleventyConfig.ignores.add("_site_jekyll"); // Comparison build
  eleventyConfig.ignores.add("_site_11ty"); // Comparison build
  eleventyConfig.ignores.add("google98019dc16f804178.html"); // Passthrough only, don't process

  // ============================================
  // Front Matter Options (handle Jekyll-style dates)
  // ============================================
  eleventyConfig.setFrontMatterParsingOptions({
    engines: {
      yaml: {
        parse: function (str) {
          const data = yaml.load(str);
          if (data && data.date && typeof data.date === "string") {
            const parsed = parseJekyllDate(data.date.trim());
            if (parsed) data.date = parsed;
          }
          return data;
        },
      },
    },
  });

  // ============================================
  // Data File Extensions (YAML support)
  // ============================================
  eleventyConfig.addDataExtension("yml,yaml", (contents) =>
    yaml.load(contents)
  );

  // ============================================
  // Passthrough Copy - Static assets
  // ============================================
  eleventyConfig.addPassthroughCopy("css");
  eleventyConfig.addPassthroughCopy("images");
  eleventyConfig.addPassthroughCopy("slides");
  eleventyConfig.addPassthroughCopy("admin");
  eleventyConfig.addPassthroughCopy("apple-touch-icon.png");
  eleventyConfig.addPassthroughCopy("favicon.ico");
  eleventyConfig.addPassthroughCopy("robots.txt");
  eleventyConfig.addPassthroughCopy("google98019dc16f804178.html");
  eleventyConfig.addPassthroughCopy("_redirects");

  // ============================================
  // Filters
  // ============================================
  Object.entries(filters).forEach(([name, fn]) => {
    eleventyConfig.addFilter(name, fn);
  });

  // ============================================
  // Collections
  // ============================================
  eleventyConfig.addCollection("posts", collections.posts);
  eleventyConfig.addCollection("tagList", collections.tagList);

  // ============================================
  // Global Data
  // ============================================
  eleventyConfig.addGlobalData("now", () => new Date());

  // ============================================
  // Layouts
  // ============================================
  eleventyConfig.addLayoutAlias("default", "layouts/default.html");
  eleventyConfig.addLayoutAlias("post", "layouts/post.html");
  eleventyConfig.addLayoutAlias("page", "layouts/page.html");
  eleventyConfig.addLayoutAlias("series", "layouts/series.html");

  // ============================================
  // Markdown
  // ============================================
  eleventyConfig.setLibrary("md", createMarkdownLibrary());
  eleventyConfig.addExtension("markdown", { key: "md" });

  // ============================================
  // Transforms
  // ============================================
  eleventyConfig.addTransform("smartquotes", function (content, outputPath) {
    // Apply smart quotes to HTML pages, but skip XML feeds
    if (
      outputPath &&
      outputPath.endsWith(".html") &&
      !outputPath.includes("/feed/") &&
      !outputPath.includes("/atom/")
    ) {
      return applySmartQuotesToHTML(content);
    }
    return content;
  });

  // ============================================
  // Configuration
  // ============================================
  return {
    dir: {
      input: ".",
      output: "_site",
      includes: "_includes",
      data: "_data",
    },
    templateFormats: ["liquid", "md", "markdown", "html"],
    markdownTemplateEngine: "liquid",
    htmlTemplateEngine: "liquid",
  };
};

// ============================================
// Helper Functions
// ============================================

/**
 * Parse Jekyll-style date strings into Date objects
 * Formats: "YYYY-MM-DD H:MM:SS" or "YYYY-MM-DD H:MM:SS +/-HH:MM"
 */
function parseJekyllDate(dateStr) {
  // Format: YYYY-MM-DD H:MM:SS (no timezone, assume UTC)
  let match = dateStr.match(/^(\d{4}-\d{2}-\d{2}) (\d{1,2}:\d{2}:\d{2})$/);
  if (match) {
    const time = match[2].padStart(8, "0");
    return new Date(`${match[1]}T${time}Z`);
  }

  // Format: YYYY-MM-DD H:MM:SS +/-HH:MM (with timezone)
  match = dateStr.match(
    /^(\d{4}-\d{2}-\d{2}) (\d{1,2}:\d{2}:\d{2}) ([+-]\d{2}):?(\d{2})$/
  );
  if (match) {
    const time = match[2].padStart(8, "0");
    return new Date(`${match[1]}T${time}${match[3]}:${match[4]}`);
  }

  return null;
}

/**
 * Apply smart quotes only to text content in HTML, not to attributes
 */
function applySmartQuotesToHTML(html) {
  const { document } = parseHTML(html);
  const skipTags = ["script", "style", "pre", "code", "textarea"];

  // Check if any ancestor is a tag we should skip
  function hasSkipAncestor(node) {
    let el = node.parentElement;
    while (el) {
      if (skipTags.includes(el.tagName.toLowerCase())) {
        return true;
      }
      el = el.parentElement;
    }
    return false;
  }

  // Walk all text nodes and apply smartquotes
  const walker = document.createTreeWalker(
    document,
    4 // NodeFilter.SHOW_TEXT
  );

  const textNodes = [];
  while (walker.nextNode()) {
    textNodes.push(walker.currentNode);
  }

  for (const node of textNodes) {
    if (!hasSkipAncestor(node)) {
      node.textContent = smartquotes.string(node.textContent);
    }
  }

  return document.toString();
}
