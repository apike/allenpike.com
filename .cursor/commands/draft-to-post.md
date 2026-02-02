# draft-to-post

Take the provided text, which will be in the form of a Markdown blog post draft, and do the following to convert it into a post draft:

## Front Matter

- Add 11ty "front matter" as found in the posts in the `posts` folder, example below.
- Ensure the date is the last day of the current month, which is likely today.
- Pull in the title and `summary` subtitle from the top of the text draft provided.
- Set the `image` to the the banner image specified at the top of the text draft, if any. Otherwise, ask me if there is one. If the post will have no feature image, then `image` can be omitted from the front matter, but I should confirm that.
- Based on the draft content, propose tags from the tags described in _data/seriestitles.yml.
- After the front matter, other than the changes specified here, include my pasted content verbatim, including what seems like any typos or inaccuracies, other than the image substitution described below.

<example-frontmatter>
---
layout: post
author: allen
title: "A Box of Many Inputs"
summary: "On browsers, local classifiers, and Roger Rabbit."
date: 2025-12-31T23:45:30.955Z
image: "/images/2025/framed-google.jpg"
tags:
  - llm
  - products

---

This will be the first line of the actual post text.
</example-frontmatter>

## Image substitution

- For any images, they will need to be wrapped in a little HTML snippet, as below. The images should already be in the project at a path like /images/$current-year/the-image.jpg but will probably in the pasted draft only be like "the-image.jpg". If an image is implied in the post but not present, ask me about it.
- If the line of text below an image looks like a caption, put that text in the caption of the image's text. If an image doesn't seem to have a provided caption, ask me about it.
- Save the resulting post in `posts` with a filename matching the date and title, e.g. `2025-12-31-box-of-many-inputs.md`.
- The post content might have "anonymous" images which will come through like ![](image.png). These can be ignored if they're right above or below an image reference like above, but if they appear alone, then ask about them (e.g. you have a leftover markdown image after the paragraph ending "But we will see." but I don't see an associated image to include in the post?)

## Post-draft report

After producing the post-formatted draft and saving it, do a pass with the following checks.

- Do a pass of checking grammar and content on the post and respond to me with any suggested changes or fixes. Don't change any grammar or wording without asking me.
- Confirm the markdown footnote syntax is correct (for example no missing footnotes that are implied)
- Finally, ask me about anything in my post that seems incorrect or unintended.

<example-image>
<div class="centered">
<img src="/images/2025/figma-smash.jpg" alt="A Choose Your Fighter screen of JS frameworks." />
<span class="caption">Components and Auto Layout made this 10x faster to build in Figma than Keynote.</span>
</div>
</example-image>
