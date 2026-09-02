---
layout: post
author: allen
title: "The Brains of the Operation"
summary: "Simple steps toward a company brain."
date: 2026-08-31T23:45:30.955Z
tags:
  - llm
  - teams

---

One of the many problems computers have blessed us with is an abundance of information.

Software has long been great at storing, retrieving, and sharing a company’s knowledge. This is most SaaS apps, from Slack to GitHub to Notion.

But as easy as it is to store information, it’s hard to measure its accuracy. Or gauge its importance. Or promptly act on it. Or extract useful observations from an ocean of disorganized crap. Thus, most information goes unused. Heck, most information goes unrecorded.

So it’s been for many years.

## Agents on the brain

A big upshot of the past year's tooling improvements is that more information is worth recording and acting on.

AI-native teams are shifting away from Notion and Google Docs, toward more agent-friendly formats like Markdown for their business’ docs. They’re storing more info in team-accessible locations, and using it to move faster with agents. 

A key contributor to the growing hype around this shift is Y Combinator. With the release of [gbrain](https://github.com/garrytan/gbrain/), a number of [talks](https://www.youtube.com/watch?v=Z3JyAqh4ixg) on the topic, and Tom Blomfield’s [entry in this summer’s Request for Startups](https://www.ycombinator.com/rfs#company-brain), they’ve turned “company brain” from viral idea to overused buzzword before most people have even heard the term.

While different treatises on the subject will center different goals, the core idea is that **companies should make as much information as is practical usable by their team’s agents, because this contributes to positive flywheel effects**.

When a company’s decisions, processes, and proprietary info are legible to agents, they can of course help automate things. But they can also route information – leaders and ICs should be able to get the facts they need without going through lossy and slow layers of middle management. And agents fed with enough knowledge to form a “closed loop”, where observation, decision, and outcome are captured, can help run self-improvement – helping you hill-climb measurable aspects of a business.

Now this is all very good in theory, but currently tricky to implement without descending into some mix of dystopia and AI psychosis. As much as spelunking [the Claudese docs of GBrain](https://github.com/garrytan/gbrain/blob/master/README.md) is interesting, it’s a bit early for you to adopt 1M lines of company-brain machinery that evolved to run a startup accelerator (unless, perhaps, you run a competing startup accelerator.)

However, as I’ve worked to build our team’s own post-Notion data bus and repository of truth, I’ve found a few emerging-consensus principles and techniques worth considering, for those of you working to get more use out of agents for non-coding work.

## 1. Text files, synced with history

Agents are really good at working with folders of text documents, so that's the default approach. Then, you need a way to sync these documents with your team, track changes, and resolve conflicts, so – big surprise – the nerdy early adopters of this pattern are mostly using git repos.

On one hand, this is kind of silly. Git is a weird sync layer for a system where you’re mostly editing one file at a time, and always want to pull before any view or edit operation, and immediately commit and push your changes. And it doesn’t provide for realtime multiplayer editing, which you want during meetings and the like.

But also, git is simple. And well-understood. And it works.

[GBrain has some intense scripts](https://github.com/garrytan/gbrain/blob/6bf8db908c8a7b60dcdde2f1c784d4b278f183e0/docs/guides/multi-source-brains.md#durability-keep-a-brain-repo-in-sync-auto-harden) that coordinate its sync engine on top of git, but you can get started by just instructing your AGENTS.md to pull frequently, and to push every change it notices on disk immediately to GitHub – with human edits and agent edits pushed up as separate commits. [^github]

One problem working with folders of Markdown documents – synced or not – is that there isn’t AFAIK a great app for browsing these. What you'd want is something where each window shows a folder, with the file structure on the left side and rendered-but-editable Markdown on the right. Given the git backend, you’d also want some hooks to fire pull and push events on open and save, as well as some way to do all this on your phone too.

The closest Mac app for this I’ve found so far is [Obsidian](https://obsidian.md/)[^obsidian]. Using git as a backing store can be improved with plugins on Mac, but AFAIK working with git-backed Obsidian on mobile is still rough. You could probably use Obsidian Sync for a small team (max collaborators is currently 20) instead of git, with a different set of pros and cons.

## 2. Separate maintained truth from source data

A classic failure of documentation is that it can become unclear what is actively maintained and trustable, vs. what was a one-off capture of a discussion, idea, fact, or plan at some point in time. A lack of clarity here is even more disruptive to agents than it is to humans, since the docs *are* their memory.

It seems most company brain systems formalize this distinction. For our team’s `brain` repo we distinguish between “point-in-time” docs that *were* true (e.g. meetings, plans, decisions), and a much smaller set of “evergreen” docs that we continuously review and maintain (e.g. core strategy, policies, who are we building for). GBrain calls its analogous concepts “Timeline” and “Compiled Truth” docs respectively.

## 3. Rigorously track provenance

Keeping a partially agent-maintained knowledge-and-action system from descending into mush requires discipline about where purported facts were sourced from. If a document was hand-authored by your Founding Engineer yesterday, and today your CTO edited and approved it, that’s probably a reliable document. If Steve had Sonnet 4.5 barf a novel of “load-bearing” analysis that was “quietly” incorrect last fall, that’s probably worse than nothing.

A coherent company memory needs some kind of metadata – e.g. headers in your markdown files – that track document history and state. When was this drafted? Last reviewed? Overhauled? Sanity-checked? Who did so? Is this mostly AI speculation, or is it a specific human’s own thoughts and words?

One useful instruction is to have agents (and humans) ensure they link underlying sources for every claim, and prefer attributed quotes of specific humans over paraphrases. Each transformation of text is usually lossy, so minimizing this (and making claims more auditable) makes the system more stable and clear.

## 4. Be queryable

The more your agents can fetch, consider, and route your company’s ground truth, the less time your team will need to spend relaying info for one another – and the more you can spend building and solving problems.

This can start with automatically putting your routine internal meetings and Slack decisions[^decisions] into point-in-time Markdown docs in your company brain, but you can go way beyond that. Ad campaigns should create an artifact about what was tried and what was measured. Customer feature requests should be documented in a standard queryable format. Signed contracts, lost deals, feature launches, policy decisions, recruiting leads – any interesting event in your org can be recorded and made usable, informing future improvements. Heck, some teams even [make their agents’ prompts and traces visible to one another, in real time](https://powerplant.sh/).

Of course, all of this is easier if you have a [transparent company culture](https://allenpike.com/2026/the-rise-of-transparency/). Orgs that can work mostly in the open, avoiding DMs and secret docs except for rare HR or legal issues, are getting leverage out of these tools faster than companies that live in a world of need-to-know. But as the tools evolve, it will get easier to leverage strictly permissioned data too.

## 5. Automatically improve

While it’s early days, some agentic workflows can now recursively self-improve with supervision. The more mature software factories detect, draft, and land fixes for issues in the software factory itself. GBrain has a complex “dreaming” loop that looks for conflicts, synthesizes reports, and connects items into a knowledge graph. Every product analytics suite from PostHog to Amplitude is now selling a “self-driving” product loop.

For now teams are experimenting and, naturally, not all self-improvement attempts immediately bear fruit. But ultimately, improvement is what we’re all after. This might mean faster decisions, clearer processes, simpler workflows, better products, more leads – if it’s part of your loop and you can measure it, it could be optimized.

And of course, what can be optimized will get over-optimized. At least at first.

Which brings us back to, as always, judgement. All these newfangled brains still need to serve the hearts.

[^github]: This is one of many agentic workflows contributing to GitHub’s [stratospherically increasing server load](https://github.blog/news-insights/company-news/the-august-17-outage-and-the-work-ahead/) and resulting sadness. You could use Google Drive for sync, which would be faster and automatic, but it neither resolves conflicts within files, nor makes edit history easily accessible.
[^obsidian]: In my initial post I said that I was using [Typora](https://typora.io/) for this, but Nathan Snelgrove [reminded me](https://mastodon.social/@nathansnelgrove/117197428177013654) that Obsidian gives you some of the things Typora lacks, including a file browser on the left, and a lot more.
[^decisions]: Decisions are the hardest one of these for agents to capture at 90%+ completeness, since so many decisions (and the thinking behind them) are not yet team-readable in most orgs today. "Decide to have the discipline to document it" is also not enough. An area of open opportunity!
