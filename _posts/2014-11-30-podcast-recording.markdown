---
author: allen
comments: true
date: "2014-11-30 23:00:00"
layout: post
slug: "podcast-recording"
summary: "I evaluate building an app."
title: "A Great App for Recording Podcasts"
categories:
- Article
---

A year ago I [wrote about the modern era of podcasts](/2013/fall-and-rise-of-podcasting/). In that article, I made a forward-looking statement:

> With all this growth, what improvements are we seeing in the tools? As of this writing, a horde of developers are building podcast listening apps. Podcast recording apps, on the other hand?
> 	
> Well, more about that soon. 

In the intervening year, we've seen the launch of [Castro](http://castro.fm/), [Overcast](https://overcast.fm/), and the [acquisition of Stitcher](http://techcrunch.com/2014/10/24/deezer-buys-stitcher-to-add-talk-radio-and-podcasts-to-its-music-platform/). It's been a big year for podcast *listening* software, but not so much for podcast recording software.

<img src='/images/2014/skype-cutting-out.jpg' width='280'>
Many podcasters have spent the last week sharing how they record their shows, and while the hardware is fun to argue about, the software story leaves a lot to be desired. Casey Liss [describes his software setup for recording ATP](http://www.caseyliss.com/2014/11/22/how-i-make-podcasts): Skype, Piezo, Skype Call Recorder, and Google Docs. Jason Snell [recommends getting a microphone with a heapdhone jack]( http://sixcolors.com/post/2014/11/want-to-do-a-podcast-dont-be-intimidated/) to compensate for Skype's lack of local input monitoring. If you can stomach it, you can listen to Dan Benjamin describe [the ridiculous lengths he's gone to to record multiple guests in real time](http://5by5.tv/afterdark/75), and he still ends up dealing with Skype artifacts. This is a professional podcaster with a half-dozen Macs dedicated to the task of getting reasonable audio from remote guests. Ugh.

On Saturday Marco Arment posted [an ode to quality podcast audio](http://www.marco.org/2014/11/29/easy-listening). While I disagree with [the idea](http://padraig.tumblr.com/post/66813020851/keeping-out-the-riffraff) that people who don't have the resources to do high quality audio should be discouraged from podcasting, I do strongly agree with him on this point:

> Making your podcast easy to listen to is worth some effort.


Unfortunately, even with effort, the process of getting high-quality remote audio is a pain in the ass.

## They call it a "double-ender"
A double- or triple-ender is the most common approach to turning time and effort into a high-quality podcast with remote guests: each participant records their own audio, and one patient soul sews it together afterwards. Besides the stress and tech support involved in getting your guests to record their own audio and actually upload it, the editor also needs to line everything up, fix audio drift, and cut out any Skype disconnects or "uh, can you hear me?" moments. The final product is great, but it's error-prone and annoying. Even if your guest sounds good over Skype, they might [have their local software accidentally recording the wrong mic](http://www.muleradio.net/thetalkshow/46/), and nobody will know until it's too late.

Have I mentioned Skype? To do a multi-ender, you need Skype. There are some alternatives, but you know things are bad when the best option is Skype. With all the time and effort podcasters spend working around Skype quality and connection issues, they could be preparing their shows, getting them out faster, and even sound more comfortable and relaxed on air. Don't even get me started on Skype's user interface. "Did you know it's somebody's birthday that you recorded one show with two years ago? Did you know? CLICK ME DAMNIT"

<img src='/images/2014/skyype.jpg'>

Okay, so, crazy idea: why doesn't our team at Steamclock build a Mac app that solves all of these problems? A replacement for Skype, Call Recorder, and all that crap, specifically designed for recording high fidelity interviews? Something that takes the pain out the process, but results in a higher quality end product? A polished, professional tool for people that take podcasts seriously?

Last winter I started investigating exactly this. I spoke with various podcasters whose work I enjoy, and they were incredibly enthusiastic. One said, and I quote, "Take all my money. No, really, this sounds amazing, like an app of my dreams, and I love it." Okay, that's a good sign. Every podcaster I talked to about the idea, even ones who weren't doing double-enders, had various awesome feature ideas. I was giddy with excitement.

I then dug deeper, researching the future and sustainability of podcasting and its recent growth, and [concluded its future was bright](/2013/fall-and-rise-of-podcasting/). Nigel and I started [our own podcast](http://upup.fm/) to better understand the process, which has been surprisingly successful. Nigel built a proof of concept of the app, which we called MicDrop because we're hilarious. In some ways this would be the perfect product for us: it would take advantage of our strengths in Cocoa development, realtime audio, web backends, and UI design.

The next step, the final step before going all in on building this, was for me to figure out how to make it sustainable in such a niche market. I just had to do the "napkin math" to show that if we built the app, we could maintain it at a level we could be proud of. This step has proved problematic.

## If you build it
So: how many people would pay for a multi-ender recording app?

Sponsored podcasters are the folks who could justify dropping serious money on podcast software, say on the order of $200, so I worked to determine how many pros and semi-pros are out there. The best estimates I could get said there were 500 to 1,000 active sponsored podcasters out there. If you follow the typical startup math of "Imagine! If we only got 1% of the market!" then that would be... 5 customers. I'm confident we could do a lot better than that, but realistically there's maybe $20-50k to be made in the pro market. Even with the most optimistic market penetration and continued linear growth in podcasting,  you wouldn't make enough to actively improve and maintain a great pro app.

Unfortunately, the math works similarly for the enthusiast market. There are perhaps 5,000 to 10,000 semi-serious amateur podcasters who might consider paying $20 for such an app, perhaps enough to break even building the app initially, but again not enough to sustain such a complex app. Only making $20-50k on some iPhone app is no tragedy if it doesn't need maintenance, but for a mission-critical pro app with a backend service, it's just not enough.

We've gone through a few alternative ideas - a subscription-based model, a pared down app, and even a Kickstarter. No matter how I run the numbers, I end up at the same place: we could break even on a minimal app, but the market is just too small to sustain a great app. That's a deal-breaker.

I'd love to tackle a bigger niche product, something more pro than our current iOS apps. In fact, we've been [actively prototyping more pro or "prosumer" products](/2013/maximum-viable-products/) for some time now. But multi-ender recording software is a mighty big project for a mighty small audience, and so far I haven't been able to figure out how to make the math work.

## Cast away
Although we've put the idea in the parking lot for now, others have seen the need and are working on solving it. Julian and Eric of Debacle Software have spent the last year building [Cast](https://tryca.st/), a web app that will tackle not only the recording problem, but also basic editing and hosting.

The JavaScript APIs for doing this kind of app on the web are still very new and have sharp edges, but even in the last year they've continued to improve. For example, Chrome now has the API required for the user to choose which mic they want to use - though not yet the API required to insist they not use their damned laptop mic. WebRTC, the audio transport technology now built into Chrome and Firefox, [is also improving](http://iswebrtcreadyyet.com/). We've actually been [working with WebRTC on other projects at Steamclock](http://www.steamclock.com/blog/2014/09/otalk-on-ios/) and it's great for the web that plugin-free realtime chat is now possible.

Although HTML5 doesn't yet give us the control we'd need to provide the rich, bulletproof native experience we envisioned, it's getting closer. Today, reliable WebRTC usually means you need to ask users to use Chrome - but look at the progress we've seen in web browsers in the last few years. From what I've seen of Cast's private beta, it may deliver the future I want without having to build it myself: a polished double-ender, adjusted for drift and always recording reliably - no Skype required.
