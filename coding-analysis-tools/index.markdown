---
layout: page
title: Where should coding agents’ sessions be stored?
updated: 2026-11-24
---

Given the amount of research I do on tooling for evals, telemetry, and analysis of agent behaviour, I get asked a lot about the tooling ecosystem. We know storing and sharing a subset of agent sessions (aka traces, logs, or transcripts) is helpful. Here are my latest findings and understanding – if any of this is incorrect or out of date, let me know!

## The Goal

Coding agents like [Claude Code](https://code.claude.com/docs) are powerful, but fallible and inconsistent. Each coding session plays out differently, depending on the instigating prompt, the local environment setup, the model and harness, and models’ natural nondeterminism. To iteratively improve our SDLC, we need to understand how agents are actually working, not just at the output step (e.g. the PR) but at a turn-by-turn level. Ultimately, the loop looks like this:

1. **Collect**, redact, and index your team’s coding sessions
2. **Evaluate** the session data and propose improvements to your repo and tooling
3. **Implement** improvements, goto 1.

There are many tools and approaches for this. Let’s look at some options and their tradeoffs.

## Each developer’s laptop

By default, tools like Claude Code keep session logs – or “traces” – on developers’ laptops. Claude Code’s `/insights` tool, projects like [`ccusage`](https://github.com/ryoppippi/ccusage), and Matt Pocock’s [`/retro` skill](https://github.com/mattpocock/skills/blob/main/skills/engineering/retro/SKILL.md) all leverage these logs.

Of course, local analysis can only consider one developer’s own local agents. These assessments won’t find or fix problems that are happening in cloud sessions, software factories, or on teammates’ machines. But for solo devs or small teams, this can be sufficient for assessing and improving how their agents are working, even if the logs are often lost to time and the shuffle between machines.

Larger teams generally want some way to find and address problems – waste, friction, agent mistakes, and the like – in a way that considers how a whole team is working. This raises the question: where do you store this data?

## A security and compliance gateway

For certain use cases, a “gateway” product that proxies your coding agents’ traffic can be the best place to store and take action on how AI coding tools are working. Tools like [Portkey](https://portkey.ai), [LiteLLM](https://www.litellm.ai), and [Cloudflare AI Gateway](https://developers.cloudflare.com/ai-gateway/) receive the entire stream of traffic between your team and their coding agents, and allow you to audit and take action on security, compliance, cost overage, or other red flags in how agents are behaving. For customers on Claude Enterprise plans, Anthropic also offers a direct [Compliance feed](https://platform.claude.com/docs/en/manage-claude/compliance-api) that can be used for this purpose, though this is meant only for compliance and security reasons, not analysis.

While gateway products are useful with large development teams, they are not generally designed to store and make available session data or metadata that helps developers improve their repos and workflows – they’re primarily about halting unacceptable behaviours.

## Your Git repo

Tools like [Entire](https://entire.io), [SpecStory](https://specstory.com), and [git-ai](https://github.com/git-ai-project/git-ai) attach information about coding prompts and session details to Git commits. There’s an elegance to this: your code was produced with a certain human intent, and agents helped validate and iterate it. Attaching this context can help reviewers assess that individual change, and also inform improvements to how the whole team is working with agents.

The main objection teams have to Git as the storage mechanism is the permissions model. While code commits are necessarily shared with all collaborators on a repo, the sessions that produced those commits might include more sensitive information that should be shared only in aggregate, or not at all. A secondary objection is that Git is not necessarily an ideal interface for querying and analyzing the session data, though this can be remedied by layering tooling on top.

## LLM eval tooling

Tools like [Langfuse](https://langfuse.com), [Braintrust](https://www.braintrust.dev), and [LangSmith](https://www.langchain.com/langsmith) grew up to provide observability and evaluation for developers of LLM-powered apps. Claude Code is an LLM-powered app, so why not upload its underlying traces to an AI eval tool?

Certainly this can be helpful! If you are building a custom harness, or fine-tuning developer experience details like cache hit rates or tool call syntax, general AI o11y tools like these can give you detailed visibility into exactly how Claude Code interacts with its underlying inference APIs.

On the flip side, the kinds of work most devs do to improve their team’s agents – improving docs and skills, refactoring code that confuses models, adding lints – are quite different than the lower-level work that AI engineers working directly on model harnesses do. Developers think and work in terms of repos, skills, and scripts, not agent traces.

Meanwhile, the security implications of uploading unredacted traces from coding agents to a platform meant to debug those agents can be pretty daunting.

## General telemetry platforms

More general observability tools like [Datadog](https://www.datadoghq.com), [Dash0](https://www.dash0.com), and [Grafana](https://grafana.com) can receive OTel outputs from Claude Code, which optionally include session traces. The more general shape of these tools allows greater customizability, letting large teams build their own metrics, alerts, and reporting on the telemetry that comes in.

At their best, these tools allow your team to build and maintain custom AI coding intelligence tools suited for purpose, only surfacing and highlighting the analysis that makes sense for your developer experience team, and make a usable projection of that data available to teams using MCP.

At their worst, building your own Claude OTel ingestion and analysis tool on a general o11y platform (or worse, an entirely homegrown solution) requires constant maintenance and improvements to make sure the platform is giving your agents what they need, and staying up to date with the latest changes and improvements in both the model harnesses and emerging practices in AI SDLCs.

## An MCP-accessible purpose-built backend

Finally, developer-centric tools like [Traces](https://traces.com), [Powerplant](https://usepowerplant.com), and [Mosaic](https://mosaic.inc) redact, index, and store session data in a way specifically meant for software engineering teams to share. While these can also be fed with OTel, in many cases teams upload session data or metadata using a CLI. This CLI approach allows local data to be redacted and subset before it leaves devs’ machines.

Generally, platforms that are built specifically for sharing coding sessions have permissions, reporting, and features specifically for helping dev teams find mistakes, improve their in-repo skills and docs, and improve PR mergeability. The tradeoff is between using a tool specifically for improving engineering effectiveness and velocity, as opposed to a more general tool that could also be used for other purposes.

Regardless of what solution teams choose, it’s important to evaluate the MCP accessibility of the uploaded session data. In order for coding agents to prioritize, build, and evaluate fixes for agent friction, waste, and other AI development issues, they need to be able to query the relevant info about how agents are working in a given repo – not just the raw traces, but information like what skills, MCPs, docs, and models are being used, and how workflows and approaches vary across the team.

---

However you decide to share coding sessions on your team, I’d love to hear how it goes for you and what is and isn’t working!
