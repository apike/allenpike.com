---
layout: post
author: allen
title: "The Era of Tab Continuation"
summary: "Press tab to complete your work."
date: 2025-01-31T23:45:30.955Z
image: "/images/2025/tab-preview.jpg"
tags:
  - products
  - llm
---

If you’ve used a code editor before, you’ve seen tab completion. When you start typing a keyword or phrase, the editor might offer to complete the rest of what you’re typing:

<div class="centered">
<img src="/images/2025/sublime-complete.jpg" alt="Sublime Text offers to complete InfoRow" />
If I press tab, Sublime Text will complete “InfoRow” for me. Neat.
</div>

An analogous thing happens in your browser: if you frequently visit slothville.com, and you start typing “slo” it will offer to complete the domain. Simply press return to confirm.

This is a useful pattern that saves a bunch of typing. Historically, though, it’s been limited to completing a word or phrase you’ve already started entering.

Then suddenly, BAM. Computers became able to not just tab-complete, but tab-*continue*. Tab-extrapolate. While you can always switch over to ChatGPT and have it extrapolate text for you, apps that have tab continuation built right in can do so without breaking your flow.

For example, here is a clip of me using tab continuation in Cursor to change an interface and the corresponding UI.

<div class="centered">
<video controls loop style="max-width: 100%;">
  <source src="/images/2025/cursor-tab-11.mp4" type="video/mp4">
</video>
I express my intent to prioritize sloths’ yawn rate over backflips, then have Cursor finish the work.
</div>

Cursor’s Tab feature predicts your next likely change or movement by considering various factors:

- Recent edits
- What you’ve copied to your clipboard
- Nearby formatting
- Outstanding linter errors
- Common code patterns

So, common sense next-action prediction using transformers. But it _feels_ like magic! It’s wild that you can tell an app so much with just a little typing and nudging.

Cursor’s Michael Truell [explains that this is exactly the vision](https://lexfridman.com/cursor-team-transcript/):

> Programming is this weird discipline where sometimes the next five minutes of what you’re going to do is actually predictable from the stuff you’ve done recently. So, can we get to a world where that next five minutes happens by you disengaging, and it taking you through? … You see the next step it’s going to do and you’re like, “Okay, that’s good, that’s good, that’s good, that’s good,” and you can just sort of tap through these big changes.

He’s exactly right, except that I don’t think programming _is_ a weird discipline here. Much of knowledge work is follow-through: mechanically doing the actions any savvy observer would assume you would do next.

The technology to build great tab continuation dropped in 2023, and at first, it seemed like it was mostly useful for coding. But on reflection, there are a horde of cases where the context and recent actions are enough to propose a likely next action:

- **Keynote**: Copied “Sloths of 2024” and retitled it “Sloths of 2025” → Replace “2024” with “2025” in the document
- **Google Sheets**: Renamed column from “Average Sloths” to “Total Sloths” → Change the formula below from AVERAGE to SUM
- **Notion**: Fix the formatting of the “Sloths” bullet point → Apply the same format to the following bullets
- **Figma**: Copied a sloth, then pasted it peeking out from behind a tree → Paste another copy peeking out from the next tree, look at those little guys peekin’

While all of the above features were technically feasible in 2022, you would need to build each individually. But now, we can build next-action prediction in a generalized way, and roll it out incrementally across an entire product – and [relentlessly improve it](https://www.cursor.com/blog/tab-update).

<div class="centered">
<img src="/images/2025/grammarly-tab.jpg" alt="Grammarly recently updated to offer batch typo fixes via tab continuation." />
Grammarly recently updated to offer batch typo fixes via tab continuation.
</div>

With this technology, you can even imagine Apple or OpenAI building a cross-cutting system that could tab-complete actions in any app, including jumping from one app to another. It would would be forking awesome – and *probably* intractably difficult.

That's because seamless next-action prediction depends on two things:

1. Thorough consideration of the UX implications, specific to your product's workflows, and
2. Fast, specialized AI models – if you call gpt-4o-mini on every keystroke, you're gonna have a bad time.

Luckily, we can learn from teams like [Cursor](https://www.cursor.com/), [Grammarly](https://www.grammarly.com/), [Warp](https://www.warp.dev/), and [Windsurf](https://codeium.com/windsurf) as they forge the path. If you can tolerate the movie-villain long-podcast guy, [the Cursor developers gave him a rather interesting interview](https://www.youtube.com/watch?v=oFfVt3S51T4) in October that covered a lot of these issues. Or you can just spend time using these tools from the future, letting it rewire your brain and raise the bar for what you can imagine your own product doing.

Like any other newly-possible UX pattern, we'll see an era of experimentation. Some of it will be delightful, some of it will be awful. But either way, a new generation of apps is about to make their competitors feel like sloths.

---

*Thanks to Maggie Appleton for inspiring me to cover UX patterns I find exciting, via her [design pattern garden](https://maggieappleton.com/patterns), and to [Arik Devens](https://danieltiger.com/) and [Luke Hutscal](http://lukehutscal.com/) for giving me feedback on this article.*
