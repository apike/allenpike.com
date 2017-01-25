---
author: allen
comments: true
date: "2015-05-31 18:00:00"
layout: post
slug: "yosemite-one-weird-trick"
summary: "My Mac is sad."
title: "Fix Your Mac With One Weird Trick"
categories:
- Article
---

<img src='/images/2015/pentium-snail.jpg' width='300' style='margin-bottom: 0'>

Recently, my 13" Retina MacBook has become very slow. It was never a snappy machine, mind you. Even brand new, its integrated graphics could barely handle the display. When I decided against returning it in 2012, my review summary was "[Awkward](http://www.allenpike.com/2012/the-retina-13-awkward/)." Three years later, it still feels like a compromise, and [web browsing performance has gotten even worse](http://www.quirksmode.org/blog/archives/2015/05/web_vs_native_l.html).

Around the time Yosemite arrived though, I began to experience a whole new kind of slowness. A kind of slowness that reminded me of my Windows 3.1 days. I could just switch apps and watch as the integrated graphics struggled heroically to render a window piece by piece. 

Waking the computer from sleep became an intricate ceremony, which I will now describe in detail. First, tap the keyboard. Once the computer lights up, wait until the password prompt appears, and then wait a few seconds until the input cursor starts flashing. Now, you might think you could start typing, but this is futile - the system will ignore all input at this stage. **The computer is doing something very important**, and the flashing cursor is not some carte blanche to just start typing. No, to determine when the dialog begins actually accepting input, you must tap some keys (or, if at this point for some reason you're frustrated, you may prefer to mash all over the keyboard) for a few seconds until you start to see masked characters register. Then you can delete the nonsense you typed, type your password, press return, and then go grab some coffee while your computer resumes the various invisible Herculean tasks it was performing, like  having Dropbox eat 100% CPU on multiple processes for hours, or leaking 20GB of memory in WindowServer. Congratulations, you've woken a MacBook Pro from sleep.

This type of thing grew tiring, but at first I tolerated it. The problems presented themselves gradually enough that I slowly boiled, like a lobster cooked in the tempting molasses that is a first-gen Apple laptop purchase. I spent some time taming Dropbox, deleting files, and killing background processes, but things got worse, not better. I evaluated newer MacBooks, but the 13" Pro benchmarks are barely any faster, and the new MacBook One is actually slower. Things looked grim.

## Desperate times

Frustrated, last week I discovered something interesting. Searching around for info on the giant WindowServer memory leak I'd seen, I came across [an Apple Support forum post](https://discussions.apple.com/thread/6623697) describing the exact same problem! It had 189,000 views and 534 replies, so I knew I'd finally found something to soothe my MacBook's suffering. Here are the steps it outlined:

1. *Disconnect external monitors.* Cool.
2. *Boot into Safe Mode.* I like it, serious stuff.
3. *Fix disk permissions.* Okay, that's pretty retro but I'll go along with it.
4. *Reset your SMC.* Really? This isn't going to work is it.
5. A notice that this is the most crucial step: *Zap your PRAM.* Noooooooo

<img src='/images/2015/mac-dummies.jpg' width='250' class='side'>

For those who are new to the Mac platform, zapping the PRAM is an age-old tradition that goes back to the classic Mac OS days. Even as a child, I was taught that when you had weird behaviour on your Mac it was time to zap the PRAM, which would promptly do nothing. Zapping the PRAM is number one on the list of desparate stuff to try on a misbehaving Mac that usually doesn't fix the problem, outranking the trusty disk permissions repair and the perky newcomer, resetting the SMC. Zapping the PRAM is folk magic.

Yet still, I did it. I don't know why I did, knowing it wouldn't work. I guess it's just a sign of how frustrated I've become with the modern deluge of software issues, and how desperate I was for a computer that just worked okay. I combined all three infamous Mac troubleshooting tricks into one leap of faith.

The weird thing was that it worked like a charm.

## Troubleshooting fatigue

There was once a time where I wouldn't have endured months of worsening computer performance. I would have promptly blocked out a day and tried every solution I could find or think of. I would have reformatted my machine, tinkered with the running processes, and done whatever it took to keep my pride and joy running smoothly. In 2015, I couldn't even take the time to bring it in to the Apple Store. To some degree that's just because I've grown up, and I'm less focused today on computers and more just interested in what I can make with them. I think moreso though, it's that there are now too many computers that want my care and attention.

I have issues I'd like to sort out on my laptop, my desktop, my phone, my tablet, my backup appliance, and even my damned watch. Don't even get me started on the satanic being that has possessed our Apple TV. Thinking about all those various problems at once, it's easy to feel like Apple's software quality has declined, but I'm not sure that's the case. The quality could even be twice as good as it once was, but when everbody has half a dozen devices, each with its own operating system, bugs, and updates, a small number of issues per device adds up to an intolerable mess.

As we own more and more computers, they need to actually get more reliable, even as they handle the added complexity of talking to each other. Today, people are far less likely to have the bandwidth to dig in and troubleshoot a problem device - even if all it would take to fix it is one weird trick.

*Update June 2015:* The fix didn't last - the dreaded wake from sleep issues recurred after a week or so. I suppose El Capitan is our only hope.
