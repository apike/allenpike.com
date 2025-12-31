---
author: allen
date: "2021-02-09 8:00:00 -08:00"
layout: post
title: "App Tracking and Analytics"
link: "https://steamclock.com/blog/2021/02/apple-tracking-analytics-sdks/"
categories:
- Link
tags:
---

Today I posted [a recap of iOS' new 3rd Party Tracking rules and their impact on analytics](https://steamclock.com/blog/2021/02/apple-tracking-analytics-sdks/) over on the Steamclock blog:

> Apple did not – and from a legal perspective likely can’t – explicitly ban the Google Analytics, Flurry, Facebook, and Firebase SDKs. Their wording leaves some wiggle room. It seems like it could be possible to use them. It seems even more possible that Facebook and Google could make them usable. However, this puts developers in the situation of evaluating the changing documentation, complex privacy policies, and large settings panels that these tools offer, trying to judge whether a given setup of a given SDK would now pass muster from Apple’s perspective.

This doesn't even get into the even gnarlier uncertainty facing businesses that rely on 3rd party ad attribution via the Facebook or Google SDKs, or indirectly via something like Segment or Branch. Hopefully we do get something conclusive about how App Review is going to manage all this, but I doubt it. As is often the case, you can either do what Apple is implicitly asking you to do – remove these SDKs entirely – or figure out exactly what's permitted by an App Review trial-by-fire.
