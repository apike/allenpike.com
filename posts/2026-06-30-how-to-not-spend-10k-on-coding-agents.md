---
layout: post
author: allen
title: "How To (Not) Spend $10k/wk on Coding Agents"
summary: "On too much of a good thing."
date: 2026-06-30T23:45:30.955Z
image: "/images/2026/coding-oh-no.jpg"
tags:
  - llm
  - forestwalk
  - overboard

---

Word on the street is that the cost of building software is going to zero.

Zero? Sounds like a good deal!

Over the last year, my co-founder and I have iteratively automated our coding loops. Each time better tools revealed a bottleneck, we’d address it. Agents would sometimes break things or propose slop, so we [added more tests and guardrails](https://forestwalk.ai/blog/test-coverage-wont-save-you-from-incoherence/). Our PRs piled up, so we automated the mechanical parts of review. When UX review became a bottleneck, we had agents attach demo videos to PRs.

Nothing revolutionary – just stubborn hill-climbing on our dev loops.

By April, Jenn had our agents *humming*. They were automatically and safely fixing lints, nitpicks, merge conflicts, outdated dependencies, and other maintenance chores. Our velocity kept increasing, and I started to file bugs and propose improvements that we previously wouldn’t have had time for. We could respond to user requests same-day. We were working hard, but moving fast.

It was also generating a lot of Anthropic and Cursor and OpenAI overage emails?

But this is the way of the future. We’re a funded startup. And coding costs are supposed to go to zero. And Jenn’s shipping 30 PRs in a day now. Being delightfully responsive to our customers is a superpower!

Okay okay, this is a lot of overage emails. I’ll assess our weekly spend.

<div class="centered">
<img src="/images/2026/coding-costs.png" alt="A breakdown of our weekly coding agent spend." />
</div>

> Hey Jenn? How surprised would you be if I told you we’re spending $10,000 a week on coding?
{.top}

> I have been working a lot. But… that is too much.
{.speaker-2 .bottom}

StrongDM infamously claimed in February that [you should be spending at least $1,000 per engineer per day](https://factory.strongdm.ai/) on your coding factory. Well, we did it. Do we get a prize for our profligacy?

## This is too much

Yes, our coding agents were delivering a lot of improvements. But you can hire a *pretty* good engineer for $10k/week. Within a couple days we’d cut this spend way down, while maintaining most of the velocity – some techniques for this below.

But every week, I hear of more teams hitting this same transition point. Coordinating agents to do something is less compelling if they're more expensive than having a human do that same work. Thus, we’re moving from the era of “how can we use more coding agents?” to “how can we get the most out of our coding agent spend?”

This change is all around us. Sam Altman has started [saying that token costs are a “huge issue”](https://openai.com/business/intelligence-at-work/). Brian Armstrong is talking about [how to do more agentic coding at a lower cost](https://x.com/brian_armstrong/status/2070670644577280109). Uber is [throwing model labs under the bus](https://www.theinformation.com/newsletters/applied-ai/uber-cto-shows-claude-code-can-blow-ai-budgets) over agent spend.

The vibe has shifted. There are a few reasons for this, but much of it is downstream from cloud coding.

## Cloud coding costs

While you can go pretty far juggling a few agents on your laptop and [leaving it propped open all day](https://www.businessinsider.com/coders-keep-laptops-open-in-public-ai-agent-2026-5), getting the most out of coding agents really requires them to run in the cloud. We've seen a lot of workflow benefits from cloud coding, many of which are described in OpenAI’s [Symphony coding factory blog post from April](https://openai.com/index/open-source-codex-orchestration-symphony/).

However, it’s worth noting this in OpenAI's writeup:

> This way of working dramatically reduces the cognitive cost of kicking off ambiguous work. If the agent gets something wrong, that’s still useful information, and the cost to us is near zero. We can very cheaply file tickets for the agent to go prototype and explore, and throw away any explorations we don’t like.

“Very cheaply” if your tokens are free! Model labs' employees are shielded from the cost of full-on software factories.

For the rest of us, cloud coding gets expensive for the same reasons that cloud compute gets expensive:

1. It makes it easy to do lots of work at once
2. It’s more expensive per unit of work than using your own laptop
3. It can make wasteful work go unnoticed

When we first got into cloud agents, we ended up primarily using Cursor’s. While Codex and Claude Code are the current monarchs of local development, Cursor’s cloud coding harness and workflows are quite a bit more mature than Codex’s or Claude’s.[^codex-cloud] However, this capability comes at a premium: Cursor charges a markup on API costs on top of Anthropic and OpenAI, and you can’t turn off their “MAX” mode for cloud coding. Using Claude Fable for Cursor Cloud Agents is fecking expensive.

At the AI Engineering World’s Fair this morning, Openclaw creator Peter Steinberger gave a short talk about cloud coding workflows, where he joked about token costs:

> Last year, I was primarily constrained by tokens. And I fixed that! By joining OpenAI.

Luckily, there are other approaches to deal with exploding inference bills. **Coding costs are the multiplicand of token cost and token count, so let’s look at each.**

## Cheaper tokens

While the typical advice for coding has long been to use frontier models for everything, and model labs have been mostly focused on those most-expensive models (with Claude Fable hitting $10/Mtok), that’s starting to change.

- Today Anthropic [announced Sonnet 5](https://www.anthropic.com/news/claude-sonnet-5), at $3/Mtok
- [GPT 5.6](https://openai.com/index/previewing-gpt-5-6-sol/) will offer medium and small variants at $2.50 and $1 respectively
- GLM 5.2 is perhaps the most frontier-competitive open coding model in years, and it’s being [offered around $1](https://openrouter.ai/z-ai/glm-5.2?utm_source=chatgpt.com)
- Cursor’s Composer is only $0.5/mtok[^composer-cost] – 1/20th of Fable’s cost.

While these smaller models can be much cheaper for easy tasks, it can be a pain to route queries to the right-sized model. Anybody who has run an engineering team has lived this: you select a set of tasks for a junior dev, thinking “these should be easy ones.” Most of them are easy enough, but one of them turns out to be fiendishly difficult when they dig in.

If you’re lucky, Composer or GLM will throw up its hands when it’s assigned an overly difficult task without wasting too much money. If you’re unlucky, it will spin for ages, coding confidently incorrect PRs that waste your time and money – or worse, get deployed to users.

Various startups are working on model routers that attempt to accurately assess how hard an issue is, and assign a right-sized model to each task and subtask. I’m a bit skeptical that 3rd parties will be able to produce better routers than the model labs themselves, but until the model labs have effective routers of their own, a combination of automatic and human routing is necessary to balance perf and costs.

## Fewer tokens

In coding, the most expensive tokens are still often worth the price, but we want to use them judiciously. And even for cheaper models, it's best to use the minimum number of tokens necessary for a given unit of product improvement shipped.

That means sending less context for each turn of the agent, and taking fewer turns to get to success.

The first step toward using fewer tokens is having an [agent-ready codebase](https://factory.ai/news/agent-readiness). There are well-known techniques for making a repo more navigable by agents. This is obviously easiest for greenfield projects, but there is a lot you can do to help agents be efficient in any codebase, reducing the need for them to explore and trial-and-error to understand your product and verify PRs.

For example, working to shift verification left can save a lot of tokens. Just like for humans, it’s much cheaper for an agent to run and fix lints early on, than to push to CI, tail CI logs, and only receive an error much later.

Another useful tactic is to prune your context. In Claude Code, for example, you can type `/context` to get an overview of what your session is spending context on. It’s also worth reviewing expensive agent sessions after the fact using a tool like [AgentsView](https://til.simonwillison.net/llms/agentsview-custom-model-price), helping you assess what was using all those tokens. At one point we noticed agents running our unit tests with `--verbose` and processing this output. All they needed in context was a simple "success"!

Going further, there are [tools like Unblocked’s context engine](https://getunblocked.com/) that can help deduplicate and reduce how much context needs to be sent to the agent – collapsing the repetitive work of gathering and pruning that every agent session needs to do, making for a more deterministic and cheaper loop.

And while cloud coding agents are awesome, it’s important to watch how their behaviour differs from local agents’. For example, Cursor's cloud harness has a different system prompt that pushes it to continue relentlessly until it strictly needs user input, and to eagerly push intermediate work to GitHub. There are advantages to these behaviours, but we found our coding agents were pushing intermediate PRs to Github ~10x as often as our human-driven sessions. This led to [a huge increase in CI runs](https://forestwalk.ai/blog/surprise-blacksmith-costs/) and LLM-powered guardrail checks until we tamped this down.

And finally: don’t do shit you don’t need to do.

Getting a coding factory up to speed can be intoxicating. It can feel urgent to fuel it with work. While having idle salaried engineers is indeed wasteful, it’s better to let your coding agents run idle if you need to think, talk to customers, and understand what really needs to be built. Don’t simply forge onward in the wrong direction at high velocity.

<div class="centered">
<img src="/images/2026/coding-oh-no.jpg" alt="Oh no." />
</div>

## The high cost of free coding

We’re in the early stages of rethinking how software engineering works. Some teams are still working toward using many agents at once, and the rest of us are grappling with the side effects of doing so.

Each generation of coding agents is capable of doing more helpful work, and making yet bigger messes. More factory-like coding patterns require us to develop new tools and expertise to use them well.

Occasionally getting there is messy, expensive, or frustrating. But the prize on the other side is being able to build better and more useful software than we ever could before.

Plus, it's a lot of fun to figure out.

[^codex-cloud]: OpenAI has been teasing that an overhauled cloud coding environment is coming. Here's hoping Anthropic is too.
[^composer-cost]: [Composer](https://cursor.com/docs/models-and-pricing) also has a Fast variant that is $3/Mtok, but for cloud coding you often don't need to pay for the extra speed. Another wrinkle with Composer: cache hits consume a full 40% of uncached token cost, as opposed to Claude's mere 10%.
