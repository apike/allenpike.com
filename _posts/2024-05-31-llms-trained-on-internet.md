---
layout: post
author: allen
title: LLMs Aren’t “Trained On the Internet” Anymore
summary: "One reason models will keep getting better."
date: 2024-05-31T05:45:30.955Z
featured: false
categories:
  - Article
tags:
  - startups
  - llm

---

I often see a misconception when people try to reason about the capability of LLMs, and in particular how much future improvement to expect. It’s frequently said that that LLMs are “trained on the internet,” and so they’ll always be bad at producing content that is rare on the internet.

A recent [example from Hacker News](https://news.ycombinator.com/item?id=40333672):

> LLMs are mostly trained on Internet posts, so they are Internet simulators.

Wikipedia also [frames LLM training this way](https://en.wikipedia.org/wiki/Large_language_model):

> LLMs are trained on increasingly large corpora of text largely scraped from the web.

Even former Apple SVP of Engineering – and famously sharp computer scientist – Bertrand Serlet explains them thus, in his recent video [Why AI Works](https://www.youtube.com/watch?v=QwtyIDmhxh4):

> [An LLM has] been trained on the entire internet, so it has packed all this knowledge that’s in the internet, but also all the reasoning patterns that can be found [there.]

Admittedly, this used to be true! And is still *mostly* true. But it’s increasingly becoming less true.

Because it’s becoming less true, the idea of an “increasingly-accurate internet simulator” is not a useful way to predict how GPT-5 and beyond will work. They are already exceeding this in some ways, and the shift is only beginning.

## The Data Wall

Way back in 2020, OpenAI’s [GPT-3 paper](https://arxiv.org/pdf/2005.14165) had a substantial section on their training dataset. GPT-3 was, basically, trained on the internet.

<div class="centered">
<img src="/images/2024/gpt3-data.png" style="max-width: 455px">
<p>An artifact from a bygone era, when OpenAI was open.</p>
</div>

By 2022, LLMs were being [trained to follow instructions](https://arxiv.org/abs/2203.02155) using custom human feedback. Since then, frontier model labs like OpenAI have gotten very cagey about what exactly goes into their training datasets. We don’t know what is in GPT-4o’s data set, let alone Sora’s or GPT-5’s.

But we do know **it’s not just the internet**.

Recently, LLM trainers have hit a “[data wall](https://www.theverge.com/2024/4/1/24117828/the-internet-may-not-be-big-enough-for-the-llms)”. More data generally improves model training, but OpenAI already has more or less all the data on the internet – even inconvenient-to-access data like [Youtube video transcriptions](https://www.theverge.com/2024/4/6/24122915/openai-youtube-transcripts-gpt-4-training-data-google). So beyond training ever-larger models out of the same internet data, how can they make better LLMs?

The answer, for labs with a lot of money, is creating and acquiring non-internet data. At first, this was data that either made existing training data more useful, or added non-public data to the training pool. For example:

1. **Annotation and filtering**: Researchers have been creating annotations for their training data for years. Good annotations let them focus LLM training on the highest value data, which allows for better (or smaller) models.
2. **RLHF**: Labs also have humans rate different model outputs. They use this data to fine-tune the models, and encourage useful behaviours like instruction-following and refusing to say naughty things.
3. **Usage data**: ChatGPT is [said to](https://www.interconnects.ai/p/the-data-wall) generate on the order of 10 billion tokens of data per day – even before they opened their more compelling GPT-4o model to free users.
4. **Data acquisition**: While a lot of humanity’s data is on the internet, much of it is not. Emails, chat logs, proprietary manuals and procedures, JIRA tickets, phone recordings, internal reports, and contracts are all useful data. While examples exist on the internet, model trainers can cut deals to add many more of these to their training data.

So that’s all helpful.

But none of these techniques are a complete solution to a critical weakness of current models: the “**LLMs suck at producing outputs that don’t look like existing data**” problem.

Here are some things that LLMs are bad at doing, in part because there aren’t a lot of examples of text on the internet that demonstrate this:

1. Expressing doubt or uncertainty
2. Making high-level plans for an LLM agents to pursue
3. Having long conversations without re-treading phrasings or looping
4. Reasoning like a Principal Engineer about a massive legacy codebase
5. Reliably following extremely long or complex prompts

While improved architectures and more parameters might help with these limits, you can bet your butt that OpenAI, Meta, Google, and/or Microsoft are paying big money to fill some of these gaps in a simpler way: **creating more examples to train on**.

## Future LLMs will be trained on custom data

A good example of the rise of custom data is Microsoft’s [Phi-3 Technical Report](https://arxiv.org/abs/2404.14219) published in April. phi-3-mini is only 3.8 billion parameters – a waif in LLM terms – but claims performance competitive with the impressive but much-heavier Mixtral model. The paper credits some of this improvement to including high-quality synthetic data, generated by large LLMs, in its training data. This allows them to fill gaps in the internet-sourced data, and significantly improve model performance for a given size.

Now, synthetic data is a hot topic in LLM research. It’s not yet clear how far you can go with training LLMs on their own output before things [go horribly wrong](https://arxiv.org/abs/2404.01413), like a giant neural snake eating its own tail.

At the minimum, though, synthetic data will help fill the kind of gaps that arise when LLMs are simply behaving as “internet simulators.” For example, if your model is hallucinating because you don’t have enough data that carefully expresses doubt, then generate more!

Still, generating great synthetic data using LLMs is a challenging problem, and will have its limits. That’s why there’s one last huge source of non-internet data to consider: Humans.

## How much data can you create for $1B/yr?

It turns out that if you pay people money, they’re willing to make data for you. [Scale.ai](https://scale.ai/), which bills itself as “the data foundry for AI,” operates a service where you can pay humans to do just this. Supposedly, AI companies are paying more than $1B a year and growing for Scale’s services. While some of this is for annotation and ratings on data that came from the internet or LLMs, they also [create new training data whole-hog](https://fortune.com/2024/05/21/scale-ai-funding-valuation-ceo-alexandr-wang-profitability/):

> The company has shifted its focus to more highly-specialized workers such as Ph.D-level academics, lawyers, accountants, poets, authors, and those fluent in specific languages. These workers, who help train and test models for companies from OpenAI and Cohere to Anthropic and Google, also work through a third-party, often another Scale subsidiary called Outlier, but are paid higher hourly wages.

Not only can companies like OpenAI pay to have professionals create new, good data that fills holes in the internet-sourced data, they keep that data to then train any subsequent models. A dataset like “50,000 examples of Ph.Ds expressing thoughtful uncertainty when asked questions they don’t know the answer to” could be a valuable asset for years.

So yes, LLMs were originally trained on the internet. Yes, we can understand a lot of their early weaknesses as stemming from the foibles of the stuff people post online.

However, as the size and impact of non-internet training data increases, we should expect LLMs to markedly exceed “internet simulation.” In particular, they should continue to get better at doing things people will pay for LLMs to do well, assuming $1B is enough money to create or label examples of those kinds of outputs.

That is to say: this train will keep rollin’ for some time yet.
