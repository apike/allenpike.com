---
layout: post
author: allen
title: "A Box of Many Inputs"
summary: "On browsers, local classifiers, and Roger Rabbit."
date: 2025-12-31T23:45:30.955Z
featured: false
image: "/images/2025/framed-google.jpg"
tags:
  - llm
  - products

---

One of the interesting questions when designing AI-enabled software is, “What does search input mean?”

This was once a simple question: if a user entered “squish” in a search box, it would of course return things that contained “squish”. Over time, computers have improved to the point where a kind of universal “omnibox” is now possible. Today software can:

1. Return things with your input’s **typo** fixed
2. Return things with a **synonym** to your input
3. **Autocomplete** recent or popular things
4. Directly retrieve an **answer** to your input
5. Jump to an **action** based on your input
6. Generate a **conversational** response to your input

Ideally, users shouldn’t need to think about which mode they want. They should just be able to type enough characters to make their intent clear, then press Enter.

While this is great in theory, it creates a very crowded design space for input boxes. While most kinds of software will end up with an omnibox-like input – especially with the rise of [universal command bars](https://maggieappleton.com/command-bar) – one of the most fiendish cases is found in the web browser.
## The Omnibox

At birth, browsers’ address bar required precise input. To get to Wikipedia, you would have had to type `http://www.wikipedia.org` precisely. Now, you can mangle it as `wiikipo` and still get there, which is impressive in its own right.

However, with modern technology there is even more we can do with the address bar. The rise of “AI browsers” like Dia, Atlas, and Comet all strive to layer more functionality into this input field.

For example, in Dia if you type `how much did atlassian buy the browser company for` in the address bar, it will forego Google and use the in-browser chat to correctly answer $610 million. If it sees a question, it sends it to chat. Seems maybe helpful, right?

Except sometimes you’re not *asking* a question, you’re *searching* for a question. Check out what happens when you search for the movie "Who Framed Roger Rabbit?" below.

<div class="centered">
<video muted loop playsinline controls style="max-width: 100%;">
  <source src="/images/2025/dia-who-framed.mp4" type="video/mp4">
</video>
</div>

This is basically never what the user wants when they type a film title into the browser omnibox.

Now, if you typed “who framed roger rabbit” into ChatGPT, a chat response would not be surprising. It’s a chat app. But people expect browsers to be able to browse to things, even if the thing’s name starts with `who`.

Admittedly, Dia’s algorithm for question detection is more complex than prefix-matching. They’ve bundled a little classifier that detects if a phrase has “question vibes”.

| Phrase triggers search | Question starts chat |
|--------|------|
| may june july | may rutabagas be eaten |
| leather shoes white soles | help me pick shoes |

By doing question classification locally with a very small model[^1], they can identify questions within milliseconds, with no effect on privacy. Smart!

Except. There are a lot of cases where it’s difficult to classify a phrase by whether it should get an answer or a search result. Consider these results from Dia’s question classifier, all of which *should* do a search:

| Phrase triggers search | Question starts chat |
|--------|------|
| roger rabbit movie | who framed roger rabbit wikipedia |
| a can of beans recipe | can of beans recipe[^can] |
| steppenwolf lead singer | guess who lead singer |
| gladiator you not entertained | are you not entertained |

So it’s imperfect at identifying questions. But more critically, even if they hill-climbed to 100% on “is this a question” accuracy, that’s still a dead end.

The actual classification we want is “is this a *question they are asking*, or is it a *phrase they want to search for*?” Unfortunately, that’s a much harder training problem! Currently, it’s beyond the ken of a fast local classifier.

As I’ve been weighing alternative browsers, I expected other “AI browser” contenders to have the same problem. To my surprise, no. ChatGPT Atlas avoids it entirely by keeping their heuristic very simple: if a query has less than 10 words, send it to search – otherwise chat.[^2] If you want to explicitly send a short query to chat, you can press ⌘ + return.

Meanwhile, Perplexity’s Comet and Google’s Chrome send every query to their respective search engines, which use larger server-side models to determine whether a given result should get a more chat-forward response or a more results-centric one. As of today, Google errs on the side of returning web results, and Perplexity errs on the side of giving an AI-generated answer, but both can do either.

In time, these different search and chat engines will converge toward a design that gives users a good experience almost every time, without the need for modes. Already Google is [testing out merging their “AI mode” into the AI overviews](https://techcrunch.com/2025/12/02/google-tests-merging-ai-overviews-with-ai-mode/) that appear on results. And presumably OpenAI will evolve to give more search-like responses to pedestrian search queries, in their ever-growing quest for world domination.

Of the four leading contenders for the "AI browser" crown, only Dia tries to interpret `who framed roger rabbit` as a question.

## The Path for Dia

From here, Dia can go one of two ways. They can either go all-in on their own answer engine, competing with Perplexity and Google, so they can send every query there. Or, they can concede on the local classifier and do as ChatGPT Atlas has done – just route all short queries to search.

Earlier this month, Atlassian CEO and Dia acquirer Mike Cannon-Brookes [gave an interview where he mentioned the acquisition and the future vision](https://stratechery.com/2025/an-interview-with-atlassian-ceo-mike-cannon-brookes-about-atlassian-and-ai/). Reading the tea leaves, it seems Dia could fulfill Atlassian’s vision of building the browser for professional productivity without needing to become a full-on search engine.

On the other hand, Cannon-Brookes mentioned the supposedly-retired Arc[^3] browser three times and didn’t use the phrase Dia once. So... it’s hard to tell exactly what the path is going to look like.

Regardless, with The Browser Company’s talent and Atlassian’s reach, it would be rash to count them out in this one. They’ll fix the Roger Rabbit thing soon enough.

But while browsers encountered it first, time will bring more and more ambitious text boxes. Many of them will initially struggle to deliver on our intent. But, despite some growing pains, the holy grail is within reach. People should be able to type what they want their software to do, and it should do it. And it should do so without any unpleasant surprises. Quickly.

It won’t be easy! But it'll be great.

[^can]: I love the idea of the model thinking, “Oh I found a question! `can of beans recipe` starts with `can`! So the user is asking whether or not ‘of beans’ can recipe.”
[^1]: You can see in the app bundle that it’s a DistilBERT model, with LoRA adapters for routing search queries and for identifying sensitive content, running on Apple’s MLX for speed. It looks like the whole local ML package is about 160MB. While that size class of model can be powerful for certain tasks, it’s hard to pack in enough world knowledge to distinguish between film titles and popular quotes vs. genuine questions.
[^2]: Dia also sends long queries to chat – anything over 12 words.
[^3]: I can’t mention Arc without a shout out to one of my favourite features of all time: Tab Tidy. If you have a bunch of tabs open in Arc’s vertical tab bar, a little Tidy button will group the tabs by logical topic or task. Then, you can close them group by group. So neat.
