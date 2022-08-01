---
layout: post
author: allen
title: How to Go Over Budget
summary: On working within an estimate.
date: 2022-08-01T12:42:18.627Z
featured: false
categories:
  - Article
tags:
  - projects
  - teams
---

Assembling a good project estimate can be hard. Unless you’ve shipped something similar before, you’ll probably need to consult experts, investigate risks, do product definition work, and gauge an appropriately sized “iteration and surprises” buffer that considers the chance of external surprises, scope grenades, and shark attacks. There’s a reason many product teams go out of their way to avoid estimating large releases and orient themselves to iteratively working on small releases in priority order: estimating big projects sucks!

Sometimes though, an estimate is a worthwhile. Perhaps you need to judge if meeting a key deadline is plausible. Maybe you need to consider whether an ambitious project is worth undertaking at all. Maybe you want somebody to fund your bold venture into shark-infested waters in search of long lost treasure. That kind of thing.

So let’s say you need an estimate, you get a solid one, and the project is greenlit. It can feel like the estimate-related work is now complete: it’s given you an outline of how your project should go, and it’s gotten you approval for that path. Now your team just needs to do the thing, right? Once you’ve shipped, you can revisit the estimate and judge how good it was, and make a better estimate next time.

Except.

No software project goes exactly to plan. You’re going to work iteratively through the most important items, learning as you go. Your team is going to learn from users, have new compelling ideas about how the product could be better, and discover subtle ways why the plan as originally conceived isn’t exactly, you know, totally possible. Nobody knew the sharks have lasers on their heads. That kind of thing.

This is how software works. It’s more or less fine!

The problem is that no matter how good your initial estimate is, your team still has a lot of ways to go over budget. Sort of like the famous 1944 CIA [manual on how to sabotage an organization’s productivity](https://www.hsdl.org/?abstract&did=750070), there exists a menu of simple and easy ways to sabotage a project’s budget. Ways you can take a thoughtful estimate with an appropriate buffer that was eagerly greenlit, run it in an earnest and agreeable way, yet still run face first into your budget limit before you’re even close to being done.

Here are five ways to go over budget.

<img src="/images/2022/sharks-istock.jpg" >

## 1. Taking new scope without steering and flagging it
There will always be new scope.

Sometimes this is the subtle, continual, semi-insidious type of expansion of scope that we call “scope creep”. Sometimes it’s big obvious additions that come up due to a meaningful change in circumstances or needs. Either way, by definition new scope wasn’t considered in the initial estimate.

The strategy is not to be obstinate about scope changes – an initial project plan is always imperfect, and ignoring what you’re learning in the intervening time is just negligence. You need to work to steer non-critical stuff out of scope, and communicate about the impact of stuff that *is* worth taking – *especially* the cumulative impact. Rather than blindly rejecting or accepting scope, part of leadership is helping steer new scope to where it belongs in the priority list, and communicating about the consequences.

If you’d pencilled in a 20% buffer, then the first additional 1% might just merit a “FYI this wasn’t originally scoped in but seems really worthwhile, we should easily be able to take this in our project buffer.” But once you’re getting the 10th or 15th such change, you should be waving a big flag with “Given the size and pace of scope increases we’ve been taking, we’re going to do a high-level re-estimation and propose an option for a revised budget plus an option for tightening things up to get back on target” written on it.

## 2. Exploding subcomponent not getting punted
Even a great engineering team will sometimes discover a certain task is far more shark-infested than expected. Occasionally there’s nothing to be done about it – users need to log in, and to accommodate we’re going to need to migrate off of this legacy authentication system. So yeah, we just need to flag the increased cost and risk associated with that.

Usually though, when we hit an exploding feature, it’s worth adjusting that item’s place in the priority list. An animation that seemed like a big win at 2 days’ effort is probably worth deferring when we realize it’ll be 12 days’ effort, even if we’re already 2 days in. Depending on the work at hand, there is often also an 80/20 solution that will get us most of the value without taking on the big gnarly rewrite, API change, or science project for the time being.

## 3. Project timeline extension
If you’ve work on projects that are more budget constrained than timeline constrained, you have probably seen this: your project is on time and on budget. Suddenly, “Congratulations! Due to an error on another team, you now have more time!” This can seem good. “Hey sweet, more time to polish stuff and make sure things are done well!”

Except not really. Because the passage of time causes scope changes.

What tends to happen is that your team uses up their budget buffer doing some nice extra polish and maintenance work, and *then* gets hit with additional scope changes. Maybe Apple is changing something in iOS 17 that breaks a bunch of assumptions. Maybe the brand new VP of Sharks has made a decree about some key part of the product. The exact cause is always different, but the underlying tendency is consistent: calendar time causes your product requirements to shift.

Ideally you deal with this by keeping your projects small – shipping early and often. When you are served up an unnecessary schedule extension, however, it’s important to flag that it will likely also lead to an unexpected budget extension, and plan accordingly. Sometimes this simple flag will help people get their shit together, minimizing said schedule slippage.

## 4. Compensating for failed dependencies
The more competent your project team is, the bigger a danger this is.

Here’s the scene: You might have some dependency – an API, a vendor, a design team – that is not on track. Rather than busy-waiting, your team picks up the slack. This is mostly good. You keep things moving – keeping things on schedule and avoiding calendar-fuelled scope creep. You help make the project a success.

Yay! Mostly.

The key problem here is that it tends to increase your team’s costs. This doesn’t mean picking up other teams’ slack is bad, it just means you should flag it. If you can fill a gap without creating some future maintenance headache, then propose doing so *conditional on* a thumbs up regarding budget. Leadership will often appreciate having a problem taken off their plate, but may have more context and could recognize the gap is better filled another way.

## 5. Undisciplined polishing
This is a weakness of mine. When my teams have a healthy buffer, when we’re tracking well on schedule and budget, I like to take on polish items. It’s a nice reward for the team to put some attention into making things nicer, doing preventative maintenance, improving code quality, and overall just doing a better job. This is good in measured doses, but using up your whole buffers this way increases project risk. Since software is never done, left unchecked this tendency will always eventually blow your budget. 

The critical thing here is to be disciplined about taking polish only when you have line of sight to hitting your big goals, and only taking on optional tasks early in the project cycle if they’re going to be a force multiplier.

Spending 3 days refactoring this screen now so we save 2 days for each of the various features we add later: awesome. A sweet loading animation: we can do that when we’re almost ready to ship.

---

Of course, you don’t want to be thinking about your project’s budget every day. Ideally, a team’s time and attention should be almost entirely on the next most important piece of work, building towards a great product – with only occasional corrections and flags relating to budget if need be.

Strike that balance reasonably, and you should be able to sail through any well-estimated project. If you can do it really well, you can even sail through a poorly estimated one. Just watch out for sharks.