---
author: allen
comments: true
date: 2009-04-29 14:28:05
layout: post
slug: real-function-names-come-to-webkit-debugger
title: Real function names come to WebKit debugger
wordpress_id: 793
categories:
- Link
oldtags:
- Debugging
- Javascript
- SproutCore
- WebKit
---

Francisco Tolmasky of 280 North was, like most JavaScript developers, frustrated with some aspects of debugging. Unlike most JavaScript developers, [he's started patching WebKit to improve the experience](http://www.alertdebugging.com/2009/04/29/building-a-better-javascript-profiler-with-webkit/):


> Anyone who’s done a significant amount of profiling with Firebug has probably run into the dreaded question mark functions at some point or another. ... So in order to solve this issue once and for all, we decided to define a way to explicitly give functions a name for debugging: the displayName attribute. ... The other thing we focused heavily on doing these last couple of weeks was completely rewriting the Bottom Up View of the WebKit profiler.


This should be a big win for people writing thick-client web apps with Cappuccino, GWT, SproutCore, and the like. It seems 280 North guys aren't going to stop [challenging](http://280atlas.com/) what people think are Javascript's limits.
