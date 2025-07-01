---
layout: post
author: allen
title: "Spending Too Much Money on a Coding Agent"
summary: "On making use of large thinking models."
date: 2025-06-30T23:45:30.955Z
featured: false
image: "/images/2025/cursor-agent.jpg"
tags:
  - startups
  - llm
  - choosing

---

For a year, I’d been coding almost every day with Cursor and Claude Sonnet. Anthropic’s 3.5 and 3.7 Sonnet each rightly earned their dominant place on the [programming model charts](https://openrouter.ai/rankings/programming): they were the least-bad coding models yet.

In the earliest days of LLMs, there was tremendous interest in ever-larger model releases. Hype around bigger, slower models has since waned, as Claude 3 Opus, GPT 4.5, and OpenAI o1 – all large and technically impressive model releases, each useful for some niche purposes – were ultimately too expensive and slow to be worth the squeeze for day-to-day coding.

But then, this spring, something interesting happened.

## Full speed ahead

Last month, my co-founder Jenn and I were rapidly sprinting to hit a self-imposed deadline (demoing our latest experiment at Web Summit Vancouver). Luckily, Claude Sonnet is truly helpful when coding – especially in TypeScript. Still, under time pressure, I started to get annoyed with its LLM-isms: overcomplicating changes, proposing unnecessary dependencies, and just [literally changing failing tests into skipped tests](https://www.lesswrong.com/posts/rKC4xJFkxm6cNq4i9/reward-hacking-is-becoming-more-sophisticated-and-deliberate) to resolve “the tests are failing.” Like, what the crap?

Frustrated, I tried switching from Claude Sonnet to the new o3 thinking model. I knew o3 was painfully slow, so I took the time to write out exactly what I knew, and what I wanted the solution to look like, and gave it some time to work. To my surprise, the response was… great?

The more I tried it, the more I found o3’s improved ability to use tools, assess progress, and self-correct led to results that were actually worth the wait. I found myself expanding what terminal commands I allowed the agent to run, helping it get further than ever before. When I completed a hard “o3-grade” task and moved on to something simpler, I was increasingly tempted to leave it on o3 instead of switching back. Sonnet was faster in theory. But o3 was faster in practice.

The only problem was, it was costing a fortune.

Depending on the task, my o3 conversations were averaging roughly $5 of Cursor requests each, or about $50 a day. That… is a lot of money.

Still, we were in a hurry. And what is a startup if not a series of experiments? So I turned to my co-founder.

> Jenn, I have a proposal. You’re going to hate it.
{: .speaker-2 }

> I’m listening?

> So you know I’ve been getting really good results from o3. I propose we try just defaulting to o3 for the next 3 weeks until our demo, and increase our Cursor spending cap to $1000/mo.
{: .speaker-2 }

> That’s a *lot* of money.

> I know. It’s ridiculous. This is ridiculous. But also, when we hire a Founding Engineer, they will cost a lot more than that. Like, 10x more.
{: .speaker-2 }

> …Okay. Let’s try it. If it’s not worth the cost, we’ll go back.

So we tried it. And, to both of our horror, it was worth the cost.

We’ve found that compared to Claude 4 Sonnet and GPT-4.1, large thinking models like Claude 4 Opus and especially OpenAI o3 will:

- More successfully use tools like MCPs and CLIs to troubleshoot issues
- Less often propose overlarge patches that add risk or tech debt
- More often find relevant code, instead of duplicating things
- Less often “reward hack” by commenting out tests or otherwise being a dolt
- Be a more effective research partner when weighing potential tech approaches
- Follow our Cursor rules more diligently, including the rule not to try adding npm dependencies that don’t even flippin’ exist, you complete dingbat

Still. $1000/mo is insane. So I’ve been keeping an eye out for somebody to convince me we’re crazy.

Instead, in early June [Andrej Karpathy claimed](https://x.com/karpathy/status/1929597620969951434):

> o3 is the obvious best [model] for important/hard things.

At a software company, coding counts as important. A couple days later, the Head of Engineering at Shopify [cited a coding model budget of $1k/month/dev](https://x.com/fnthawar/status/1930367595670274058?s=61) as being “cheap”.

Emboldened, I decided to test the water by mentioning to one of our investors – a co-founder at a relatively large tech company – that we were trialling spending $1000/mo on o3 inference.

> $1000/mo! What are you doing with o3 that’s costing that much? I’m averaging $50/day on Claude Opus 4

> $50/day is $1000/mo?
{: .speaker-2 }

> Oh lol right, yeah you’re good

So I guess it really is a thing. You can get $1000/mo of value from coding agents now.

## How to get $1000/mo of value from coding agents

Obviously, simply spending $1000 does not guarantee you a positive return! Here are some practices that we’ve found get more value out of large thinking models like o3 and Claude Opus:

- **Shift errors earlier**: The faster you can detect a coding error, the cheaper it is to fix. This is doubly true for LLMs. Shifting errors from runtime → test-time → build-time makes everybody more productive. Even better, fix issues deterministically with a linter or formatter. Let your expensive LLMs and humans focus on the squishy parts.
- **Use boring technology**: LLMs do much better with well-documented and well-understood dependencies than obscure, novel, or magical ones. Now is not the time to let Steve load in a Haskell-to-WebAssembly pipeline.
- **Refine your Cursor rules**: Whether they’re literal [.cursor/rules](https://docs.cursor.com/context/rules) or your IDE’s equivalent, collect and iterate useful prompts and docs for LLMs in your repo. This compounds across a team: if Jenn uses a Cursor rule to tamp down the LLM from idiotically coding a “fallback” path around code that never worked in the first place, I get that same benefit next time I pull.
- **Improve your dev scripts**: If checking your CI for error logs is convoluted, add an `npm run get:ci-errors` script. If your console logs are a noisy firehose, change it so you can launch with `DEBUG=myapp:namespace` to surface only the relevant logs.
- **Invest in readable code**: Your ratio of reading code to writing code has now gone way up. Pursue small files, clean type hints, and clear naming conventions.
- **Have empathy for the model**: It can only do so much before it [collapses into incompetence](https://machinelearning.apple.com/research/illusion-of-thinking). Observe what the model is struggling with, and improve its environment to make both of your jobs easier. How you [manage the model’s context and attention](https://blog.nilenso.com/blog/2025/05/29/ai-assisted-coding/) makes a big difference.

If you have a big codebase that isn’t Python or TypeScript, you might still be skeptical that you can get $1000/mo of value from these tools. Well, you’re in luck: working with large agentic models is much more affordable than it was way back 4 weeks ago when we did our experiment.

1. On June 10 OpenAI dropped the price of o3 by 80%.
2. On June 16 Cursor debuted [a new Ultra plan](https://www.cursor.com/blog/new-tier) at $200/mo.
 
Together, these give you more than enough requests to use o3 or Claude Opus full-time. Or maybe the move is to pay $200/mo for [Claude Code Max](https://www.anthropic.com/news/max-plan), then pay-as-you go for o3 in Cursor.

Either way, the question is becoming less “how can we justify the cost of coding with large thinking agents” and more “how can we have more agents going at once?” New paths are popping up all the time:

- You can now spin up Cursor background agents from [Slack or the web](https://www.cursor.com/blog/agent-web).
- You can use Claude Code to script refactors or other big jobs.
- You can have one agent draft a PR, and another agent (with clean context) sanity check or critique it before human review.
- You can configure Cursor to pick up each Linear issue in your current sprint and prep it with an initial PR. It can draft a proposed fix, or at least give you a starting point, e.g. identify relevant files, do architectural analysis, write a failing test, or figure out which commit caused the bug.
- You can now have [o3-pro](https://help.openai.com/en/articles/9624314-model-release-notes) run 10 copies of o3 at once on each problem, and automatically pick the best output.
- Or heck, you can simply have two checkouts of a repo, one on each monitor, and work with a second agent while you wait for the first.[^1]

<div class="centered">
<img src="/images/2025/cursor-agent.jpg" alt="Two cursor agents working on tasks." />
Coding agents can be assigned a variety of tasks.
</div>

As the tools improve and we get better at using them, the state of the art moves from “wow, this LLM lets me vibe code so much unmaintainable slop for my demo” but towards “wow, these 3 agents can work at once to help me make clear, maintainable improvements to existing code.” It’s a pretty big accelerator.

I think Thomas Ptacek [put it well](https://fly.io/blog/youre-all-nuts/):

> Even the most Claude-poisoned serious developers in the world still own curation, judgement, guidance, and direction. … [Coding models] devour schlep, and clear a path to the important stuff – where your judgement and values really matter.

Less time typing code and debugging typos, more time thinking about systems and how they come together to make useful stuff for customers.

I think that’s pretty cool.

[^1]: This seemed objectively bokners, but especially on days where o3 is slow and you're churning out easy fixes and polish items, it can be effective. Jenn tried three at once, but it was a bit much.
