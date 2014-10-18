---
author: allen
comments: true
date: 2014-04-30 23:00:00
layout: post
slug: "burying-the-url"
title: "Burying the URL"
categories:
- Article
tags:
- Chrome
- Browsers
---

Today, [a Canary build of Google Chrome](http://garybacon.com/post/new-awesome-bar-in-googles-chrome-canary/) removed something kind of important from the browser: the URL.

Of course it still supports them, but the time where users actually see URLs is ending. With Chrome's "Enable origin chip in Omnibox" flag, Location becomes a write-only field. Clicking there no longer reveals the URL for the user to edit or share, but instead waits for you to search Google.

*Update: Chrome's Paul Irish has come out against this change, which he [says at this point is an experiment](https://news.ycombinator.com/item?id=7678580).*

<img src='/images/2014/location-bars.png'>

I realize that URLs are ugly to look at, hard to remember, and a nightmare for security. Still, they are the entire point of the web.

## Tangled
There was a recent round of debate about what the term "web" even means, where many people shared a common idea. [John Gruber put it so](http://daringfireball.net/2014/04/rethinking_what_we_mean_by_mobile_web):

> The web has always been a nebulous concept, but at its center is the idea that everything can be linked.

Putting it more directly, [Boris Smus said](http://smus.com/ebb-of-the-web/):

>To me, the critical thing is that content be addressable by URL, and cross-linkable in some reasonable way.

URLs are the essence. They make hypertext hyper. The term "web" is no accident &ndash; it refers to this explicitly.

Unlike other modern technologies that have hidden as much complexity as possible, web browsers have continued to put this technical artifact top center, dots, slashes and all. The noble URL caused a revolution in sharing and publishing.

It is also a usability tarpit that directly competes with search.

<img src='/images/2014/internet-grandma.jpg' style='width:300px'>

Six years ago, Chrome and Firefox enabled search in the location field. Where previously typing "ruby" would send you to ruby.com and dump you on the Kay Jewelers site, now it directs you to ruby-lang.org by way of a Google results page. Of course this benefits Google, but it's also better for users. Usability 1, URLs 0.

More recently, browsers started hiding the URL scheme. http:// was no more, as far as most users were concerned. In iOS 7, Mobile Safari went even further and hid everything about the URL except the domain. With the Chrome "origin chip" change, the URL will move out of the field entirely, to a tidy little button that many users will never even realize is clickable.

I suppose burying the URL like this will probably have some usability and security benefits. I know older users intimidated enough by the location bar in its traditional form that they never click it at all. For these same users, maybe this change will finally make clear the security implications of putting their banking information into www.murica-bank.biz/<wbr/>bankofamerica.com/<wbr/>securelogin.asp. And of course, it will drive searches.

## Trading places
As large JavaScript "single page app" development has become popular, the rallying call has been to [not break the web](http://2013.jsconf.eu/speakers/tom-dale-stop-breaking-the-web.html), and make sure these apps still work via URLs. Native apps, meanwhile, have been fairly dismal in terms of linkability, creating silos of content that have no sensical URL. If you agree that the web is about linkability, I'm not sure how you can think the current native app ecosystem is web-like.

To this end, Facebook today announced [AppLinks](http://applinks.org/), a documented standard for app-to-app linking that has the backing of other big names like Dropbox and Pinterest. While Google is taking the web out of the browser, Facebook is putting the web into apps.

Perhaps URLs are just destined to be an implementation detail that the next generation of users won't even know exists. Maybe I was crazy to think that URLs were a permanent part of our culture. Still, I'll miss the damn things. Let's pour one out for the URL.