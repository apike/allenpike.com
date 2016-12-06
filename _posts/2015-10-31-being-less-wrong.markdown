---
author: allen
comments: true
date: "2015-10-31 18:00:00"
layout: post
slug: "being-less-wrong"
title: "Being less wrong"
categories:
- Article
---

Estimating software development is hard. There are a mind-boggling number of variables and tradeoffs involved - which is part of why we love software in the first place. Great software is built with experimentation, intuition, and iteration. This makes it both very satisfying to ship, and famously hard to predict.

Estimation becomes even harder when you're doing something new and ambitious. This is a problem, since Steamclock is in the business of doing things that haven't been done. We don't churn out a series of apps in a certain genre, build software from templates, or get within 50 meters of a Drupal installation. We like to build exceptional things, yet by definition exceptional things are poorly understood.

Some engineering managers attempt to cope with this challenge by avoiding estimates. It will be done when it's done, they muse, tautologically. It's well known that estimates are usually wrong, and that iterative development is the way to build great software. Given that, refusing to give estimates can give engineers a zen-like high. If you never say how long it will take, you're never wrong when it takes a long time.

<img src='/images/2015/over-budget.jpg'>

Unfortunately, if nobody knows how much work it is, nobody knows whether it's worth doing. Estimates, at least rough ones, are necessary for an organization to allocate resources well. Every team has a long list of things it would like get done - whether it's adding Spotify support, shipping an interesting new app, or rewriting that god-awful vortex of Objective-C++ that an intern wrote in 2004 and somehow is still a major part of this business-critical Mac app oh god how is this code even working.

As appealing as these projects may be, they first need a sanity check that they're a good use of your time and money. This is obviously true with big ambitious projects, but is even the case for smaller additions or improvements. A small feature may seem like an easy win, but a rough estimate may uncover that it requires solving an [NP-hard problem](https://en.wikipedia.org/wiki/NP-hardness) and thus may not be your top priority.

## If my calculations are correct

Estimation is especially important in the world of consulting. Your initial estimate is often one of the few things a prospective client knows about you, and a lack of a previous working relationship often means they're going to take it very seriously if your estimate is wrong. Contractors in any field need to manage their communication around time and cost precisely.

I learned this the hard way as a teenager. I did my first stint as a contract software developer at the end of high school, and it was, well, educational. Software engineering books enumerate many of the estimation and project management errors you can make, and early on I succeeded at [making all the errors in a single project](http://www.allenpike.com/2009/the-california-guys/).

Whether by crash course or gradual study, engineering managers learn a lot about managing time and costs. We develop an intuition for certain kinds of technical or product decisions that tend to be surprisingly risky or expensive. We learn to be mindful of the critical path, keeping an eye out for slow tasks that might block progress further down the line. On larger teams, we learn to estimate the accuracy of the folks contributing to our larger estimate, and how important it is to communicate the level of certainty we have in our estimates.

Once a project starts, we also learn to watch for scope creep. We learn about [Parkinson's Law](https://en.wikipedia.org/wiki/Parkinson%27s_law), and know that even the healthiest buffer on an estimate will be squandered if we aren't vigilant. We also develop an intuition for progress, feedback, and quality, allowing us to continually re-evaluate our estimates to make sure we're on track.

After well over a decade of managing projects, I can now consistently ship quality software on time and budget, *and* avoid overtime or undue stress on my team. What once seemed unpredictable is now routine. This has made it easier to put the few projects that do have budget problems under the microscope.

## Your proposal has been selected

As we've gotten better at shipping projects as estimated, we've noticed that projects that end up having trouble are often projects where the client was evaluating us based on price. It doesn't seem to matter whether we're up against some offshoring firm or a lavishly budgeted consulting giant. For some reason, the price-conscious projects end up going over budget more frequently.

Now, we're not a sales-driven studio. Most of our work comes from referrals, and those projects tend to be seamless and great for all involved. For work we're competing for, though, we sometimes end up doing proposals, and potential clients evaluate us on what we propose. Unfortunately, studies show that no matter how thoughtful proposals may be, their natural error distribution means that the average accepted proposal is an underestimation.

In [The Influence of Selection Bias on Effort Overruns in Software Development Projects](http://www.sciencedirect.com/science/article/pii/S0950584913000633), a team at the University of Oslo observed this exact phenomenon. Clients who consider cost estimates when planning a software project will on average choose proposals that are under-estimated:

> Only the estimates leading to actual projects will be evaluated with respect to accuracy and bias. This means that the previously reported strong tendency towards effort overruns in software projects potentially may have been caused by how project proposals are selected rather than, for example, by poor estimation processes or a disposition towards over-optimism among software professionals.

In the study, they found the same thing we found via anecdotal observation: the more price sensitive a client is, the worse their project will go over budget. In the extreme case, a government organization  is obligated to choose the lowest bidder for a project, and so will generally choose the vendors who have made the most extreme estimation errors. If you've ever observed government in action, this will not surprise you.

## The more you know

Selection bias is just another entry in the bestiary of problems to avoid when you're seeking to reliably ship software. Like its cousins, it's a complex issue that's impossible to avoid entirely, but being aware of it is half the battle.

Great product teams avoid selection bias by prioritizing features by how valuable they will be be to customers, and being willing to experiment with or prototype projects even if preliminary estimates indicate they could be costly. Great consulting studios avoid selection bias by not competing on price, instead winning work based on their reputation for shipping great software rather than fixed bids and racing to the bottom.

Either way, the process is the same: we continue the neverending battle to be less wrong, one project at a time.