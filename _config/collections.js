/**
 * Eleventy collections configuration
 */

/**
 * Posts collection (sorted by date, newest first)
 * Also adds within-tag navigation (ported from withintagnav.rb)
 */
function posts(collectionApi) {
  const posts = collectionApi
    .getFilteredByGlob("posts/**/*.{md,markdown}")
    .sort((a, b) => b.date - a.date);

  // Strip trailing slashes from post URLs for Jekyll-compatible output
  // This ensures post.url returns /2025/post-name instead of /2025/post-name/
  posts.forEach((post) => {
    if (post.url && post.url.endsWith("/")) {
      post.url = post.url.slice(0, -1);
    }
  });

  // Build tag -> posts mapping
  const tagPosts = {};
  posts.forEach((post) => {
    const tags = post.data.tags || [];
    tags.forEach((tag) => {
      if (!tagPosts[tag]) tagPosts[tag] = [];
      tagPosts[tag].push(post);
    });
  });

  // For each tag with 3+ posts, add prev/next navigation
  // Note: This mutates post.data intentionally for template access
  Object.keys(tagPosts).forEach((tag) => {
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
}

/**
 * Get all unique tags for series pages
 */
function tagList(collectionApi) {
  const tags = new Set();
  collectionApi.getAll().forEach((item) => {
    (item.data.tags || []).forEach((tag) => tags.add(tag));
  });
  return [...tags].sort();
}

module.exports = {
  posts,
  tagList,
};
