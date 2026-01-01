---
author: allen
comments: true
date: 2010-05-01 10:44:31
layout: post
slug: scrolling-libraries-for-mobile-safari
title: Scrolling libraries for Mobile Safari
wordpress_id: 1661
categories:
- Article
oldtags:
- iPad
- iPhone
- Javascript
- Mobile Safari
- Scrolling
---

![](/images/wp-uploads/2010/04/scroll-tension.jpg)Scroll panes are a challenge for many Mobile Safari app developers. Often you'll want to have persistent UI on a page that doesn't scroll when the main content area does, especially on the iPad. However, Mobile Safari requires two-finger scrolling for iframes and `overflow:scroll` elements, and doesn't support `position:fixed`. Both these decisions make sense for making existing content browsable using touch, but complicate things for apps that need kind of scrolling.

Luckily, it's possible to implement high-performance touch scrolling with fixed elements using the hardware-accelerated animations available on the iPhone and iPad. Even more luckily, people are working on this problem so you don't have to, and have released their work under MIT-style licenses.


## iScroll


**Website**: [Announcement blog post](http://cubiq.org/scrolling-div-for-mobile-webkit-turns-3/16).
**Demo**: [iPhone only](http://cubiq.org/dropbox/iscroll/).
**Minified Size**: 7.6KB.

The most commonly used scrolling library for Mobile Safari has been Matteo Spinelli's iScroll library. iScroll is now at version 3, and supports most of what you'd want from an iPhone scrolling library. The look and feel are pretty close, but are not an exact reproduction of native scrolling. For example, version 3 removed the effect where scrollbars shrink when you scroll past the end of the region. Further, support for non-Apple devices is intermittent, which causes concerns for people using PhoneGap to make cross-platform apps. For these reasons, a lot of developers I've talked to aren't satisfied with it.

In terms of perception, iScroll suffers most from a weak web presence. It's hard to find on Google because "iScroll" is actually the name of an unrelated eBook app. The library is distributed through blog entries rather than a dedicated website, so make sure you're looking at the latest iScroll-related entry. The creator has now switched gears to a more general purpose JavaScript library called [GhostTouch](http://code.google.com/p/ghosttouch/), which is still at an early stage. As a result, a community hasn't really formed around this library.


## TouchScroll


**Website**: [Announcement blog post](http://uxebu.com/blog/2010/04/27/touchscroll-a-scrolling-layer-for-webkit-mobile/) and [GitHub page](http://github.com/davidaurelio/TouchScroll).
**Demo**: [iPhone and iPad](http://static.uxebu.com/~david/touchscroll/).
**Minified Size**: 17.4KB.

This week David Aurelio released TouchScroll, a competing library. It's more code than iScroll, but seeks to be more featureful and high-fidelity. It automatically updates to compensate for its content changing, and is also scrollable on desktop browsers simply by setting `overflow:scroll`. It's written with PhoneGap developers in mind, including first-class Android support. It's currently buggier than iScroll, but given its [current buzz](http://daringfireball.net/linked/2010/04/28/touchscroll), its [fork-friendly GitHub page](http://github.com/davidaurelio/TouchScroll), and the PhoneGap focus I can see TouchScroll becoming the dominant library in the medium term.


## Frameworks


In the meantime, various frameworks have been implementing their own touch scrolling. Earlier this month at JSConf, the SproutCore guys announced and demoed [their own touch scrolling support](http://blog.sproutcore.com/post/531215199/introducing-sproutcore-touch). While they don't have native-style scrollbars yet, their performance is very good. For large apps, the performance benefits of their incremental rendering technology is a big win: only elements that are visible are rendered in the DOM. Other frameworks are working on solutions, for example the jqTouch plugin for jQuery has a plugin of its own based on iScroll. In the long term I see most frameworks including touch scrolling as part of the package.
