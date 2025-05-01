---
layout: post
author: allen
title: "Post-Chat UI"
summary: "How LLMs are making traditional apps feel broken."
date: 2025-04-30T23:45:30.955Z
featured: false
image: "/images/2025/postchat-terminal.jpg"
tags:
  - llm
---

First, there was the terminal.

<div class="centered">
<img src="/images/2025/postchat-terminal.jpg" alt="DOS" />
</div>

You typed text. Scrolling text came back. It was:

- Powerful
- Flexible for power users
- Easy to program

But also, since it was centered around a blank input field, it was:

- Daunting
- Unintuitive
- Bad for selecting and manipulating stuff

Fortunately, over the decades our user interfaces got much better. We got graphical interfaces. We got direct manipulation, visual navigation, and rich thoughtful user experiences. It was great!

In 2022, ChatGPT brought us back to text. Back to a world of talking to the computer via a single input field, and getting a scrolling list of responses back.

Just like the terminal, chat-based AI is powerful, flexible for power users, and easy to program. But it has many of the problems that terminals had: it’s daunting, unintuitive, and an awkward way to do many kinds of work.

Amelia Wattenberger [describes the problem astutely](https://wattenberger.com/thoughts/our-interfaces-have-lost-their-senses):

> We made painting feel like typing, but we should have made *typing* feel like *painting*.

While chat is powerful, for most products chatting with the underlying LLM should be more of a debug interface – a fallback mode – and not the primary UX.

So, how is AI making our software more useful, if not via chat? Let’s do a tour.

## Co-authorship

The first baby step beyond chat puts your work product – a document, for example – front and center, with the chat pushed off to the side.

<div class="centered">
<img src="/images/2025/postchat-canvas.jpg" alt="ChatGPT Canvas" />
This Canvas UI is what you get if you ask ChatGPT to iterate a document with you.
</div>

You’ve seen an experience like this if you’ve used Copilot in Excel, or the Cursor IDE. It’s far better than copying and pasting things into ChatGPT, but it still has the problems that chat-centric interactions do.

More interesting is how apps are using AI to reinvent traditional UX.

## Generative Right-Click

The easiest place to put a feature that acts on something is a context menu. Right-click on a thing, and in many apps now you’ll now see AI-powered actions for it.

<div class="centered">
<img src="/images/2025/postchat-dia.jpg" alt="Dia cursor menu" />
The <a href="https://www.diabrowser.com/">upcoming Dia browser</a> will infuse contextual AI actions right into your cursor. Still not sure if they’re crazy or geniuses.
</div>

Menus are discoverable. You don’t need to guess that the AI is good at writing the next line – the product indicates this clearly.

One challenge here is that the set of things that AI can do is, uh, wide. At first, already-bloated right-click and “…” menus will explode with an overwhelming number of options, making them almost as daunting as an arbitrary chat field. But in time we’ll rein it in, and this will be a bread-and-butter place to surface useful AI features.

## Intuitive Search

Another UI convention being reinvented is the search field.

It used to be that finding your flight details in your email required typing something exact, like “air canada confirmation”, and hoping the email you want used that same wording.

Today, you should be able to type “what are the flight details for the offsite?” and find what you want.

<div class="centered">
<img src="/images/2025/postchat-search.jpg" alt="Superhuman search" />
For now this requires <a href="https://superhuman.com/ai">Superhuman’s Business plan</a>, but in time this pattern will become cheaper and more universal.
</div>

Experience this once, and products with an old-school text-match search field will feel broken. You should be able to just find “tax receipts from registered charities” in your email app, “the file where the login UI is defined” in your IDE, and “my upcoming vacations” in your calendar.

Figma now lets you [search for a design by pasting in a similar-looking screenshot](https://youtu.be/O4a4bVIe5As?si=6hNY5AFL8z2juTVA&t=71). The era of needing to remember exactly what something is named is ending.

## Type Instead of Pick

Another common UI pattern is pickers. We’re constantly picking – whether it’s filter options, dates, or themes.

<div class="centered">
<img src="/images/2025/postchat-picker.png" alt="Typing to choose a date" />
Superhuman just letting me type a date.
</div>


While natural-language inputs for date pickers have been acheivable (with substantial effort) for years, it’s now within every team’s reach to add [inuitive fields](https://x.com/pontusab/status/1853123214823846064) in places we previously made users pick from lists.

As we start to see new interfaces that support these more humane controls, it will seem increasingly inhumane that we once chose “Helvetica”, “Semibold”, and “36pt” from three separate dropdowns. It *is* inhumane – it’s an artifact of the past, back when computers needed us to chunk up our inputs into separate dropdowns for them, lest they be confused.

A more general form of “type instead of pick” is the [Command-K Bar](https://maggieappleton.com/command-bar/): a text input that lets you take any important action, right from the keyboard, given your current context. Instead of picking from a toolbar, apps like Linear and Superhuman let you just type “Mark all as read” and it’ll autocomplete the command.

This was already nice to have pre-LLM, but is way more powerful now that we can connect a fuzzy search to the command list, and have an agent help perform these actions. Where software onboarding historically pushed users into a tour of things they might want to pick, it can now ask what their immediate goal is – and guide them on how to achieve it.

## Inline Feedback

We’ve had colored highlights indicating spelling errors for ages now. But inline feedback on your work is no longer constrained to just spelling and grammar. 

Maggie Appleton has [a great illustration of this with her “writing daemons” concept](https://maggieappleton.com/lm-sketchbook/): configurable personalities that give you the feedback you want. Maybe one is a devil’s advocate, another encourages you to simplify, and another [insists that you cite your sources](https://x.com/rauchg/status/1865125266336432271?s=61).

<div class="centered">
<img src="/images/2025/postchat-inline.png" alt="Inline feedback on text" />
I think of this pattern as “putting LLM angels and devils on your shoulders”.
</div>

Our need for chat-based review and feedback will decline as the next generation of apps evolve to support inline and ambient suggestions – strengthening your work as you go.

## Clean Up

Humans are kind of messy. We mean well, but many of us end up with messy desktops, messy inboxes, and messy codebases with inconsistent naming patterns. Luckily, computers are now good at cleaning this up for us.

Figma’s recent [Rename Layers feature](https://help.figma.com/hc/en-us/articles/24004711129879-Rename-layers-with-AI) is a great example. Designers often work in files full of poorly named layers – “Hero Image copy 2”, and the like. That’s no longer necessary – just click “Rename Layers” and it changes them to something reasonable. 

<div class="centered">
<img src="/images/2025/postchat-cleanup.png" alt="Figma cleanup" />
I am in love with this.
</div>

A more complex cleanup might require followup questions for the user, but in most products this can be fully chat-free.

## Summary and Synthesis

As [imperfect](https://allenpike.com/2024/apple-intelligence-ios-18-2) as Apple Intelligence’s rollout has been, its notification summaries are a great example of useful non-chat AI. A noisy group chat exchange summarized as “Plans tonight cancelled, pencilled in for next weekend” is a godsend.

<div class="centered">
<img src="/images/2025/postchat-summary.png" alt="Apple Intelligence" />
</div>

Group chat summaries are just one way LLMs can help tame the firehose of information we’re exposed to. If you’ve worked in a large company, you know that there is 1000x more information going by than you can ever engage with. Now, we can build products that help people pull signal from the noise, surfacing what matters to their work – no chat needed.

## Voice

An natural thing that comes up when we talk about post-chat interfaces is voice. While most AI voice chats today are still a linear back-and-forth sequence of words, [Amelia Wattenberger points out](https://wattenberger.com/thoughts/our-interfaces-have-lost-their-senses) that humans and AIs are both multimodal: we can talk and point at the same time, and an LLM can talk and show at the same time.

Why type into a chat UI “Hey, where is the code that defines the user button in the top right, specifically the one to the left of logout” when instead you can wiggle your cursor over the button in question and ask,

> where is the code for this?

Our agent could then just respond,

> Found it.

and open the file.

This isn’t yet built into the workflows we’re using today, but it’s now possible, and should be a really useful way of working with AI.

## Do the Obvious Thing

This is my personal favourite non-chat AI pattern. So often in software, the next thing we’re going to do is telegraphed by what we’ve done so far. Finally, we can build products that offer to do these obvious next things for our customers, and simply have them confirm it.

<div class="centered">
<img src="/images/2025/grammarly-tab.jpg" alt="Grammarly typo correction" />
I just made a typo, and a reasonable next action is for Grammarly to fix it.
</div>

I’ve [written previously about the tab completion pattern](https://allenpike.com/2025/tab-continuation-completion), where professional tools can adopt the flow we see in Cursor, where the user can press tab to take the next likely action. But this pattern can generalize all over our software – in so many cases, an LLM can provide a reasonable default title, navigate to the next step in our workflow, or otherwise relieve us from repetitive work. Over time, this frees us to think more about the creative and meaningful aspects of what we’re doing.

## Final Boss: Completely Generated UI

This last one is either the future final form of human-computer interaction, or pipe dream nonsense.

LLMs can now generate user interfaces. Not only can [bolt.new](https://bolt.new/) generate the code for a user interface, but models can now also generate a custom interface in real-time – specific controls, buttons, layouts, even navigation – tailored to the exact needs of the current user.

This is amazing. But also presents a few problems.

Let’s set aside the challenge of doing this at a sufficient speed and quality level, and building [effective evals](https://allenpike.com/2024/testing-automated-evals) to get past the gnarly product design and quality control problems. Those are solvable.

A deeper problem arises when your interface is completely dynamic: it’s hard to learn. Office XP had a feature called “IntelliMenus,” which automatically hid infrequently-used menu items. The PMs from that time [came to regret this path](https://www.computerworld.com/article/1707017/gui-gaffes.html):

> Not knowing what was on the menu confused people. What was on your menu was different from my menu, or if you went on vacation, things would disappear.
> …
> We had design tenets for Office 2007 that said, “Don’t do adaptive behaviors.”

So yeah, maybe we’ll discover that generative UI is a dead end. Or *maybe* LLMs are powerful enough to overcome these hurdles, and eventually this will be the only kind of UI that matters. 

Either way, it’ll be an interesting few years.

## Go forth and build

As these patterns roll out in the software we use – unevenly, but steadily – traditional software UX will seem more and more backward. Some products will adapt. Others will be unseated by newcomers that start fresh with these new patterns, delivering the most useful and delightful experiences yet.

Just like the era back when GUIs were displacing the terminal, these are fun times to be excited about software.
