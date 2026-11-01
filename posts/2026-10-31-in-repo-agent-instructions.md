---
layout: post
author: allen
title: Guidelines and Guardrails Belong in Git
summary: On making your team's agents better.
date: 2026-10-31T23:45:30.955Z
tags:
  - llm
  - teams
---
One problem with AI is that it’s pretty stupid.

I mean, sure, the current models are impressive compared to what we had in 2024. But out of the box, they still overcomplicate, take undue shortcuts, and compound deficiencies to the moon.

In 2024, models’ worst failures were not following instructions. In 2026, we also get agents failing because they follow overly-absolute instructions. Many a CLAUDE.md (or, [now, AGENTS.md](https://code.claude.com/docs/en/changelog)) has collected slop like:

> IMPORTANT: Every fix must start not with code, but with failing tests. Make the fix, then honestly verify it against the new tests. This is not busywork—it’s discipline.[^claudeslop]

1000 PRs merged later, agents have gifted you 9999 new unit tests, many of them useless, like a cat delivering its owner dead birds. "Oh great, thanks Codex, tests that enshrine every copy edit we've ever made to the UI, how thoughtful of you." This herd of tests then runs on hundreds of pushes to GitHub every day, and wait… why is our GitHub Actions bill in the five digits?

On the other end of the spectrum, many teams still work in repos with no shared agent instructions at all.

These teams rely solely on models’ instincts, developers' prompting skills, and reviewers’ discipline to keep agents in check. More industrious team members might email around skills they find helpful. A few folks on these teams elicit good results from Claude, for some of their PRs – but these get jammed up alongside others' mystery slop in the review queue.

So, yeah. Coding agents are hardly principal engineers out of the box.

## Guidelines and guardrails

There are two main ways we can get coding agents to behave consistently and correctly: steer them with **guidelines**, and redirect them with **guardrails**. Basically a union of “Please go do the good thing” with `Error: You did the bad thing, try again.`

These guidelines and guardrails come in two main flavours.

Most developers start by fighting models' non-determinism with better non-determinism. Think Markdown: rules, docs, skills, and the like. At PR time, AI reviewers, classifiers, and human review workflows are non-deterministic ways of asking Claude to go back and do better.

But while **non-deterministic** guidance is helpful, **deterministic** rules are gold.

Instead of “PLEASE don’t make 10,000 line files”, a lint script simply rejects overlong files before they’re pushed[^overlong]. When practical, it's really helpful to migrate Markdown rules, checks, and guides into deterministic code. Checks in code are harder, better, faster, and far cheaper than prompting.

If deterministic changes that reject agent mistakes are good, deterministic changes that ensure agents do the right thing in the first place are great. If your programming language restricts what types can be null at runtime, agents just write far fewer null pointer exceptions.

When you’re directing an army of brilliant idiots, part of your job is footgun removal.

With these techniques, you can ensure your agents do the right thing, increasingly deterministically. Now you’re overseeing an army of diligent coders, and your team is in awe of your productivity, and… wait. Your team. Some of them need to understand your work too. And you still need to review their agents' work– OH GOD WHAT IS THIS PR?!

## Sharing is caring

The history of software development is the story of sharing. At first we shared just code, once its author was done with it. Then we grew into sharing history with SVN, build instructions in Makefiles, bug lists in Jira, reviews on GitHub, conversations in Slack, infra in Terraform, and more recently code formatters and linters too are **shared in-repo across a team**.

Like all these precedents, agentic coding setups started out very personal. The tools barely worked in the first place, changing every few weeks, so nobody had any idea what the best practices are. Encouraging your team to all share the same Cursor workflow in 2024 would have been silly.

2024 was a long time ago. Coding agents can now be incredibly effective – but only with well-tuned guidance and guardrails. Some of the giant PRs coming in, when they've been produced by developers with well-tuned rules, checks, and guardrails, are big improvements. And some of the giant PRs come from Steve.

So, for Steve’s benefit and everyone else’s, teams are increasingly sharing.

In-repo AGENTS.md files are being taken more seriously. Reproducible dev environments, consistent for every team member, are including more lints, sandboxes, MCPs, and other tools that make agent output more consistent. CI, previously the realm of unit tests, is now running review agents, ideally powered by in-repo instructions. Teams are putting checks, constraints, and formatting rules on PRs that make them easier to review and trust.

As Thoughtworks' [Rahul Garg said on martinfowler.com](https://martinfowler.com/articles/reduce-friction-ai/encoding-team-standards.html):

> A prompt on an individual machine is a personal productivity hack. The same prompt in the team’s repository is infrastructure.

Together with the preference for deterministic rules for agents, we get a hierarchy.

|                                   | **Before the work:<br>Setup and guidelines**                                                                                 | **After the work:<br>guardrails**                              |
| --------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------- |
| **Deterministic, shared** 😀      | Reproducible dev environments and sandboxes, verifiable structures (types, schemas, boundaries), shared tools and hooks {data-label="Before the work: Setup and guidelines"} | Typechecks, lints, tests, builds, CI, blocking hooks, ratchets {data-label="After the work: guardrails"} |
| **Nondeterministic, shared** 🙂   | AGENTS.md, in-repo docs, shared skills, existing coding patterns, guidance returned from shared tools, shared agent sessions {data-label="Before the work: Setup and guidelines"} | PR review agents, shared classifiers, human reviews {data-label="After the work: guardrails"} |
| **Deterministic, personal** 🙂    | Personal tools and MCP servers, local permission setups, local env config {data-label="Before the work: Setup and guidelines"} | Personal lints and hooks, local pre-commit {data-label="After the work: guardrails"} |
| **Nondeterministic, personal** 🫠 | Your prompt, local memories, personal skills, CLAUDE.local.md, a bespoke dev environment only on your laptop {data-label="Before the work: Setup and guidelines"} | Yelling at Claude for being a complete doofus {data-label="After the work: guardrails"} |

{.mobile-stacked-table}

The job, increasingly, is not producing code. It’s iterating a system – guidelines, guardrails, and tools – that help your whole team produce good code. Moving checks upward on this table, and leftward in the dev cycle, makes outputs more consistent between runs.

As more teams run coding agents in the cloud, spun out of Slack conversations, Linear tickets, or incident reports, ensuring your agents do the right thing regardless of where they run goes from helpful to essential.

In this light, it’s obvious why improving deterministic guardrails, in your repo, for your whole team, is far higher impact than having Claude stick a verbose “don’t do the bad thing again” memory on your laptop.

## Caveat: Debugging shared AI tooling is tricky

Of course you *want* to add and improve the in-repo guidance and guardrails for your team's agents, but there is an inherent difficulty here. If your one change can now affect thousands of nondeterministic agentic coding runs across a whole team, against various coding models... how do you know your changes were good?

Of course you tested the AGENTS.md overhaul yourself. Success: your agents aren’t adding overlong comment blocks anymore. At least, as far as you've seen so far.

Wait, this PR from Steve has new blathering comments – but had he pulled your new instructions before he wrote this? And come to think of it, is your new instruction causing any under-commented sections, where it really would be merited?

As with any form of context engineering work, maintaining in-repo instructions and guidelines is difficult without usage and [cost observability](https://usepowerplant.com/blog/coding-agent-cost-analysis/). You don't want agents that *usually* follow the rules, you want agents that *always* do. And you need them to do so without [burning $10000/week on tokens](https://allenpike.com/2026/how-to-not-spend-10k-on-coding-agents/).

All this research has led us to build [a tool called Powerplant](https://usepowerplant.com/), but more on that soon. In the meantime, if your team is working to level up the in-repo instructions and guardrails for your coding agents, I'd love to chat.

[^claudeslop]: Multiple teams I've helped that were hoping to get better use out of coding agents have said they required human review for code changes *but not for AGENTS.md instructions.*
    
    Teams should endeavour to flip that: the core set of rules followed by every future agent working in your codebase is some of your most important code! [`/claude-api prompt-audit`](https://x.com/RLanceMartin/status/2095170001175199771?lang=en) may be helpful if you're in this position.

[^overlong]: While simply failing lints for a file that fails its metrics is helpful, we can do better still. If your lints emit graduated feedback, e.g. flagging when a file is close to, at, or beyond the threshold, then you can give models useful feedback without halting a critical change because a file got pushed one line too long.

    Another useful graduated approach is the ratchet: if you find a bad pattern in your code you don't want agents copying, a ratchet counts how many instances of the pattern currently exist, and only fails if that number goes up. A helpful tool for longer-term migration projects.
    
    Also worth noting: deterministic checks can give agents just-in-time remediation guidance. "New endpoints should use the typed `Result` pattern instead." is better positioned in the lint error for using the old pattern, rather than living in AGENTS.md and clogging every session's context.
