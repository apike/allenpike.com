---
layout: post
author: allen
title: 32K of Context in Your Pocket
summary: A wild large-context LLM appears.
date: 2023-03-15T05:45:30.955Z
categories:
  - Article
tags:
  - llm
---
One month ago, I wrote about on [the limits of 4K-token AI models, and the wild capabilities and costs that large-context language models may one day have](/2023/175b-parameter-goldfish-gpt). Today, OpenAI not only debuted [GPT-4](https://openai.com/research/gpt-4) with a doubly large 8K token limit, but demoed and began trials of a version that supports a whopping 32K tokens of context. The [accompanying paper](https://cdn.openai.com/papers/gpt-4.pdf) is sorely lacking details due to the “competitive landscape”, but we still have some indication of its impressive capabilities – and costs.

In OpenAI’s [developer livestream](https://www.youtube.com/watch?v=outcGtbnMuQ), they used this large window to demo pasting in large and complex documents for the model to make use of – for example, a ream of API documentation, and the US tax code. It's also easy to imagine how large contexts could be used to craft very complex and sophisticated prompts.

More interestingly to me, though, I suspect 32K may be enough context to create something that makes users feel like they’re building a relationship with a bot over time. That is, it would enable keeping a coherent indefinite rolling history of your interactions with the bot, given a bit of scaffolding to protect key memories and requests, and build a sense of a mutual understanding. When it comes to personal uses like assistants and entertainment, this is a game changer.

As expected, though, conversing with a model with this much context is expensive. How expensive? Here is OpenAI’s [current pricing](https://openai.com/pricing) to fill each model’s context for a single query:

* GPT-3.5: **8¢**
* GPT-4: **24¢**
* GPT-4-32k: **$1.92**

Yes, at maximum context size, asking questions from GPT-4 would cost you $2 per question. Plus additional cost for the generated tokens.

Which seems like a lot of money to pay for a chatbot response?

But this, of course, is just the beginning. There is probably already a healthy profit margin on this top-tier API, and a volume purchase deal to be had. And the march of hardware and software will bring costs down substantially over time. Perhaps you also bring costs down by selectively filling the context; maybe you only fill 1/4 of the context, at 1/8 of the cost, for a friendly softball question, and bring the might of the whole model to bear when it's asked to reorganize your calendar to be more the way you want it, or to help you reflect on your goals for the year.

So, just like that, the question of when we’ll have large-context LLMs is answered. A new question arises: when will they get cheap enough that thousands of interactive products are built on top of them, delighting and terrifying us with what they can do?

Tick, tock.
