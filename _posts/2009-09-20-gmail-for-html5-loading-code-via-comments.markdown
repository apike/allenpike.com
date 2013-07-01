---
author: allen
comments: true
date: 2009-09-20 08:21:07
layout: post
slug: gmail-for-html5-loading-code-via-comments
title: 'GMail for HTML5: Loading code via comments'
wordpress_id: 1045
categories:
- Link
tags:
- HTML5
- iPhone
- Javascript
---

Google has been running a series on the Google Code blog about their mobile client. Since Webkit now supports some of HTML5, apps that target iPhone and Android are actually the frontier of HTML5 development. The entire series is worth reading, but I found [Reducing Startup Latency](http://googlecode.blogspot.com/2009/09/gmail-for-mobile-html5-series-reducing.html) particularly interesting.

They didn't want to parse all their JavaScript at once, causing a big delay in startup, and they didn't want to download it on demand because of high network lag. Their solution: hiding JavaScript in comments and parsing it by finding it in the DOM and using `eval()`. Quite the hack.
