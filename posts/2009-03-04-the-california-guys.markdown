---
author: allen
comments: true
date: 2009-03-04 20:01:47
layout: post
slug: the-california-guys
title: The California Guys
summary: "I run a project. Poorly."
wordpress_id: 103
categories:
- Article
- Best Of
oldtags:
- Experience
- Failure
- Software Engineering
- Startups
tags:
- best
- personal
---

![](/images/wp-uploads/2009/02/devil.png)**Some lessons in contracting learned by being a slave programmer.**

When the tech bubble burst, I was young and inexperienced. The local ISP where I’d been learning PHP laid me off, so I struck out on my own doing freelance web development. They say you have to learn through mistakes – [some disagree](http://www.37signals.com/svn/posts/1555-learning-from-failure-is-overrated), but failure was the learning tool I had at my disposal. Software engineering books usually enumerate the kinds of mistakes available for you to make. Fortunately for my learning, I made all of these mistakes in one project.

<!-- more -->


### **The Project**


A guy from California found my site and gave me a call. He was so authoritative and businesslike and American that he swept me up for a ride. He was ex-middle management from a Fortune 500 company in Silicon Valley, and he was founding a startup on a very limited budget. He quickly became known to my friends and family as California Guy.

The product he envisioned was a hosted project management web app. The starting point was some open source PHP code that had been abandoned by its creator. His request was for a fixed bid on a set of improvements, both design and functionality.

This opportunity both excited and frightened me. The previous contract I’d done was a site from scratch and had taken about 80 hours, and I’d learned a lot since then. Based on that information, for improving an existing system I bid using 50 hours at $20/hour[^1]. I thought $20/hour was workable, since at the ISP I was making less. I thought wrong.

As you may know, fixed bids are very dangerous things to make. Even for hourly projects, you might not bill for every single hour you spend, depending on how diligent you are about billing for administration time, estimates, and such. Of course, fixed bids can work if you have crystal clear requirements, a strict scope, and strong understanding of the task at hand. I had none of those things. I wasn’t even allowed to see the code before I made the bid, although I talked my way into seeing the system in action via webcast.


### **Taking Off**


The web app was rendering using a clutter of frames, which obviously had to go. The visual design was horrible, the usability was horrible, the whole thing was horrible. At first, this excited me because making improvements to something horrible should be easy. It was, at first.

At first glance I thought the variable names were weird, but I wasn’t so fortunate. The variable names were actually in Russian. Ripping out the frames proved out of the question, since they weren’t a design choice, but rather an architecture choice. Soon I was spending a lot of my time fighting against a vortex of tight coupling, magic numbers, presentational HTML, and variable names I couldn’t read.

This is when the “requirements” started to rear their ugly head. Although I knew in principle that having good requirements is important, I didn’t have a firm grasp on what that meant. For example, our bullet point “Supports popular, modern browsers” to me meant IE 5.5+, Mozilla, Safari. To him, it meant IE 5, various versions of his favourite browser Opera, and (seriously) Netscape 4. At this point Netscape 4 had about 1% market share, and didn’t really support CSS.


### **Crashing Down**


Pretty soon, all-nighters were the norm to meet the milestone deadlines. The visual design parts were some of the deadliest, since he was using me to iterate all sorts of ideas and approaches. With a properly designed sematics-markup site this wouldn’t be too bad, but just changing the colours on this thing could take hours in Photoshop and PHP. Although I became wary of his change requests, I was too eager to please the customer to stick up for myself, and he knew how to get what he wanted.

After a couple months of this, I burnt out. Once I’d worked five times the number of hours in my estimate, I had to call it the end. Of course any sane individual would have walked away long before this, but I hadn’t had an income in months and was irrational. I needed to get paid, right then. Although he wished we had met the original “requirements”, he was very positive on the work I’d done, and thanked me effusively for everything.

Months of repeated reminders later, I finally got the cheque. Well, I got _a_ cheque: he underpaid by 20%. When I complained, he said that I under-delivered. I ended up making way less than minimum wage[^2], and I’m pretty sure he didn’t feel bad about it. I was resentful, insulted, bitter, and getting sick of ramen noodles.


### **Redemption**


It wasn’t until years later that I was contacted by another California Guy.  I was then working for a company that did software contracting. I did internal projects that had nice users, nice code, and nice hours. When California Guy 2 came along, my instinct was to run like hell.

Initially, California Guy 2 was almost exactly like the first. He didn’t know exactly what he wanted, but he wanted a lot of it, and he wanted it ASAP. The project was to base a polished product off of incomplete open source PHP, whose code was disorganized. He wanted fixed bids, and even lived within miles of the last Guy.

The Guy was similar, but I was different. Having learned an expensive lesson, I structured the project very differently. I did hours of analysis beforehand, developing requirements and detailing what he meant by them. Since he wanted fixed bids, I bid on small chunks at a time, capped at a certain number of hours. All time I spent, including meetings and email, counted against the total. Sometimes I felt bad about counting 15 minutes for a quick email, but if there’s no cost for a service, the demand is going to skyrocket.

When he wanted arbitrary design changes or creative requirements changes, I would always oblige. Before I did, though, he had to choose what other thing he wanted to punt from this phase into the next one. He didn’t always like it, but pretty quickly he got a sense of how long certain things would take, and prioritized his requests based on their cost.

At first I was skeptical, tense, and irritable. The haunting memories of the last California Guy kept me suspicious that the project would fail. Instead, after each phase he came back for more. We got paid promptly by offering to suspend work on the current phase if a cheque was late. After quite a few equally-sized bids and successes, both sides parted ways amicably. We got paid, I got to sleep, and today his site is still running, almost exactly as I left it.

Long ago I wanted to meet the first California Guy so I could tell him off. Now, I want to meet him so I can thank him.

[^1]: He talked me down from $25, which he said was high. This is always hard to fend of for people starting off who don't have connections in the industry. I was a newbie, and we both knew it.
[^2]: This was much less fun than [when I did it on purpose](http://www.antipode.ca/2006/fantasytech-3-goto-fun/).
