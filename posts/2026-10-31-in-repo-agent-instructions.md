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

I mean, sure, the current models are wildly useful. But out of the box, they overcomplicate, take undue shortcuts, and compound deficiencies to the moon.

To get from default Claude or ChatGPT to a fast, affordable software loop – one that reliably zaps bugs, backlog items, and security vulnerabilities in your product in particular – it takes some real work. Increasingly, this *is* the work.

So it's past time you shared that work with your team.

## Guidelines and guardrails

There are two main ways to get coding agents to behave consistently and correctly: steer them with **guidelines**, and redirect them with **guardrails**. Basically a union of “Please go do the good thing” with `Error: You did the bad thing, try again.`

Sometimes, this means fighting models' non-determinism with better non-determinism. We build and refine Markdown instructions: rules, docs, skills, and the like. Then at PR time, AI reviewers, classifiers, and human review workflows can non-deterministically ask Claude to go back and do better.

But while this informed guidance is helpful, **deterministic** rules are gold.

Instead of “PLEASE don’t make 10,000 line files”, a lint script can simply reject overlong files before they’re pushed[^overlong]. When practical, moving Markdown rules, checks, and guides into deterministic code like this is a big level up. Checks in code are harder, better, faster, and stronger than prompting – and a hell of a lot cheaper.

Similarly, if you set up a local environment so models can verify how their code works in practice, you'll get less speculation and fewer unnecessary fallbacks. Step by step, you can tune your laptop into an instrument for turning brilliant slash idiotic tokens into good PRs.

Before long, you're building at a pace never before seen, with architectural consistency no less. Your team is in awe of your productivity, and… wait. Your team. Some of them need to understand your work too. And you still need to review their agents' work– OH GOD WHAT IS THIS PR?!

## Sharing is caring

The history of software development is the story of sharing. At first we shared just code, once its author was done with it. Then we grew into sharing commit history, say with SVN. We've seen with everything from Makefiles to Jira, Slack, GitHub Actions, Terraform, and more recently code formatters and linters, that **engineering improves with more sharing within teams**.

But when coding agents debuted, it made little sense to standardize how they were prompted. Hell, they barely worked in the first place. Nobody had any idea what it meant to use them well, and they lent themselves to experimentation and highly custom setups.

But 2024 was a long time ago. We've learned a lot about good agent guidance and guardrails, and models have gotten far better at working within them. Yet many teams still work in repos with no shared agent instructions at all.

These teams still use AI. But they rely mostly on models’ instincts, developers' prompting skills, and reviewers’ discipline to keep agents in check. More industrious team members might email around skills they find helpful. Using their personal setups, a few folks on these teams elicit well-engineered PRs from Claude – but these get jammed up alongside other developers' mystery slop in the review queue.

Fortunately, this is beginning to change. In-repo AGENTS.md files are now common. Reproducible dev environments, consistent for every team member, are including more lints, sandboxes, MCPs, and other tools that make agent output more consistent. CI, previously the realm of unit tests, often now runs review agents – preferably steered by in-repo instructions. And teams are putting checks, constraints, and formatting rules on PRs, making them easier to review and trust.

As Thoughtworks' [Rahul Garg said on martinfowler.com](https://martinfowler.com/articles/reduce-friction-ai/encoding-team-standards.html):

> A prompt on an individual machine is a personal productivity hack. The same prompt in the team’s repository is infrastructure.

So from this, we now have two primary goals: work to make our agent instructions more deterministic, and more useful for the whole team.

|                                   | **Before the work:<br>Setup and guidelines**                                                                                 | **After the work:<br>guardrails**                              |
| --------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------- |
| **Deterministic, shared** 😀      | Reproducible dev environments and sandboxes, verifiable structures (types, schemas, boundaries), shared tools and hooks {data-label="Before the work: Setup and guidelines"} | Typechecks, lints, tests, builds, CI, blocking hooks, ratchets {data-label="After the work: guardrails"} |
| **Nondeterministic, shared** 🙂   | AGENTS.md, in-repo docs, shared skills, existing coding patterns, guidance returned from shared tools, shared agent sessions {data-label="Before the work: Setup and guidelines"} | PR review agents, shared classifiers, human reviews {data-label="After the work: guardrails"} |
| **Deterministic, personal** 🙂    | Personal tools and MCP servers, local permission setups, local env config {data-label="Before the work: Setup and guidelines"} | Personal lints and hooks, local pre-commit {data-label="After the work: guardrails"} |
| **Nondeterministic, personal** 🫠 | Your prompt, local memories, personal skills, CLAUDE.local.md, a bespoke dev environment only on your laptop {data-label="Before the work: Setup and guidelines"} | Yelling at Claude for being a complete doofus {data-label="After the work: guardrails"} |

{.mobile-stacked-table}

The job, increasingly, is not producing code. It’s iterating a system – guidelines, guardrails, and tools – that helps your whole team produce good work. And as more teams run coding agents in the cloud, spun out of Slack conversations, Linear tickets, or incident reports, ensuring your agents do the right thing regardless of where they run is even more essential.

While a tuned software factory like this is a boon to generalists working in it, working *on* the system is where domain experts – perf wizards, database pros, and so on – can really shine. 

Instead of just running interference, trying to review and reject problematic PRs in their domain of expertise, they can iterate docs and guardrails that improve how every change, whether kicked off by a PM or a principal engineer, is written. PJ Onori, a design systems veteran at Sanity, responded to an increase in agent-authored code that didn't comply with their design system not with derision, but [with a spec](https://designsystemdocspec.org/).

Basically, in-repo rules turn expertise into leverage.

## Note: The shared rules need to actually be good

In 2024, models’ worst failures were not following instructions. In 2026, we also get agents failing because they *do* follow instructions, even overly absolute ones. Many a CLAUDE.md (or, [now, AGENTS.md](https://code.claude.com/docs/en/changelog)) has collected slop like:

> IMPORTANT: Every fix must start not with code, but with failing tests. Make the fix, then honestly verify it against the new tests. This is not busywork—it’s discipline.

1000 PRs merged later, agents have gifted you 9999 new unit tests, many of them useless, like a cat delivering its owner dead birds. "Oh great, thanks Codex, tests that enshrine every copy edit we've ever made to the UI, how thoughtful of you." Let this herd of tests run on hundreds of pushes to GitHub every day, and in time your CI bill will gain an entire digit.

While having at least some agent docs and guidelines in-repo has become standard, there is wild variation in how well-maintained these instructions are. Often they get so long, agent harnesses truncate them. Multiple teams I've helped have said they still required humans to read and review code changes, *but not AGENTS.md instructions.* That is, the root set of rules followed by every agent working in their codebase.[^1]

Now, you definitely want to add in-repo guidance and guardrails for your team's agents, but with great leverage comes great responsibility. If your one doc or tool can now affect thousands of nondeterministic coding runs across a team, it's worth the effort to iterate and improve it over time. At the minimum, this means building a culture of standards for this shared infrastructure, and people who own its effectiveness.

How do we actually do that?
## Closing the loop

While surely you tested your AGENTS.md overhaul personally, how is it working for everyone else? You see that your agents aren’t adding overlong comment blocks anymore, but this new PR from Steve did. Had he pulled your new instructions before he wrote this? And come to think of it, is your new guideline now causing places where explanation really would have been merited to be under-commented?

Of course, to maintain code well that runs on various other machines requires a measure of observability – doubly so when the flows are non-deterministic. What skills are people using? Are they working as intended? Are agents spinning needlessly on missing context or verification capabilities? Are they now yelling at Claude when it was actually your doc or skill that caused the problem?

You need to be able to fix mistakes and waste. Not just on your laptop, but across your team's agents.

On some teams, this just means having developers send bug reports and traces to team members when a skill or doc goes wrong – if they notice it and know who can fix it. Other teams move to a [coding environment like Amp](https://ampcode.com/) that shares session transcripts and their telemetry by default, or [our Powerplant tool](https://usepowerplant.com/) that supports session debugging in a harness-agnostic way. Meanwhile, [Entire](https://entire.com/) wants to be GitHub but for agents' session logs as well as code.

Session sharing comes with its own challenges. As with observability tools like Honeycomb and Datadog, giving your coding agents access to log and telemetry data from other agents is both very useful and potentially risky. Shared context needs thoughtful security, privacy, and accountability controls. Meanwhile, social conventions on teams around [working with agents in the open](https://shopify.engineering/under-the-river) are still developing. Some companies are overtly skeptical of transparency with agents, while others are all-in.

No matter how this all plays out, one thing is clear: the early scramble of siloed experimentation is ending. It's time for teams to be building shared agent infrastructure, guidelines, and guardrails, and to be iterating them together. To be learning not just from some confident poster on X, but from how one another are working with AI.

And to help us all do less yelling at Claude, and more building useful software.

[^overlong]: While simply failing lints for a file that exceeds limits is helpful, we can do better. If your lints emit graduated feedback, e.g. flagging when a file is close to, at, or beyond the threshold, then you can give models useful feedback without halting a critical change because a file got pushed one line too long.

    Another useful graduated approach is the [ratchet](https://usepowerplant.com/blog/test-coverage-wont-save-you-from-incoherence/): if you find a bad pattern in your code you don't want agents copying, a ratchet counts how many instances of the pattern currently exist, and only fails if that number goes up. A helpful tool for longer-term migration projects.
    
    Also worth noting: deterministic checks can give agents just-in-time remediation guidance. It's better to put "New endpoints should use the typed `Result` pattern instead" in the lint error when somebody copies the old pattern, rather than in global AGENTS.md clogging every session's context.

[^1]:  [`/claude-api prompt-audit`](https://x.com/RLanceMartin/status/2095170001175199771?lang=en) may be helpful if you need to dig out of this hole.