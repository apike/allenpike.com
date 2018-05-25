---
author: allen
date: "2018-05-01 00:00:10 -08:00"
layout: post
slug: "caravan-to-xcoders"
title: "Caravan to Xcoders"
summary: "A Meetup competitor lives and dies."
image: "/images/2018/vancocoa-square.jpg"
categories:
- Article
tags:
---

In 2013, I decided it was time to start an iOS development meet up. I’d run [VanJS](http://www.vanjs.com/) for many years, which was great. There was one thing about running VanJS that was *not* great though, and that was using Meetup.com.

<img src='/images/2018/meetup.png'>

You see, Meetup is optimized for getting small groups assembled and running. A huge proportion of Meetup’s focus is around making it easier for groups to organize, socialize, and maintain their momentum.  Meetup continually adds new ways for members of a group to post various things to the group. If your goal is to have as many Meetup™s as possible surviving and paying dues, optimizing your KPIs for optimal synergy, then this is great.

This is not as great if your goal is to curate a high-quality speaker series for a group with 3000 members, watched hungrily by dozens of hungry recruiters and other loud individuals.

For example, a few years back Meetup added comments to events. They also opted everybody into notifications, as is the style. This probably worked fine for groups with 10 attendees, but at that time we were organizing a large event with 200 attendees. Naturally, Rando Calrissian hops onto the event’s page to say “ill be 5 min late”,  which caused Meetup to email 200 people the very important alert that Mr. Calrissian will be 5 minutes late.

In another fun encounter, I started getting urgent messages asking things like “I can’t get in, where is everybody?” I briefly panicked. Had I organized an event but *forgotten to attend*? I checked my Meetup page, and although *I* hadn’t, somebody else had! Meetup had quietly added the ability for all attendees to “propose” events, and assign them dates and times, *and send announcement emails*, without necessarily ensuring that there was a venue or staff or anything associated with that event. So a bunch of people showed up at our usual auditorium, for a talk that somebody had offhandedly suggested. Unfortunately, the auditorium costs $500 and needs to be booked weeks in advance, so this resulted in some poor customer sat.

## An interesting problem

Given all that, I wasn’t keen to start another group on Meetup. And doing some research, chatting with other event organizers, I learned that many organizers weren’t keen on Meetup either. Complaints about the lack of control were plentiful. Multiple Meetup customers told me point blank, “I hate Meetup.”

A lot of the complaints centered around the UI. Meetup’s interface is full of feature clutter and bloat. They even have a feature where you can print out a checklist of attendees to check them off as they arrive. Who *does* that? In part due to this chaos, Meetup’s look and was about a decade behind the times – not the best for events focused on cutting edge design and development.

In contrast, I saw that [CocoaHeads Montréal](http://cocoaheadsmtl.com/) had a simple custom site that presented Just the Facts: the events, where they were, and how to RSVP. It was a breath of fresh air, and far closer to what I wanted for our new group than could be configured on Meetup.

So, <a href="http://www.steamclock.com/">we</a> spent a couple weeks prototyping a custom web app, which we called Caravan, for our new iOS meet up, which we called VanCocoa. We left out all of Meetup’s social features, spam, and list-printing doodads. Instead, we focused on what we saw as our key differentiator: Caravan pages would be simple, attractive, and easy to use. In particular, went to great lengths to not require attendees to create accounts – years [before it was cool](https://marco.org/2018/04/27/overcast42).

<img src="/images/2018/vancocoa.jpg">

That August we hosted [the first VanCocoa](http://vancocoa.caravan.io/events/5) using Caravan. Although  people liked the event and the site, I immediately started to receive a lot of support email about it. 90% of the issues stemmed from my brilliant idea of not requiring accounts:

- “Did I RSVP?”
- “How do I un-RSVP?”
- “I accidentally RSVPed twice with two different emails, what do?”
- “Do I have to re-type my email each time I RSVP?”
- “I accidentally RSVP’ed to another event using a different email address than I’d used before, and now I’m getting announcements to both emails, can I just merge them somehow, should you maybe just have some kind of account login?”

We were able to fix some of these in a workable way without requiring people to create accounts, but the product design challenges around avoiding logins made it painfully clear why every product in the space requires account creation for attendees. Blech.

Meanwhile, I started demoing our Caravan prototype to the Meetup organizers who told me they hated Meetup so much. Each organizer was excited to see our progress, but had a feature request. Which is great! Every person’s feature request was different than every other person’s. Which is not great. 

One organizer wanted to charge fees. One organizer wanted a message board. Another wanted a *poll for pizza preferences?*

My favourite was the Meetup organizer in New York whose venue had some security rules that required them to do paperwork for every event. Before attendees could enter the venue, a security guard needed to check them off a list – a list they generated with the very Meetup feature I’d been using as an example of needless bloat. Well, *f*.

As if that wasn’t bad enough, we were soon offered a [cool new venue](https://vfs.edu/) for VanCocoa. It was very nice and well located, but had a catch: they needed us to sign attendees in. From a list. Well, *ﬀ*.

Perhaps even worse, we saw first-hand the power of Meetup’s network effects. Where our VanJS group on Meetup naturally grows substantially every month just by being an active tech event in Vancouver, our Caravan-based group grew ever so slowly, despite having talks of the same caliber. The iOS development community here isn’t quite as big as the web development community, but it’s strong and healthy – something that just wasn’t reflected in the attendance for VanCocoa, despite glowing reviews from attendees.

## What do
Given what we’d learned from our prototyping and interviews, we went back to the drawing board and did some design explorations for what a “Next Generation” Caravan could look like. The more we explored and the more we talked to organizers of large Meetup groups though, the less it looked like there was a clear niche for a simple, beautiful Meetup competitor focused on large tech groups. Around that time I saw that CocoaHeads Montréal, the group that inspired Caravan in the first place, started using Meetup themselves. 😕

So, we decided to shelve further development on Caravan and focus on [other](https://www.allenpike.com/2014/podcast-recording/) [products](https://www.steamclock.com/blog/2016/11/apple-music-avfoundation/) [we wanted](https://www.allenpike.com/2017/two-spies/) [to explore](https://www.steamclock.com/blog/2017/06/bluejay-swift-bluetooth/). We kept the site running for VanCocoa for some time, but this winter I sent out a survey of the group asking about future directions. Besides positive reviews, a big message that came back was that we should switch to Meetup – even though people liked Caravan better – because more people would find the group that way. Well, who am I to argue?

So today, we finally ported VanCocoa to Meetup. We also took the opportunity to rebrand: **next week will be the first ever [Vancouver Xcoders](https://www.meetup.com/Vancouver-Xcoders/)**. We’ve always had a great relationship with Seattle’s Xcoders group, and it felt right to join forces. If you’re in Vancouver or visiting sometime, and you’re interested in giving a talk about development in the Apple ecosystem, let me know.

Of course, Meetup is still bad. Very bad. But there’s nothing like trying to build your own thing to help you appreciate the bad thing you don’t need to maintain. And I’m pretty sure the network effect and new name will bring together more of the Vancouver iOS community, and – perhaps more importantly – a more diverse audience beyond the bubble of folks that knew about VanCocoa.

Of course, if you do end up beating Meetup at their own game, please drop me a line.