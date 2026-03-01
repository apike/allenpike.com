---
layout: post
author: allen
title: "Launch Now"
summary: "On trading comfort for speed."
date: 2026-02-28T23:45:30.955Z
image: "/images/2026/cedarloop-screenshot.jpg"
tags:
  - startups
  - forestwalk
  - products

---

Inside us are two wolves.

One wolf wants to craft, polish and refine – make things of exceptional quality. The other wolf wants to move fast and get feedback now.

The two wolves don't always get along.

For years, I've balanced this by working toward exceptional products but constantly collecting private feedback along the way. Then, once we've built something excellent, something worthy of attention, we launch it to the world with appropriate fanfare. Videos, marketing campaigns, polished onboarding, and so on. "Here's something worth trying, we think you'll really like it."

This totally works. At least, it works as a path to eventually ship high-quality software. Polished, usable, even delightful software.

But when it comes to building something people will pay for, it's neither reliable nor fast.

## A tale of three products

Our first product at Forestwalk was a developer tool – [a platform for building and running evaluations of LLM-powered apps](https://www.youtube.com/watch?v=NM7HcXehH2Q). We learned a ton building it, but after a few months – as we approached our first pilot projects – feedback from demos and potential first customers convinced us that this was the wrong path. It was more likely to lead us into a lifestyle business than something big. So we pivoted.

We spent a few weeks building a prototype a week, showing demos, doing customer research, and found a second promising product path.

Our second product was a productivity tool – a [work assistant that could capture, organize, and rationalize teams' tasks](https://www.youtube.com/watch?v=0ptXBlsZwC0). We learned a ton building it, but after a few months – as we approached a public beta – feedback from private testers and our investors convinced us that this was the wrong path. It was more likely to lead us into a lifestyle business than something big. So we pivoted.

The third time purports to be the charm. But at the same time, doing the same thing over and over typically gets the same results. We need to build something profoundly useful, something people really want. We can't keep hiding away, sending out private demos and prototypes, not fully shipping anything!

So, we decided to push harder into the discomfort of showing our work early. Just before Christmas, we decided to commit to something and work towards getting it shipped.

This third product is codenamed Cedarloop[^1]. It's a realtime meeting agent. Unlike AIs that passively listen in to meetings and just write up notes after the fact, Cedar joins calls and uses "voice in, visuals out" to screen-share useful observations and perform routine tasks live during a Google Meet or Zoom meeting. The vision is to build a kind of agentic PM assistant. It can respond within a second of you talking[^2], which – when it works – feels like magic. We've been learning a lot building it.

<div class="centered">
<img src="/images/2026/cedarloop-screenshot.jpg" alt="Cedarloop screen-sharing live meeting insights during a Google Meet call." />
<span class="caption">On the todo list: a simpler layout for 2-person meetings.</span>
</div>

Recently, we started working with [an excellent designer](https://www.jayceeday.com/) here in Vancouver who was keen to get going.

> I'd like to do some user testing. What do people say when you let them try it?
{.top}

> Well, obviously it's so early right now. They won't like it. The inference and onboarding need more work. But we've been doing research about problems, needs, willingness to pay, and things like that.
{.speaker-2}

> Sure… but we should also let people try it. What if we launched now?

> Well, obviously we can't launch *now*. I mean… obviously.
> 
> Right?
{.speaker-2 .bottom}

Launching now would be embarrassing. It's not my brand to launch something publicly that's not ready.

On the other hand…

I keep a [printed copy of Y Combinator's list of essential startup advice](/images/2026/yc-pocket-advice-printable.pdf) on my desk. And if you know YC, you'll know that the first point of advice is "Launch now".

Only last month I was [interviewing Brett Huneycutt, Wealthsimple's co-founder](https://www.itshipped.fm/episodes/35). He had a lot of great stories, but one that sticks out is that even as a $10B company, they prioritize launching "now", for as close as they can get to that definition. It's not just about speed: a rapid feedback loop is a core ingredient in getting to quality.

So we launched now. As of today, people can check out our research-preview realtime meeting agent at [Cedarloop.ai](https://cedarloop.ai/). With luck, they'll report issues, inform what we should prioritize next, and tell us what problems they'd love to have automated away.

We're only a few hours in, and yep – people are reporting issues. Linear integration had an OAuth issue. Login didn't work in social-media webviews. We've been so focused on the desktop experience that we've let the mobile layout get janky. This is embarrassing!

But also, there's signal. People are trying the Linear integration. Our desktop-focused app is being discovered on mobile. Folks care enough to click at all. And in a week or so, we'll have a smoother onboarding flow than we would have gotten to with weeks of private user tests. So it's worth the pain.

We're going to take the feedback, follow the signal, learn and re-learn, and do better. We'll use it to forge the best damn live agent ever – or, if the feedback peters out, we'll know we're on the wrong path, and find the right one.

In the meantime, there's a lot to do.[^4] Back to work!

[^1]: This is not a good name yet. For example, sometimes iOS mishears "Hey Cedar" as "Hey Siri". But part of our move-fast strategy is to worry more about names once we've proven something has traction. At that point, we'll put in the work to give it the right name – and eventually rename the company after it.
[^2]: It's fascinating how much you can do to get LLM response times down. Our first prototype often took over 8000ms to respond, which doesn't feel live at all. Once we got it under ~1200ms, voice-in-vision-out suddenly felt alive – a step change. We have a lot of work planned to get Cedarloop even faster and much more reliable, which I'm keen to write about when I can.
[^4]: Speaking of having a lot to do: if you're an experienced product-minded developer in Vancouver who would be excited to iterate and build out realtime agents using LLMs and TypeScript, we're hiring a [Founding Engineer](https://forestwalk.ai/jobs/founding-engineer/). Just sayin'.
