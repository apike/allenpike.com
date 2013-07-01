---
author: allen
comments: true
date: 2009-02-13 01:23:46
layout: post
slug: twitter-and-url-mangling
title: Twitter and URL mangling
wordpress_id: 608
categories:
- Article
tags:
- Twitter
- Usability
---

[![Lots of tinyurls not worth clicking.](/images/wp-uploads/2009/02/dontclick.png)This tweet](http://twitter.com/apike/status/1204173954) could have fit the actual URL in it. Instead Twitter swapped out the URL I posted and hid it in a TinyURL. Why do they torment us so? Not being able to see where you're going to navigate is frustrating and against the spirit of the web.

**Why does this suck?**

You can't avoid (or seek out) links based on knowing the source. Know you can't watch video links right now? Don't trust content from haacked.biz? Rather choke to death than see something from about.com? Out of luck.

You can't tell if you've already seen the linked content. Normally watch for browsers' visited link highlighting? Already read everything from XKCD? Recognize the Youtube URL of the RickRoll video? Out of luck.

This isn't to mention the danger of TinyURL going down or going out of business. Imagine millions of Twitter links crying out in terror, then suddenly silenced.

**Why hasn't this been fixed?**

So why are things this way? Of course tweets have to be 140 characters or less, but why don't shorten the link text? Why not shove the link URL in an `<a href>` with the domain as link text, and put it in the tweet?

The problem is the Twitter API. Yes, the glorious API that has helped Twitter become so successful is now so widely adopted that they're bound to support it indefinitely. As a consequence, shoving in HTML is not something they can just do. Undoubtedly many consumers of the feed would pass it through as plain text ((As they should! Trusting somebody else's feed to insert arbitrary code into your page is best avoided.)).

**How can they fix it?**

Extend the twitter API to include a full URL for each tinyURL, and put it in the metadata. In the raw tweet text, put the tinyURL, but on twitter.com and new Twitter clients replace it. Legacy clients would work as they do now, but users of twitter.com and new clients would see:


> **apike** figures that if he improves something often enough, eventually it'll become good. [antipode.ca](http://www.antipode.ca/2009/antipode-realigned/)


This way it'll maintain HTML-free tweets for the legacy API, maintain short tweets for all clients, and let people see what the hell is being linked to.

