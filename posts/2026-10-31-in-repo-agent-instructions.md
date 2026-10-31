---
layout: post
author: allen
title: "In-Repo Agent Instructions"
summary: "On guidelines and guardrails for coding agents."
date: 2026-10-31T23:45:30.955Z
tags:
  - llm
  - teams

---

One problem with AI is that it’s pretty stupid.

I mean, sure, the current models are impressive compared to what we had in 2024. But for most tasks, they still propose things and make mistakes that would make a domain expert slap their forehead. *Especially* in aggregate – many teams have looked back on a few months of AI authored changes and found horrifying architectural debt.

While it used to be coding agents’ worst failures were not following instructions, a lot of tomorrow’s horrors are being built by agents that *are* following instructions. On many teams, CLAUDE.md (or, now, AGENTS.md) has hundreds of lines of Claudeslop commandments like:

> IMPORTANT: Every fix starts not with code, but with failing tests. Make the fix, then honestly verify it against the new tests. This is not busywork—it’s discipline.

1000 PRs merged later, your codebase boasts 9999 new unit tests. Most of these test absolutely nothing of value, many are flaky, half of them just mirror the implementation, they run on hundreds of pushes to GitHub every day, and wait… why is our GitHub Actions bill in the five digits?

On the other end of the spectrum, a ton of teams today still work in repos with no AGENTS.md at all. They rely solely on models’ instincts and reviewers’ discipline to keep agents in check, with the more industrious team members emailing around skills they find helpful. In this environment, agents struggle to write code that’s good and appropriate for the project, as opposed to simply aping the worst code that’s already in the repo. Instead of 1000 merged questionable PRs, these teams more often have 1000 open PRs waiting for review.

So, yeah. Coding agents are hardly turnkey principal engineers.

## Guidelines and guardrails

A core concept when working with coding agents is that there are two main ways to get an agent to do better work: you can steer it with guidelines, or redirect it with guardrails. Basically “Hey go do the good thing” and later “Error: You did the bad thing, try again.”

These guidelines and guardrails come in two main flavors. Most developers start by attempting to poke their non-deterministic minions in ways that will get the desired effect. This mostly takes the form of Markdown docs, rules, skills, and the like, but also often includes PR review, classifiers, and other more sophisticated ways of asking Claude to do better.

More advanced teams work to move these rules, checks, and guides into deterministic code. Instead of “PLEASE don’t make 10,000 line files”, a lint script rejects overlong files before they’re pushed. Deterministic checks are harder, better, faster, and stronger than prompting, so where possible we try to promote rules there.

So deterministically rejecting agent mistakes is good. But even better are deterministic changes that ensure agents do the right thing in the first place. If your programming language defines what types can be null at runtime, agents won’t write null pointer exceptions. When you’re directing an army of brilliant idiots, part of your job is footgun removal.

Okay, so great! Now you’re making sure your agents do the right thing, increasingly deterministically. You’re overseeing an army of diligent agents, and your team is in awe of your productivity. Now… wait. Your team. Some of them need to understand your work too. And you need to review their– OH GOD WHAT IS THIS PR?!

## Sharing is caring

The history of software development is the story of sharing. At first we shared just the code, once its author was done with it. Then we grew into sharing history with SVN, reviews on GitHub, build instructions in Makefiles, bug lists in Jira, conversations in Slack, infra in Terraform, and increasingly, things once considered matters of taste such as code formatters and linters are shared as well.

Like all these precedents, agentic coding setups started out very personal. The tools barely worked in the first place, they changed every few weeks, and nobody had any idea what the best practices are. Trying to get your team to all share the same Cursor workflow in 2024 would have been silly.

Looking to 2027, things are very different. Coding agents can now be incredibly effective, but without well-tuned guidance and guardrails, they can make a profound mess. Code is being produced at unprecedented speed. Some of these giant PRs come from developers with finely-tuned agentic coding setups with rigorous checks and guardrails, and some of them come from Steve.

So, for Steve’s benefit and everyone else’s, teams are increasingly sharing. Leaders are taking their in-repo AGENTS.md files more seriously. Reproducible dev environments, consistent for every team member, are getting more sandboxes, lints, MCPs, and other tools that make agent output more consistent. CI, previously the domain of unit tests, is increasingly running review agents, powered by in-repo instructions. Teams are putting checks, constraints, and formatting rules on PRs that make them easier to review.

Critically, once this stuff is shared, it can be iterated.

Together, this gives us a rough hierarchy.

|                                  | **Before the work:<br>steer the agent**                      | **After the work:<br>redirect the agent**                    |
|----------------------------------|--------------------------------------------------------------|--------------------------------------------------------------|
| **Deterministic, shared** 😀      | Reproducible dev environments and sandboxes, verifiable structures (types, schemas, boundaries), shared tools and hooks | Typechecks, lints, tests, builds, CI, blocking hooks, ratchets |
| **Nondeterministic, shared** 🙂   | AGENTS.md, in-repo docs, shared skills, existing coding patterns, guidance returned from shared tools, shared agent sessions | PR review agents, shared classifiers, human reviews          |
| **Deterministic, personal** 🙂    | Personal tools and MCP servers, local permission setups, local env config | Personal lints and hooks, local pre-commit                   |
| **Nondeterministic, personal** 🫠 | Your prompt, local memories, personal skills, CLAUDE.local.md, a bespoke dev environment only on your laptop | Yelling at Claude for being a complete doofus                |

The job, increasingly, is not producing code. It’s iterating a system – guidelines, guardrails, and tools – that help your whole team produce good code. As more teams run coding agents in the cloud, kicked off from Slack, Linear tickets, or incident reports, it’s even more important that your agents do the right thing regardless of where they run.

In this view, it’s obvious why improving deterministic guardrails, in your repo, for your whole team, is far higher impact than having Claude stick a verbose “don’t do bad thing” memory on your laptop.

## Debugging shared tooling

So we know that improving in-repo guidance and guardrails is the highest-leverage way to improve how agents work on your team. But there’s a dangling question here. If your one change can now affect thousands of nondeterministic agentic coding runs across a whole team, how do you know your changes were good?

Of course you tested the AGENTS.md overhaul yourself, and your agents aren’t adding useless unit tests anymore. At least, as far as you can tell – they’re producing a lot of code, and the problem wasn’t happening every time. Wait, this PR from Steve has useless unit tests – but had he pulled your new instructions before he wrote this? And come to think of it, is your new instruction causing any unwanted side effects or token waste?

As with any form of context engineering work, maintaining in-repo instructions and guidelines for coding agents leaves you in want of observability traces. It works well most of the time, but what about 99%? How expensive is the extra work you’re having the agent do now? If we stop stuffing context with these docs, things are faster and cheaper – are the agents finding the docs when they need them?

In an ideal world, your agents could answer these questions by analyzing the traces of coding agents on your team that exhibited problems or leveraged the docs in question.

[Amp coding environment](https://ampcode.com/) shares by default, so that’s helpful.



## Guarding the Gate



- Docs
  - README
  - ADRs
  - Specs
- Instructions
  - AGENTS.md
  - Sub-instructions for domain area, repo
- Skills
  - Imported
  - Team-maintained
  - Invoked
  - Automatically run
- Guardrails
  - CI
  - Lints
  - Review agents
  - Human flags/approval rules



- A simple mental model
- Left shift
- Speed and Jev
- Troubleshoot with Powerplant
- AWS AI SDLC and Matt Pocock