---
author: allen
comments: true
date: 2010-04-05 01:40:24
layout: post
slug: choosing-a-viewport-for-ipad-sites
title: Choosing a viewport for iPad sites
wordpress_id: 1612
categories:
- Article
- Best Of
tags:
- iPad
- iPhone
- Safari
---

![](/images/wp-uploads/2010/04/viewport.jpg)The iPad has made choosing a good viewport tag for your site more challenging. You now need to specify something that looks good with your content for screens that are 320px, 480px, 768px, and 1024px wide.


## Viewports


Mobile Safari presents desktop-sized sites on small screens by rendering to a virtual browser screen that is 980px ((Of course, when the iPad is in landscape orientation of 1024px wide, it will use 1024px.)) wide, and letting you pan and zoom that page. Viewport tags let you tell Mobile Safari that your site displays properly narrower than 980px, and set other preferences for scaling your page.

Craig Hockenberry famously [determined the ideal viewport tag](http://furbo.org/2007/07/24/one-line-of-code/) for content sites in the iPhone era. That technique is no longer sufficient for the iPad because it can blow up your content larger than 1:1, blurring your images.


## TN2262


The Apple tech note "[Preparing Your Web Content for iPad](http://developer.apple.com/safari/library/technotes/tn2010/tn2262.html)" has a good suggestion: avoid hard-coding a width for your viewport. On the iPad, a viewport width smaller than 1024 can cause your content to be blown up and blurred. Their suggestion is

    
    <meta name="viewport" content="width=device-width" />


This is an improvement, but your content will still be blown up if your device is in landscape mode. This is because device-width is the width of the physical device (320px or 768px), not the width of the screen in the current orientation. As a consequence, you can get content rendered at 768px and blown up to 1024px.


## Avoiding Blowup


To make sure your content is not blown up, set the maximum-scale to 1.0:

    
    <meta name="viewport" content="width=device-width,
                                   maximum-scale=1.0" />


Sites with the above tag will get a 1:1 viewport for all devices and orientations. This is impractical if your site does not render properly at 320px wide. In this case, hardcode a width and also set a maximum scale so your site isn't blown up on the iPad:

    
    <meta name="viewport" content="width=720,
                                   maximum-scale=1.0" />


This viewport will give you 1:1 rendering on the iPad, and a 720px viewport on the iPhone and iPod touch. Any desktop site that looks good narrower than 980px should set a viewport like this, especially any site that fits in 768px, since you can opt portrait-oriented iPad users into 1:1 unblurred versions of your content.


## The initial-scale Hack


In Craig's aforelinked viewport post from 2007, he suggested adding an initial-scale and minimum-scale of around 0.5 to your viewport for long pages. Back then, this simply limited how zoomed out the page would be on initial load. That's unnecessary now, since Mobile Safari instead sets the initial zoom to whatever is required to fit the width of the screen.

Setting a small initial-scale nowadays has an interesting effect: if your chosen initial-scale is less than would be required to fit the width of the screen, your viewport is expanded. For example, if you set a viewport of 640px wide, and an initial-scale of 0.5, it will display normally on the iPhone (scaled 0.5x to fit 640px into 320px.) On the iPad, however, it will expand your viewport to 1280px, which was probably not your intention.

Overall, the initial-scale hack doesn't seem to have utility anymore, and has odd side effects, so I imagine sites that have adopted the initial-scale hack, [such as Daring Fireball](http://daringfireball.net/linked/2007/07/24/one-line), will drop it as iPad usage increases.
