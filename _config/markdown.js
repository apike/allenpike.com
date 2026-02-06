/**
 * Markdown-it configuration with kramdown-style footnotes
 */

const markdownIt = require("markdown-it");
const markdownItAnchor = require("markdown-it-anchor");
const markdownItAttrs = require("markdown-it-attrs");
const markdownItFootnote = require("markdown-it-footnote");

/**
 * Configure and return the markdown-it instance
 */
function createMarkdownLibrary() {
  const md = markdownIt({
    html: true,
    breaks: false,
    linkify: false,
    typographer: true,
  })
    .use(markdownItAttrs)
    .use(markdownItFootnote)
    .use(markdownItAnchor, {
      permalink: false,
      slugify: (s) =>
        s
          .toLowerCase()
          .replace(/[^\w]+/g, "-")
          .replace(/(^-|-$)/g, ""),
    });

  customizeFootnotes(md);

  return md;
}

/**
 * Customize footnote rendering to match Jekyll/kramdown style
 */
function customizeFootnotes(md) {
  // Footnote reference in text: [^1] -> <sup id="footnote-1">...</sup>
  md.renderer.rules.footnote_ref = (tokens, idx, options, env, slf) => {
    const id = slf.rules.footnote_anchor_name(tokens, idx, options, env, slf);
    const caption = slf.rules.footnote_caption(tokens, idx, options, env, slf);
    let refid = id;
    if (tokens[idx].meta.subId > 0) {
      refid += ":" + tokens[idx].meta.subId;
    }
    const captionText = caption.replace(/^\[/, "").replace(/\]$/, "");
    return `<sup id="footnote-${refid}" role="doc-noteref"><a href="#fn:${id}" class="footnote" rel="footnote">${captionText}</a></sup>`;
  };

  // Footnote block wrapper
  md.renderer.rules.footnote_block_open = () => {
    return '<div class="footnotes" role="doc-endnotes">\n  <ol>\n';
  };

  md.renderer.rules.footnote_block_close = () => {
    return "  </ol>\n</div>\n";
  };

  // Individual footnote item
  md.renderer.rules.footnote_open = (tokens, idx, options, env, slf) => {
    const id = slf.rules.footnote_anchor_name(tokens, idx, options, env, slf);
    return `    <li id="fn:${id}" role="doc-endnote">\n`;
  };

  md.renderer.rules.footnote_close = () => {
    return "    </li>\n";
  };

  // Back-reference link (↩)
  md.renderer.rules.footnote_anchor = (tokens, idx, options, env, slf) => {
    let id = slf.rules.footnote_anchor_name(tokens, idx, options, env, slf);
    if (tokens[idx].meta.subId > 0) {
      id += ":" + tokens[idx].meta.subId;
    }
    return ` <a href="#footnote-${id}" class="reversefootnote" role="doc-backlink">&#8617;</a>`;
  };
}

module.exports = { createMarkdownLibrary };
