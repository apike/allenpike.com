---
layout: post
author: allen
title: From Chatbot to Everything Engine
summary: "OpenAI’s new “GPTs” have a fascinating design constraint that signals an ambitious future."
date: 2024-01-10T05:45:30.955Z
featured: false
image: "/images/2024/gpts-banner.jpg"
categories:
  - Article
tags:
  - llm
---

This morning, OpenAI [launched the GPT Store](https://openai.com/blog/introducing-the-gpt-store): a simple way to browse distribute customized versions of ChatGPT. GPTs – awkwardly named to solidify OpenAI’s claim to [the trademark “GPT”](https://techcrunch.com/2023/04/24/gpt-may-be-trademarked-soon-if-openai-has-its-way/) – consist of a custom ChatGPT prompt, an icon, and optionally some reference data or hookups to external APIs. In the coming weeks, OpenAI will also start paying developers based on usage of their GPTs.

While GPTs may prove useful in their current form, they’re part of an even grander plan. The exact path is yet to be seen, but I believe OpenAI tipped their hand with a very specific choice in how GPTs are designed.

<div class="centered">
<img src="/images/2024/gpts-banner.jpg">
</div>

### Conversation starters

Here is a common model for building a custom chatbot on the GPT-4 APIs:

1. A user navigates to your bot. (e.g, a feedback coach built on OpenAI’s API)
2. The bot introduces itself, and asks you an initial question.
3. The user responds to the question, and the conversation goes from there.

OpenAI GPTs do not support this model.

Specifically, unlike many API-powered bots, GPTs are not allowed to do Step 2: they cannot have the first word. A GPT author can provide a blurb describing the GPT, or provide suggested inputs to the user, but GPTs sit silently until you send them some kind of initial message. This forces a flow like this:

1. A user navigates to your bot. (e.g. a feedback coach GPT)
2. A user types something – anything – to the bot.
3. The bot responds to the… whatever it was, and the conversation goes from there.

This was initially baffling to me as a developer. When we built [the Feedback Wizard](https://steamclock.com/blog/2023/12/assembling-the-feedback-wizard), a structured coaching experience backed by GPT-4, it was clear that the Wizard should start the conversation by asking the user the first question. This is how a lot of software works: you start it up, and it asks you something.

- “What do you want to find?”
- “Where do you want to go?”
- “On a scale of one to ten, how would you rate your pain?”
- “Shall we play a game?”

This “computer starts with a question” model seemed especially well-suited for building GPTs. For example, the whole point of the Feedback Wizard is to ask you questions. Attempting to build a GPT version of it under the constraint that the GPT can’t start the conversation was annoying.

Meanwhile, GPTs are set up to offer “conversation starters” – snippets of text users can tap to get things rolling, which force developers to think about how the GPT might be queried. When putting together the [Feedback Wizard GPT](https://chat.openai.com/g/g-LVVFlflyw-the-feedback-wizard), I felt pushed into writing conversation starters like “Can you help me frame some feedback for a co-worker?” – entry-points that felt redundant, given that the user has already selected a feedback coaching tool. However, while doing the work of changing my prompt from a bot-first flow to user-first flow, it struck me why OpenAI designed GPTs to be written in this backward-feeling way:

GPTs have to wait for user input before saying anything, because that will make them useable as **building blocks of an Everything Engine**.

## The Everything Engine

ChatGPT is powerful, but has many limitations. No company can build, by itself, an Everything Engine: one text box that you can type into for any problem. OpenAI experimented with [plugins](https://openai.com/blog/chatgpt-plugins) to expand ChatGPT’s capabilities, but plugins competed with one another in-context, and the business model was questionable. Worse, there was too much friction to finding and selecting the plugin you wanted to use.

While GPTs may seem like they have similar problems, they offer a clear evolutionary path to a low friction, scaleable, and potentially highly profitable user experience. In a world where many useful GPTs exist, and those GPTs are written to respond to user input rather than start conversations with people who select them, ChatGPT can incrementally become an Everything Engine simply by routing requests to the best GPT for the job.

Let’s say you ask ChatGPT, “Can you help me choose some goals for the year?” it could offer to send your query to a well-rated Goal Planner GPT, built by an expert life coach. If you ask, “How are the markets today?” it could sub into Yahoo Finance’s stock market GPT, equipped with realtime market APIs. If you ask, “Where should I go on vacation?” it might leverage a travel expert’s lovingly crafted GPT for helping you consider your options.

Just joking, it’ll offer the Tripadvisor GPT. Or whoever the highest bidder was. We won’t see sponsored GPT results for a while, but the Everything Engine has the potential to be the most compelling ad opportunity since web search results pages. If it works, the incentive for OpenAI to accept bids on GPT usage would be immense.

<div class="centered">
<img src="/images/2024/gpt-wolfram.jpg">
<p>LLMs aren’t great at math, but <a href="https://chat.openai.com/g/g-0S5FXLyFN-wolfram">Wolfram</a> is.</p></div>


Admittedly, OpenAI might retain enough of their not-for-profit DNA to resist the urge to monetize the Everything Engine like this. Maybe. Or maybe Sam Altman will be fired again on the path to executing on building it. But even if they don’t do it, Google will.

If I’m right – if a model and ecosystem like GPTs can be used to build a compelling Everything Engine – then an ad-supported Everything Engine is coming. I’m more than willing to pay $20/mo for ChatGPT Plus, but most people won’t. But they *will* visit a free website where they can type into a text field, and it will answer their questions with ads.

Right now, that website is Google for most people. But no matter how much work Google puts into their Quick Answers and Bard, no one company is going to be able answer everything on its own. Serving the long tail of queries in one place – creating an Everything Engine – will require an ecosystem of developers and content providers.

In the coming years, if we do start to see the emergence of the Everything Engine, well… we will live in interesting times.

----

*Thanks to [Adam Lisagor](https://adamlisagor.com/), [Jenn Cooper](https://www.linkedin.com/in/jennifer-cooper-24a3b711/), Chris Parrish, and [Paul Kafasis](https://onefoottsunami.com/) for feedback on this article and the ideas behind it.*