const yaml = require("js-yaml");

module.exports = function(eleventyConfig) {
  
  // ============================================
  // Ignore directories and files
  // ============================================
  eleventyConfig.ignores.add("_posts");        // Jekyll posts source (we use /posts/)
  eleventyConfig.ignores.add("_site_jekyll");  // Comparison build
  eleventyConfig.ignores.add("_site_11ty");    // Comparison build
  eleventyConfig.ignores.add("google98019dc16f804178.html");  // Passthrough only, don't process

  // ============================================
  // Front Matter Options (handle Jekyll-style dates)
  // ============================================
  eleventyConfig.setFrontMatterParsingOptions({
    engines: {
      yaml: {
        parse: function(str) {
          const data = yaml.load(str);
          // Convert Jekyll-style dates to proper Date objects
          if (data && data.date && typeof data.date === 'string') {
            const dateStr = data.date.trim();
            // Format: YYYY-MM-DD H:MM:SS or HH:MM:SS (no timezone)
            let match = dateStr.match(/^(\d{4}-\d{2}-\d{2}) (\d{1,2}:\d{2}:\d{2})$/);
            if (match) {
              const time = match[2].padStart(8, '0'); // Ensure HH:MM:SS format
              data.date = new Date(match[1] + 'T' + time + 'Z');
            } else {
              // Format: YYYY-MM-DD H:MM:SS +/-HH:MM (with timezone)
              match = dateStr.match(/^(\d{4}-\d{2}-\d{2}) (\d{1,2}:\d{2}:\d{2}) ([+-]\d{2}):?(\d{2})$/);
              if (match) {
                const time = match[2].padStart(8, '0');
                data.date = new Date(match[1] + 'T' + time + match[3] + ':' + match[4]);
              }
            }
          }
          return data;
        }
      }
    }
  });

  // ============================================
  // Data File Extensions (YAML support)
  // ============================================
  eleventyConfig.addDataExtension("yml,yaml", (contents) => yaml.load(contents));

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
  // Custom Filters (ported from Jekyll plugins)
  // ============================================

  // widow.rb - Prevent widows in titles by adding &nbsp; before last word
  eleventyConfig.addFilter("widow", function(text) {
    if (!text) return text;
    return text.replace(/ ([^ ]*)$/, '&nbsp;$1');
  });

  // allenpike.rb - Default share image
  eleventyConfig.addFilter("defaultshareimg", function(text) {
    return text || "/images/simple-opengraph-banner.png";
  });

  // allenpike.rb - Reading time calculator
  eleventyConfig.addFilter("reading_time", function(content) {
    if (!content) return "1 min";
    
    // Strip HTML and pre tags
    const text = content
      .replace(/<pre[\s\S]*?<\/pre>/gi, '')
      .replace(/<[^>]+>/g, '');
    
    const words = text.trim().split(/\s+/).length;
    const wordsPerMinute = 210;

    if (words < 90) return "30 sec";
    if (words < 270) return "1 min";
    if (words < 450) return "2 min";
    if (words < 630) return "3 min";
    if (words < 810) return "4 min";
    if (words < 1050) return "5 min";
    
    const minutes = Math.floor(words / wordsPerMinute);
    return `${minutes} min`;
  });

  // rss_url_filter.rb - Convert relative URLs to absolute
  eleventyConfig.addFilter("relative_urls_to_absolute", function(content) {
    if (!content) return content;
    const url = "https://www.allenpike.com";
    return content
      .replace(/src="\//g, `src="${url}/`)
      .replace(/src='\//g, `src='${url}/`)
      .replace(/href="\//g, `href="${url}/`)
      .replace(/&lt;img /g, "&lt;img style='max-width: 100%' ")
      .replace(/src=&quot;\//g, `src=&quot;${url}/`)
      .replace(/href=&quot;\//g, `href=&quot;${url}/`);
  });

  // rss_url_filter.rb - Escape for JSON
  eleventyConfig.addFilter("escape_for_json", function(content) {
    if (!content) return content;
    return content.replace(/"/g, '\\"').replace(/\n/g, '\\n');
  });

  // escape_quotes for JSON feed title
  eleventyConfig.addFilter("escape_quotes", function(text) {
    if (!text) return text;
    return text.replace(/"/g, '\\"');
  });

  // Date filter for posts (Jekyll-style format strings)
  eleventyConfig.addFilter("date", function(date, format) {
    if (!date) return '';
    const d = new Date(date);
    
    // Handle Jekyll-style format strings
    if (format === "%B %-d, %Y") {
      const months = ["January", "February", "March", "April", "May", "June",
                      "July", "August", "September", "October", "November", "December"];
      return `${months[d.getMonth()]} ${d.getDate()}, ${d.getFullYear()}`;
    }
    if (format === "%Y") {
      return d.getFullYear().toString();
    }
    
    return d.toLocaleDateString();
  });

  // XML date format for Atom feed (UTC with +00:00 offset)
  eleventyConfig.addFilter("date_to_xmlschema", function(date) {
    if (!date) return '';
    const d = new Date(date);
    const pad = (n) => n.toString().padStart(2, '0');
    
    // Format as UTC: YYYY-MM-DDTHH:MM:SS+00:00
    return `${d.getUTCFullYear()}-${pad(d.getUTCMonth() + 1)}-${pad(d.getUTCDate())}T${pad(d.getUTCHours())}:${pad(d.getUTCMinutes())}:${pad(d.getUTCSeconds())}+00:00`;
  });

  // XML escape for Atom feed
  eleventyConfig.addFilter("xml_escape", function(text) {
    if (!text) return '';
    return text
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#39;');
  });

  // ============================================
  // Collections
  // ============================================

  // Posts collection (sorted by date, newest first)
  eleventyConfig.addCollection("posts", function(collectionApi) {
    const posts = collectionApi.getFilteredByGlob("posts/**/*.{md,markdown}").sort((a, b) => {
      return b.date - a.date;
    });

    // Add within-tag navigation (ported from withintagnav.rb)
    const tagPosts = {};
    
    // Group posts by tag
    posts.forEach(post => {
      const tags = post.data.tags || [];
      tags.forEach(tag => {
        if (!tagPosts[tag]) tagPosts[tag] = [];
        tagPosts[tag].push(post);
      });
    });

    // For each tag with 3+ posts, add prev/next navigation
    Object.keys(tagPosts).forEach(tag => {
      const taggedPosts = tagPosts[tag];
      if (taggedPosts.length < 3) return;

      taggedPosts.forEach((post, index) => {
        if (!post.data.next_in) post.data.next_in = {};
        if (!post.data.previous_in) post.data.previous_in = {};

        if (index < taggedPosts.length - 1) {
          post.data.next_in[tag] = taggedPosts[index + 1];
        }
        if (index > 0) {
          post.data.previous_in[tag] = taggedPosts[index - 1];
        }
      });
    });

    return posts;
  });

  // Get all unique tags for series pages
  eleventyConfig.addCollection("tagList", function(collectionApi) {
    const tags = new Set();
    collectionApi.getAll().forEach(item => {
      (item.data.tags || []).forEach(tag => tags.add(tag));
    });
    return [...tags].sort();
  });

  // ============================================
  // Global Data
  // ============================================
  
  // Make 'now' available for date comparisons
  eleventyConfig.addGlobalData("now", () => new Date());


  // ============================================
  // Layouts
  // ============================================
  eleventyConfig.addLayoutAlias("default", "layouts/default.html");
  eleventyConfig.addLayoutAlias("post", "layouts/post.html");
  eleventyConfig.addLayoutAlias("page", "layouts/page.html");
  eleventyConfig.addLayoutAlias("series", "layouts/series.html");

  // ============================================
  // Markdown Configuration
  // ============================================
  const markdownIt = require("markdown-it");
  const markdownItAnchor = require("markdown-it-anchor");
  const md = markdownIt({
    html: true,
    breaks: false,
    linkify: true
  })
    .use(require("markdown-it-footnote"))
    .use(markdownItAnchor, {
      permalink: false,  // Don't add permalink icons
      slugify: (s) => s.toLowerCase().replace(/[^\w]+/g, '-').replace(/(^-|-$)/g, '')
    });
  
  eleventyConfig.setLibrary("md", md);
  
  // Treat .markdown files the same as .md
  eleventyConfig.addExtension("markdown", { key: "md" });

  // ============================================
  // Configuration
  // ============================================
  return {
    dir: {
      input: ".",
      output: "_site",
      includes: "_includes",
      data: "_data"
    },
    templateFormats: ["liquid", "md", "markdown", "html"],
    markdownTemplateEngine: "liquid",
    htmlTemplateEngine: "liquid"
  };
};
