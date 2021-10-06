---
author: allen
comments: true
date: "2017-03-31 20:00:00"
layout: post
slug: "principle-of-least-surprise"
title: "The Principle of Least Surprise"
summary: "An iceberg looms, and we take evasive action."
image: "/images/2017/surprise-crop.jpg"
featured: true
categories:
- Article
tags:
- steamclock
---

The status meeting is going well. Your demo was well received, the new feature is looking great, and you’ve been nailing your estimates.

The product manager glances at her notes, and remembers one last thing. “Oh also, a lot of customers are asking for offline editing support on this screen.” Your eyes narrow, as they always do when you hear *offline* and *editing* in the same sentence. “The CEO’s asked us to prioritize it, so we’re going to go ahead and add it to 1.0.”

*Bwoooooosh…* time slows. The product manager has just lobbed a Scope Bomb. A threat to any project, the Scope Bomb is capable of causing great disruption and despair.

“Uh…” You try to think quickly. “It does seem like a good addition, but…” You stare down the bomb as it sails across the boardroom table. “I’m not sure if two weeks is enough time though.” There, you said it. Your defense is mounted: they have been warned.

“Oh, I’m sure you can do it,” the project manager smiles. *“I have faith in you.”* Aw, that’s a nice thing to say.

“Thanks,” you hear yourself respond &ndash; and just like that, the bomb is armed. Unless somebody disarms it, in two weeks it will go off. Everybody except you will be surprised. This is bad.

<img src='/images/2017/surprise.jpg'>

In project management, surprise is the enemy. All surprises are suspect, but bad surprises are the actual worst. They are, bar none, the most common cause of conflict and stress on projects. Whether you’re a project manager or a junior team member, everybody benefits if you work to avoid surprises.

Yet, on most teams, people instead optimize for keeping up appearances. They give out optimistic estimates, assume that questionable approaches are being taken for good reasons, and [green shift](http://calleam.com/WTPF/?p=1205) status by under-reporting danger. They think, “Why worry them about the budget if we might still pull it off?” Shortcuts like these may make this week’s status meeting more pleasant, but they turn next month’s launch into a crunchy hell.

You see, when potential problems lurk under the surface, decision-makers and managers *can’t do anything about them*. A team that’s off track early on can always be corrected. On the other hand, when the navigator is surprised by an iceberg, you're gonna hit that iceberg.

And so, in software, people are hitting icebergs all the damn time. Teams unexpectedly miss deadlines, architecture problems come to light at the last second, and Steve suddenly announces that his month-long vacation to Bora Bora starts tomorrow. God damnit Steve! Where even *is* Bora Bora? What the hell are we going to do now?

Well, what we’re going to do is teach our team how to minimize surprises. Yes, the whole team. Having a skilled project manager on any team is valuable, but as with quality, surprise minimization starts with you.

## Ice report, 42 to 41.2N

The key to surprise minimization is &ndash; big shock here &ndash; communication. If there’s a problem in software development that isn’t somehow helped by better communication, I don’t know what it is. Perhaps cache invalidation.

In any case, managers and other decision-makers get a lot of information thrown at them. They’re seeing status from everybody, they’re getting pressure from all sides, and just aren’t focused full-time on how your project is going. While it *is* their job to cut through this noise and focus on what matters, it’s *your* job to nominate potential problems and dangers for consideration.

Now, these messages may not be fun to hear. An optimistic or distracted client may not absorb an early warning. Maybe you mention that Steve has vacation in April, but your CEO is “sure it will be fine.” It’s easy then, to lean back and feel absolved of your responsibility &ndash; whether or not anybody actually plans for Steve’s absence.

The thing is though, your job isn’t to *say* something, it’s to *communicate* something. If, as April approaches, it’s clear that nobody is taking into account this huge hole in the development plan, the fact you  mentioned it once a few weeks ago doesn’t save anybody from hitting that iceberg, taking on 7 tons of water per second, and inspiring a profitable but tragic blockbuster film starring Leonardo DiCaprio.

So leaders tend to miss potential dangers. Whether brought on by optimism or distraction, it’s a thing. That’s why the name of the game is &ndash; repeat after me &ndash; [repeat stuff](https://www.youtube.com/watch?v=nt9c0UeYhFc). If things are going to go wrong and nobody is doing anything about it, bring it up until they do something about it.

Admittedly, repeating potentially unwelcome warnings can be uncomfortable or annoying, and a lot of us in software are conflict-adverse. Nobody wants to pick a fight or be antagonistic, so it helps to have an approach for this. Here’s one simple technique: **raise the issue in the form of a question that points to a potential fix**.

While saying “This deadline still looks questionable” is easy enough to brush off or get generically defensive about, the question “What’s our plan if we miss this deadline?” requires the recipient to actually absorb and process the idea of maybe missing the deadline. Next time it seems like a warning isn’t being heeded, give it a try:

- Since we probably won’t get all these features in, what are the lowest priority items in this list?
- Have we announced this target release date to anybody, or is it just our internal goal?
- How much time do you want us to spend attempting to hack around this limitation before it’s worth just building our own component for it?
- Do you think you’ll have that budget authorization in by Friday, or should we be planning to pause development while we’re waiting for it?
- Given how problematic these APIs have been in the past, can we put an extra week in the timeline for downtime and API regressions?
- Do I get to run this place while Steve’s in Bora Bora?

Of course, you have to keep question-oriented pushback from devolving into   passive-aggressive “would you rather us ship a good product, or add your stupid hamburger menu that everybody hates” needling. You can call out issues without being a jerk.

In fact, these kinds of early warning questions often motivate positive conversations about icebergs before things are tense and options are limited. Ask them early, and ask them often. Otherwise, chances are, your project is in for a titanic surprise.

