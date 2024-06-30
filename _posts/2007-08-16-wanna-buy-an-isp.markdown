---
author: allen
comments: false
date: 2007-08-16 00:46:27
layout: post
slug: wanna-buy-an-isp
summary: "The death of dialup turns weird."
title: Worst ISP acquisition ever
wordpress_id: 84
featured: false
categories:
- Article
oldtags:
- Experience
- Failure
- ISPs
tags:
- personal
---

*I published [a more refined version of this story](https://allenpike.com/2023/dialup-world-isp) in 2023.*

![Dialing up](/images/wp-uploads/2007/08/dialup.jpg)I used to work for a medium-sized ISP back in days of the dialup shakedown. They used to (and probably still do) buy up little, dying ISPs that had a dream of making it big, but are getting obliterated by high-speed. This is the story of how they bought out another company that they... probably shouldn't have.

The acquired company (let's call them Dialup World) was flying high in the late 90s. They had fancy offices, fancy computers, and fancy ads. In fact, they made a $1 million ad... and went bankrupt before it could air. They tried to transition to ADSL, but before they could pull out of the nose dive, they hit the ground in a heap of flaming wreckage. Our company swooped in and bought their customer base  as well as their fancy computers. Of course, their employees, offices, and ads weren't very useful, so they gave all Dialup World employees notice that they'd be laid off soon... but in the meantime could they please keep running a tight ship. Can you say, "disgruntled"?

I was hired to man the phones immediately after one disgruntlee posted their entire database of usernames and passwords on the internet. For a couple days, anybody who wanted could have infinite, anonymous access to the internet using these accounts. Of course the passwords were immediately changed to something random, but 5 customer service reps can't call 20,000 customers immediately and tell them their new password. Instead, they called us. Oh my god did they call. The phones rang off the hook all day every day for weeks. They were ringing before we opened, and they were ringing after we went home. Each time we had to listen politely that they couldn't get online, apologize, and let them choose a new password.

![empty-computer.jpg](/images/wp-uploads/2007/08/empty-computer.jpg)When it came time to let the disgruntlees go, they had all the cool office equipment we acquired packed up into trucks and dumped into a massive back room at our office, shared only by the 5 people in my department. As I inspected the unceremoniously deposited artifacts of a dead company, I found the piles fascinating. Interestingly, the disgruntlees didn't take their mess, garbage, or useless crap from their desks. Instead, they took their computers' hard drives, RAM, and anything else of value. There was almost no remaining valuable hardware, or anything of use. We did, however, get thousands and thousands of mousepads and stickers promoting Dialup World.

As the password debacle died down, I started to get a lot of different angry calls and emails. Here is one example:


> I do not know how poor you are in order to ugly make your penies. Do you feel shame of making the money by your dirty way?
> 
> Again, I am ending up the services of ADSL with you now. I will ask the credit card company to refuse paying you since you have overcharged me without caring my request.
> 
> I am sure that your dirty biz will go down by continuing doing in this manner to your customers.


I looked up the account, and he was just one of 20,000 Dialup World accounts in our system. I cancelled his account, but something in the back of my head told me there is shit and a fan somewhere. Each rep started getting a few calls and emails a day saying, essentially, "I cancelled my account a long time ago, why the farmer are you billing me."

I did some digging to find out more about how Dialup World did their billing, since our system had almost no information about these customers. It turns out, they simply had a 20,000 row Excel spreadsheet (one row for each customer) with one column for each month's billing. Every day, they would bill the customers who had signed up on that day of the month. A borderline reasonable approach for a few hundred customers, but completely insane for  tens of thousands.

![paper-sucks2.jpg](/images/wp-uploads/2007/08/paper-sucks2.jpg)On top of that, nobody had ever even bothered to write proper macros in Excel to manage all this. Instead, they used a paper filing system based on signup forms. Around the office were 31 stacks of signup forms, corresponding to the days of a month. On the 9th, the billing people would go and grab the stack of signup forms from people who signed up on a 9th, and bill them one by one, adding a column to the spreadsheet for each of those customers depending on what plan they're on.

Although this is a colossally funny and epically stupid billing system, the fatal blow is yet to come. You see, they had a very elegant method of cancelling accounts. They found out what day of the month that customer had signed up on, found the appropriate pile, found that customers' sign up form, and trashed it. Very simple - now they won't be billed, since the billing is based on signup form.

Fast forward to a few years later when they're bought out for their 20,000 customers. What they neglect to mention is that they actually have 20,000 customer _records_. They probably didn't even know exactly how many customers were still in those piles of signup forms. Much later I learned from somebody who worked in tech support at Dialup World that everybody there knew how screwed we'd be when we tried to bill those 20,000 customers, and just laughed at the stupidity of it all. It's hard to separate out the effect of the password problem and the phantom cancellations, but within a couple years, more than half of the acquired Dialup World "customers" had canceled.

There are a couple morals to this story. One is to make sure you know what you're getting when you're buying a bankrupt company. They really are going bankrupt for a reason. The second is that when your office's filing and data systems suck or aren't scaling, fix them immediately. If I ever meet the former COO of Dialup World, I'll clock him over the head with an Excel spreadsheet so hard he won't know C43 from H18279.
