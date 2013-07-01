---
author: allen
comments: true
date: 2008-09-28 00:06:30
layout: post
slug: seeing-red-css-sprite-borders
title: 'Seeing red: CSS sprite borders'
wordpress_id: 395
categories:
- Article
tags:
- CSS
- Failure
- Gecko
- Google
---

![](/images/wp-uploads/2008/09/google_sprites.gif) Four years ago Dave Shea [gave us CSS Sprites](http://alistapart.com/articles/sprites/), and it was good. Since then they've seen wide adoption, both for reducing HTTP request counts ((Nowadays many websites spend more time receiving, setting up, and tearing down requests than they do actually sending the files. Considering that HTTP only allows two to four images to be downloaded at once, it's easy to have network latency dominate your load times.)) and for doing away with Javscript image pre-loading.

As great as CSS Sprites are, they're a bit more more error-prone than using traditional images. Google uses them extensively, and I've noticed a trick they use to keep everything lined up right. Between the images in their sprites on Google Reader, they've put a red line of pixels. That way, if something is one pixel off, it will be caught immediately.

As clever as this is, it has a problem: we've entered an era where one pixel at design time doesn't always mean one pixel at display time. My favourite example of this is OS-wide resolution independence, but it's here today in Firefox 3.

![](/images/wp-uploads/2008/09/sprite-scale-fail.png)To the right is an example of Google Reader scaled up a couple notches using full-page zoom. It's technically difficult to scale pixel-based designs seamlessly, and Firefox does a good job most of the time. Usually those half-pixel-off problems aren't glaring, but Google stirs in some #FF0000 and kicks up the sucking.

So what do we have, in the end? A useful trick that reveals a bug in Firefox, or a Google engineer who was too clever for his own good?
