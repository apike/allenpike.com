---
layout: post
author: allen
title: 32K of Context in your Pocket
summary: A wild large-context LLM appears.
date: 2023-03-15T05:45:30.955Z
featured: false
categories:
  - Article
---
One month after [my article](/2023/175b-parameter-goldfish-gpt) on the limits of 4K-token AI models, and the potentially prohibitive costs of large contexts, [GPT-4](https://openai.com/research/gpt-4) today doubled its context limit to 8K tokens, and is trialling a version that supports a whopping 32K tokens of context. The [accompanying paper](https://cdn.openai.com/papers/gpt-4.pdf) is sorely lacking details for “competitive reasons”, but we still have some indication of these much larger context windows’ costs and capabilities.

In OpenAI’s introduction of the model, they used this large window to demo pasting in large and complex documents for the model to make use of – for example, a ream of API documentation or the US tax code. The new length also could be used to craft very complex and sophisticated prompts. More interestingly to me, though, I suspect 32K may be enough context to create something that makes users feel like they’re building a relationship with the model – a mutual understanding – over time.

32K is perhaps enough – and, I’m pretty confident, within an order of magnitude of enough – to keep a coherent indefinite rolling history of your interactions with the bot, given a bit of scaffolding to protect key memories and exchanges.

As expected, though, conversing with a model with this much context is expensive. How expensive? Here is OpenAI’s pricing to fill each model’s context for each query:

* GPT-3.5: 8¢
* GPT-4: 24¢
* GPT-4-32k: $1.92

Yes, at maximum context size, asking questions from GPT-4 would cost you $2 per question, plus additional cost for the generated tokens.

$2 seems like a lot to pay for a chatbot response? But this, of course, is just the beginning. There is probably already a healthy profit margin on this top-tier API, which can probably be brought down with volume purchase. And the march of hardware and software will bring costs down substantially over time. Perhaps you also bring costs down by selectively filling the context; maybe you only fill 1/4 of the context, at 1/4 of the cost, for a friendly softball question, and bring the might of the whole model to bear when asked to discuss the meaning of life.

So, just like that, the question of when we’ll have large-context LLMs is answered. A new question arises: when will they get cheap enough that thousands of interactive products are built on top of them?

Tick, tock.