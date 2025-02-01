---
layout: post
author: allen
title: "The Era of Tab Continuation"
summary: "Press tab to complete your work."
date: 2025-01-31T23:45:30.955Z
featured: false
tags:
  - products
  - llms
---

If you’ve used a code editor before, you’ve seen tab completion. When you start typing a keyword or phrase, the editor might offer to complete the rest of what you’re typing:

<div class="center">
<img src="/images/2025/sublime-complete.jpg" alt="Sublime Text offers to complete InfoRow" />
If I press tab, Submlime Text will complete “InfoRow” for me. Neat.
</div>

An analogous thing happens in your browser: if you frequently visit slothville.com, and you start typing “slo” it will offer to complete the domain. Simply press return to confirm.

This is a useful pattern that saves a bunch of typing. Historically, though, it’s been limited to completing a word or phrase you’ve already started entering.

Then suddenly, BAM. Computers became able to not just tab-complete, but tab-*continue*. Tab-extrapolate. While you can always switch over to ChatGPT and have it extrapolate text for you, apps that have tab continuation built right in can do so without breaking your flow.

For example, here is a clip of me using tab continuation in Cursor to refactor some code.

<div class="center">
<video src="/images/2025/cursor-tab-6.mp4" controls loop style="max-width: 100%;"></video>
I express my intent to refactor these divs into InfoRows, then use tab and a backspace-nudge to have Cursor complete the work.
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
- **Figma**: Copied a sloth, then pasted it peeking out from behind a tree → Paste another sloth peeking out from the next tree, look at those little guys peekin’

While all of the above features were technically feasible in 2022, you would need to build each individually. But now, we can build next-action prediction in a generalized way, and roll it out incrementally across an entire product.

In theory.

Currently, getting next-action prediction to work well in a product is much harder than shoving a chatbot on side.[1] Completions present novel UI questions, which teams like [Cursor](https://www.cursor.com/), [Grammarly](https://www.grammarly.com/), [Warp](https://www.warp.dev/), and [Windsurf](https://codeium.com/windsurf) are still working through. To maintain flow, the suggestions also require very fast AI models – calling gpt-4o-mini on every keystroke is way too slothful.

<div class="center">
<img src="/images/2025/grammarly-tab.jpg" alt="Grammarly recently updated to offer batch typo fixes via tab continuation." />
Grammarly recently updated to offer batch typo fixes via tab continuation.
</div>

Given the work involved in solving this in each app, a cross-cutting system from Apple or OpenAI may be better suited to solving it well. An operating system could theoretically tab-complete actions that jump from one app to another, which would be forking awesome. Still, my instinct is that we’re a ways off from a generalist LLM that can rapidly and seamlessly orchestrate actions between every imaginable app. There is a lot of app-specific sauce involved in making these completions delightful instead of annoying.

In any case, next-action prediction will, in time, become expected functionality in professional software. As a new generation of apps takes advantage of it, older products will increasingly feel like sloths.

_Thanks to Maggie Appleton for inspiring me to cover UX patterns I find exciting, via her [design pattern garden](https://maggieappleton.com/patterns), and to [Arik Devens](https://danieltiger.com/) for giving me feedback on part of this article._

[1]: If you can tolerate the movie-villain long-podcast guy, [the Cursor developers gave him a rather interesting interview](https://www.youtube.com/watch?v=oFfVt3S51T4) in October that covered a lot of these issues.
