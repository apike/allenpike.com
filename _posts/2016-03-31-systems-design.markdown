---
author: allen
comments: true
date: "2016-03-31 18:00:00"
layout: post
slug: "systems-design"
title: "Diagrammatically Correct"
summary: "Prototypers hack, architects diagram."
categories:
- Article
---

Once upon a time, back when Netscape roamed the earth, software development was hard. Desktop apps shipped in cardboard boxes, web apps ran on Solaris boxes, and video games came on little plastic boxes. In this box-crazed world, making sure software was right the first time was Super Important™.

Back then, writing an app &ndash; or "application" as it was referred to in the archaic English of the time &ndash; was an arduous process. Good design patterns were still evolving, and system libraries were of little help. Much of the code in any given app was, effectively, boilerplate. Collection classes, sync frameworks, windowing systems, memory management schemes &ndash; a wretched hive of tricky computing science problems.

Meanwhile, it had become well understood that software projects, especially large ones, had a disturbing tendency to fail spectacularly. While every field has its blunders, research found that software developers as a discipline were hilariously bad at actually achieving the goals they set out to achieve.

In response, software developers armed themselves. They increasingly adopted tools and systems for planning, communicating, and documenting their systems. They formalized requirements before designing, diagrammed objects before coding, and debated architectures before ordering two million dollars of servers. "If you fail to plan, plan to fail," they would say, and then resume architecting their system's UML to achieve optimal domain synergy. It was a strange time.

## Years later

Recently a [good friend](https://warpedvisions.org/), a survivor of this gilded era of software engineering, asked me about a hiring problem. You see, he was interviewing to hire a senior software engineer, but many of his candidates were struggling with the systems design portion of the interview. These are supposed to be senior engineers, yet their diagramming skills seemed totally absent. How much systems diagramming do you do at Steamclock?

"Uh, well... systems diagramming hey? Well, we don't exactly... I wouldn't say we formally... I mean... hm."

After I quelled a wave of guilt, I admitted that we don't do very much. Of course we'll diagram out proposed AWS setups, graph gnarly retain cycle issues, and whiteboard the hell out of UI flows, but we haven't produced a UML document in the history of the company. While we tirelessly design and refine our user interfaces, our technical designs are rarely formalized before we start prototyping.

While this is not what we were taught in school, this kind of modern ad-hoc  process is now incredibly common in the industry. For every blog post or podcast about diagramming and systems architecture, there are ten thousand on choosing frameworks or hiring. Why design a system up front when it's just going to change? Why make a document when it's just going to get out of date?

Well, because sometimes that's what's necessary to scale software, that's why. We know how valuable diagramming can be as a tool for thinking through hard problems. We also know that thoughtful systems design is important for building complex, novel systems. Up-front systems design put us on the moon. So, why don't we do any?

## Meet the Prototyper

From a technical perspective, most software projects today just aren't that special. If you want to explore just how not-special most software projects are, subject yourself to a project review for the Canadian [SR&ED Tax Credit](https://en.wikipedia.org/wiki/Scientific_Research_and_Experimental_Development_Tax_Credit_Program). This program provides tax credits for technically novel software development, which when you dig into it is very little of what happens in a typical software project. Review a year's worth of time entries on a challenging project, and you'll often find that nine hours out of ten, you were just picking libraries, adapting to new requirements, and improving the UI.

Modern software projects are often just the cherry on top of a wheelbarrow-sized sundae of opaque 3rd party code. Why write a blogging engine from scratch when you can make one that fits your needs perfectly in a few hundred lines, by just importing [200,000 lines of dependencies](https://www.caseyliss.com/2016/3/27/node-is-weird)? Why reinvent the wheel when you can `gem install wheel` or add `wheel 0.1.x` to your package.json?

In this environment, more and more software developers now spend their careers as prototypers. Startups, product consulting shops, and indies typically spend a lot of time starting stuff, and relatively little time scaling it. In these kinds of businesses, prototypers' shipping skills are invaluable. Any given project may be relatively small, and may or may not turn into something big, but if you can ship it, you've overcome the biggest threat to most new software: never shipping in the first place.

<a href='http://cube-drone.com/comics/c/missing-the-point'><img src='/images/2016/cube-priority.jpg'></a>

Our culture has never been better focused on shipping. Agile &ndash; [the manifesto](http://agilemanifesto.org/principles.html), not [the catchphrase](http://cube-drone.com/comics/c/dont-go-chasing-waterfall) &ndash; makes no bones about the need to deliver sooner rather than later:

> Our highest priority is to satisfy the customer through early and continuous delivery of valuable software. ... Working software is the primary measure of progress.

Say what you want about agile the catchphrase, but the increased focus on iteration and delivery has been a huge positive force in the industry. Fifteen years later, we have a whole new generation of developers for whom this mentality has always been the norm.

While this has been a net win, there are some interesting consequences to this mindset. Folks who spend their careers working on a series of small iterative projects tend to think less in terms of traditional software engineering, and more in terms of immediate user goals and short term improvements. Besides leading to a lower prioritization of systems design and planning up front, this mentality can also lead to laissez-faire attitudes about documentation, unit testing, and refactoring. The OG software engineers would not approve.

For better or worse though, the iterate-now-plan-later philosophy has come to dominate the popular discussion around software development. This outlook is an easy sell at lean startups, UX-focused development shops, and any studio more focused on solving user problems than technical ones: who enjoys writing specifications anyway? As a result, we now have an entire generation of software developers raised on the "move fast and break things" approach to solving problems.

## Dude, where's my Composite Structure Diagram?

Unfortunately, at a certain scale breaking things is not an option. Or, more accurately, breaking things becomes staggeringly costly. Moving fast is great, but if you're serving [billions of push notifications per day](http://www.bizjournals.com/sanjose/news/2013/06/11/14-eye-popping-apple-statistics-from.html), it becomes more important that everything doesn't go to shit.

Projects at scale have an outsized impact, and early mistakes can become hard to undo. The larger and more technically novel a project gets, the more you suffer the pain of “not maintainable here”, and the less bananas it is to design and build your own custom frameworks and other components.

Naturally, folks that spend their careers building and maintaining large systems at scale typically spend a lot more time thinking about systems design and software engineering. At a certain point, generalized "best practices" that work for the typical system stop working, and speculatively iterating towards your servers not bursting into flames can be untenable.

All this necessitates serious-business systems planning, diagramming, and projections. Triply so for backend systems, which get more complicated and have longer lives than our beloved clients.

So, where are the senior systems designers? Well, they're doing what they do best: building massively scaleable backends at Amazon, Apple, and Google. They're launching spacecraft to Mars and running nuclear power plants. They're grappling with the face-meltingly complex and fragile enterprise systems that keep airlines, banks, and telecoms from collapsing under decades of technical debt. Basically, they're saving our bacon.

Still, these experienced systems designers make up a smaller and smaller proportion of software developers over time. Unfortunately, all too often their respective corporate bureaucracies prevent them from blogging, podcasting, or even tweeting about the work they do. This reinforces the echo chamber of startups and indie product developers, who like to celebrate a lack of process, and think of rapid iteration and thoughtful software engineering as mutually exclusive. The pendulum has swung so far that the very idea of up-front design is thought of as old and busted.

## One drop does it

I'll readily admit that I'm most comfortable wearing my "move fast" camp. We work on a lot of new apps, put a big focus on UX, and do a lot of work for startups. Like many studios, getting bogged down on exhaustive up-front planning isn't a great tradeoff for most of our projects.

That said, it's crucial that we keep in mind the benefits of the tools in our software engineering toolbox, and make thoughtful choices of when to use them and when not to. Rather than debating whether all projects should adopt this process or that process, we should debate how to tell when a certain project justifies more formal engineering.

For example, projects for larger companies typically have a higher likelihood of hitting scale, so that's a flag that their projects justify spending more resources on meticulous planning, testing, and preparation. In contrast, an experimental product from a startup would more likely benefit from moving as quickly and efficiently as possible.

So, next time you're starting a new project, keep an eye out. A diagram here, a short planning document there &ndash; where there are technical risks, there are opportunities to use system design. It might not be sexy or futuristic, and it sure as hell doesn't need to be UML, but sometimes, a little planning can go a long way.