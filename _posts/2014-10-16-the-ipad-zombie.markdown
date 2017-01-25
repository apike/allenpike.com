---
author: allen
comments: true
date: "2014-10-16 16:25:00"
layout: post
slug: "the-ipad-zombie"
summary: "The iPad 2 shambles along."
title: "The iPad Zombie"
categories:
- Article
tags:
- Story
---

<img src='/images/2014/a5-cpu.jpg' width='200'>

In March 2011, Apple announced the iPad 2. It was an incredible leap forward, dramatically thinner and faster than the original iPad. In many ways, the iPad 2 was when the iPad hit its stride. The next year, they launched the wonderful iPad mini, which was in every way an iPad 2, simply in a smaller form factor.

Apple still sells the original iPad mini. Today, they announced that not only would they continue to sell it, but cut the price to $249, making it the cheapest iPad ever. If they follow their usual pattern of leaving the iPad line as-is until next fall, the iPad 2's internals will live on for 4.5 years.

### App developers' IE 6

In 2011, the iPad 2's 512MB of RAM, non-Retina display, and A5 CPU were impressive. Today, these specifications are frustating for app developers trying to push the boundaries of what mobile devices can do. Worse, customers replace their iPads more slowly than they do their phones, so these old iPads will be in regular use for a very long time. Maintaining support for the A5 while simultaneously trying to take advantage of the iPhone 6S' A9 CPU is going to hurt.

We already see this pain on the App Store, especially with games. There is no mechanism to specify on the App Store which CPU is required for your app. Instead, you get app descriptions that start like this one, from the critically acclaimed game [BioShock](https://itunes.apple.com/ca/app/bioshock/id871629757?mt=8):

> \*\*\*NOTE: Compatible with iPad Air, iPad Mini 2, iPad 4, iPhone 5S, iPhone 5C, and iPhone 5 - WILL NOT RUN ON EARLIER DEVICES, INCLUDING: iPad 3, iPad 2, iPad 1, iPad Mini 1, iPhone 4S, iPhone 4, iPhone 3GS, iPod Touch 5, iPod Touch 4, iPod Touch 3***

Here is the most recent review of this game on the Canadian App Store, one star:

> Not Working ★☆☆☆☆
> 
> I was so excited when I heard that bioshock was finally available for iPod touch. But when I try to play it on my ipod 5 all that I can do is watch the first cut seen at 3 frame per second 
(literally) then it crashes. So please fix i really want to play bioshock.

Neither of these people are having fun.

Of course, it's not all the iPad mini's fault. Every iPod touch currently on sale also sports the same cutting-edge chip that shipped with the iPhone 4S. It doesn't require non-retina assets like the iPad mini does, but otherwise it causes all the same problems.

<img src='/images/2014/graphics-performance.jpg'>

The only thing we can do as developers to disavow support for these devices is require a version of iOS that won't run on them. Unfortunately, Apple will surely continue support for the A5 in iOS 9. If they do so, we won't have a mechanism to cut off support for these old iPads mini and iPods touch until iOS 10 has reached wide adoption, likely in early 2017.

2017.

The team at Apple surely thought long and hard before they made this call. They know that supporting the A5 for another iteration of iOS isn't going to be fun, but at $249 there will be a lot of people finally getting their first iPad. Still, as a developer it's frustrating not to be able to specifically target modern devices. For years, pundits have railed against Apple for their cycle of obsolescence. For once, we're overdue for some.