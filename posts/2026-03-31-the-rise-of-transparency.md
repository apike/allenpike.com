---
layout: post
author: allen
title: "The Rise of Transparency"
summary: "Finding signal in the firehose."
date: 2026-03-31T23:45:30.955Z
image: "/images/2026/transparent-tea.jpg"
tags:
  - llm
  - teams

---

Small companies are, by default, very transparent. When there are 4 people working in a room, you have a direct line of sight on what everybody else is doing, and why. Your docs, Slack channels, and repositories are open to everybody. When the CEO has an epiphany that changes everything, you all know right away – probably because you were at lunch together when it happened.

Thus, startup founders will often get religion about transparency. "Our culture," they'll declare, "is to be radically transparent! Everything defaults to open. We hire adults, expect them to do great work, and give them the context they need." Yay transparency!

<div class="centered">
<img src="/images/2026/transparent-tea.jpg" alt="A transparent cup of tea." />
</div>

And this works pretty well. Transparent orgs tend to delegate more effectively, have higher accountability, less politics, faster trust, and just plain ship more. Transparency helps bigger orgs adapt more quickly to the ground truth, responding to customer signals that execs might not be directly exposed to.

But, at a certain scale, radical transparency strains.

Some idle musing by the CEO sends a team off on an unimportant side quest. A well-justified compensation anomaly upsets a group who is missing background information. A 450-message Slack thread about bike shed paint color choices devolves into factions, hashtags, and philosophical arguments about the morality of taupe. #nevertaupe

And if you talk to people at a large yet highly transparent company, you'll hear about the hazards of the relentless **firehose**. A thousand shared Slack channels, to start. But also a glut of docs – some critical, most unmaintained. Then there's the meeting notes, meeting recordings, and meeting invites. Plus proposals, requests for comment, and requests to comment on your proposals' comments' resolutions. "So, you like information, eh? Well, have all the information in the world!" How do you make sense of all this?

While some people are tenaciously able to find, within this chaos, the important info they need to do great work, a lot of otherwise-capable people get easily distracted by information that just *might be* urgent, provocative, or even just… shiny. 🪎

Meanwhile, allowing everybody access to every historical doc is occasionally useful, but it also presents an ever-growing surface area for leaks and legal liability. Are you sure there isn't something highly sensitive or disagreeable in those 99,999 unmaintained Notion docs?

So, as companies grow, they tend to lock information down. Some – Netflix, Stripe, Shopify – do their best to keep as transparent as possible while still complying with necessary guardrails. Others – Apple, Palantir, Oracle – move toward a need-to-know basis, ensuring information flows top-down. With more control over information, it's easier to ensure that leaks or internal distractions don't derail your plans for surprising product launches and/or world domination. 

Of course, every company's culture is forged by the market they operate in, but there's always some tradeoff here. And as companies grow, they tend to regress to a boring middle ground.

However. As with many tradeoffs, the balance has recently begun to shift.

## Given this firehose, please assess my plan

Recently, we've seen a revolution in tools that can make better use of the firehose. Slack can now summarize your unread messages, albeit with mixed effectiveness. Tools like [Glean](https://www.glean.com/) and [Unblocked](https://getunblocked.com/) can consider a mountain of your company's data and answer important questions about it, albeit limited to the data they can actually see. And large open companies like Shopify and Stripe have internal tools that let employees' agents query, analyze, and act on the copious data any given employee has access to – albeit with some sharp edges and exfiltration risks.

Just as LLMs are making the world's data more useful to the world, they're making companies' internal data more useful to employees.

Of course, this can be misused! In some companies we'll see further secrecy – I've heard of AI search tools and MCPs letting employees find accidentally-visible compensation data and other spicy docs that hadn't been audited. I've heard of support agents giving customers true-but-problematic information because they surfaced it with internal AI tooling without proper training.

But as we evolve past early growing pains, and into teams and processes fully making use of this stuff, the anecdata points toward this new tooling becoming a superpower. Agents' newfound ability to effectively query and reason about far more data than can fit into context is making the long tail of communications and docs much more useful for decision-making – but only when people have access to the relevant data.

Given that, **the maturation of AI tooling will motivate companies to become more transparent**.

In 2024, the cost of being internally secretive was meaningful but manageable. Although Apple keeping information need-to-know sometimes leads to waste, or important changes being slow to diffuse through layers of management, they've done, like, pretty well for themselves? With all the scrutiny from press, competitors, and regulators, you can see why they've kept it up.

But as all companies increasingly have tools that can assess, consider, analyze, and make use of all the business' communications and documents, what kinds of org are going to benefit most? Well, the ones that let their employees access more context.

Extremely transparent orgs like Zapier, GitLab, and PostHog that might have struggled to cope with their firehoses – and who often had gaps in the data due to untranscribed meetings and decisions – will increasingly be able to leverage it. Sure, not all of it, certainly not at first. (Some of it is just junk.) But increasingly more of it. And critically, it won't just be executives that will be able to attend to all this knowledge.

## Where we ought to be

The frontend dev working on your internal admin dashboard should be flagged that the React upgrade issue they're battling right now was just solved by the customer-facing dev team. The intermediate developer who is incensed about a company-wide tech decision should be able to build their understanding of why it was made without booking a 1:1 with the responsible Principal Engineer. Your go-to-market team should be able to "see" through to the code, developers' conversations, and the recent decisions around a given feature, letting them give customers correct and timely information about what to actually expect from the product today.

And everybody in your company should, when it's useful, have key company-wide strategy docs available to their agents as they make plans and decisions. And then, when a new revelation motivates the exec team to improve those docs, then bam. All the product engineers' agents will take this new strategy into account right away. Anybody who's worked at a large company and/or used CLAUDE.md knows this won't be a silver bullet – deeply ingrained habits and momentum can not be simply prompted away. But as the tools and the data improve, the advantage will accumulate.

When we launched [a realtime meeting agent](https://cedarloop.ai/) last month, we expected to get feedback about its defaults being too open – currently, Cedarloop defaults to sharing its collaborative notes and tools with all attendees live. But instead, we've seen two diverging kinds of feedback: many of our users want the tool to be less visible to external guests and customers, but *more* open internally within their companies. Which in retrospect makes a lot of sense: decisions and actions in your team's work are increasingly useful across your company, but your customers shouldn't need to worry about all that.

So long story short, more internal transparency is coming.

It will take some time. Apple isn't doomed, and just because Zapier and Shopify are already working that way doesn't mean they're going to instantly be turbo-boosted. But it seems a new era is coming, where siloed knowledge, information hoarding, and secrecy-by-default will become less tenable.

The firehose will evolve from a spicy distraction to a useful input to important work.
