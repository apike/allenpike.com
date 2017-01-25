---
author: allen
comments: true
date: "2015-04-30 18:00:00"
layout: post
slug: "user-agents-of-change"
summary: "The user-agent string just can't stop."
title: "User Agents of Change"
categories:
- Article
---

<img src='/images/2015/ie-edge.jpg' width='250'>

Yesterday, Microsoft released a preview of Edge, their next-generation web browser. Edge's new rendering engine brings it more in line with modern layout engines like WebKit, and finally introduces a modern replacement for Internet Explorer. IE's dark past means that millions of existing websites serve it old and busted markup and JavaScript, which should thankfully no longer be necessary with Edge's modern engine. As such, it was time for Microsoft to revisit the browser's user-agent.

For Edge, they worked to remove the [gross middleware junk that cluttered IE's user-agent](https://gist.github.com/jonelf/3743071) and simply advertise Edge as a modern browser that can handle modern web apps. With this in mind, Edge identifies itself with the following [new, streamlined user-agent][1]:

> Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36 Edge/12.0

Short and sweet. The user-agent is more thorough on mobile:

> Mozilla/5.0 (Windows Phone 10.0; Android 4.2.1; *DEVICE INFO*) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Mobile Safari/537.36 Edge/12.0

That is to say, Microsoft Edge claims to be every computing platform ever conceived - except for Internet Explorer. On its surface, this bold claim is surprising.

## I am everyone and no one
The user-agent HTTP field was conceived in 1992 with a clear and simple purpose: let browsers identify themselves to websites. It let web developers collect stats about how many luddites were using "NCSA_Mosaic/2.0" and how many hotshots were using "Mozilla/1.0", the Mosaic killer officially known as Netscape.

Netscape did in fact kill Mosaic, and it did so by adding more features. By the mid 90s, savvy web developers were checking the user-agent for "Mozilla" so they could send Netscape fancy new markup but still support older browsers with plainer content. With this user-agent detection technique, developers could safely use Netscape's JavaScript to pop up insightful alert dialogs, or serve fancy frame-based layouts that leveraged expansive 800x600 "[Super VGA](http://en.wikipedia.org/wiki/Super_video_graphics_array)" displays. It was a crazy time, full of naive optimism and developers drunk on blink tags.

In the meantime, Microsoft was busy developing Internet Explorer. As expected, they specified their user-agent string as "Microsoft Internet Explorer/1.0 (Windows 3.1)". Unfortunately for Microsoft, and anybody who would ever need to make sense of a user-agent again, this meant IE 1.0 was served pages without the fancy Netscape functionality. These Mozilla-detecting sites made IE seem crappy - a designation it had yet to earn. The next version of IE instead shipped as "Mozilla/1.22 (compatible; MSIE 2.0; Windows 3.1)" and fixed the problem [once and for all](https://www.youtube.com/watch?v=2taViFH_6_Y).  IE users got JavaScript and frames, and web developers got [an endless cycle of pain](http://webaim.org/blog/user-agent-string-history/).

In the 20 years since, every new web browser has been stuck with the same unpleasant choice. They can either fight the long, hard fight of evangelizing [feature detection](http://www.html5rocks.com/en/tutorials/detection/) and battling one by one to get sites to update fragile and out of date browser detection code across the entire web... or they can just tack a new token onto the existing trainwreck and be done with it. Chrome could have simply launched as Chrome/1.0, but instead it made its debut as

> Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.19 (KHTML, like Gecko) Chrome/1.0.154.39 Safari/525.19

The HTTP 1.1 spec [specifically discourages this](http://tools.ietf.org/html/draft-ietf-httpbis-p2-semantics-23#section-5.5.3), since it further entrenches browser detection. Unfortunately, appending yet more junk to the user-agent is the least bad way for a new browser to get modern behaviour from existing websites, but still allow new code and analytics packages to identify it.

<img src='/images/2015/katamari.jpg' alt='Katamari Damacy'>

And so the user-agent string has become a never-ending katamari that appends the string of every browser that was ever popular. After 20 years of rolling in more and more tokens, every HTTP request Edge makes has to include more than 150 bytes of text to simply convey that it is in fact Edge - a fact that only contains perhaps two bytes of entropy. As things stand, the string will continue to roll on and on indefinitely until it is large enough to pick up buildings and oil tankers.


Thankfully, an end to this madness is in sight. Analysis of major browser releases over the last 20 years shows that user-agents have grown in length roughly linearly at a rate of about 5 characters a year. This pace will eventually become unsustainable, since the popular Apache web server [limits header size to only 8190 bytes](http://httpd.apache.org/docs/current/mod/core.html#limitrequestfieldsize). With this limit in place, user-agents can only grow at their current rate for another 1608 years. The clock is ticking for browser vendors and web developers alike to work together to forge a new solution to this problem - before it's too late.

[1]: https://msdn.microsoft.com/library/hh869301(v=vs.85).aspx
