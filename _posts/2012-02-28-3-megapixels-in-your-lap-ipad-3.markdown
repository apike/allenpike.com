---
author: allen
comments: true
date: 2012-02-28 14:51:58
layout: post
slug: 3-megapixels-in-your-lap-ipad-3
title: 3 megapixels in your lap
wordpress_id: 2184
categories:
- Article
tags:
- App Store
- Cocoa
- iOS
- iPad
- Web Design
---

![](/images/wp-uploads/2012/02/retina.jpg)On March 7, [Apple is announcing the next iPad](http://www.theverge.com/2012/2/28/2829143/apple-ipad-3-event-march-7th-official), and we can see from their photo that it has a higher resolution display. Since it will be 4x ((Some people refer to doubling the count of pixels in each dimension as 2x, but here I will refer to it as 4x because there are four times as many pixels total.)) the pixels at the same display size ((If you think there is any chance Apple will increase the resolution of the iPad by any factor other than 4x, or you think they will likely increase the physical dimensions, then you sir do not know what you are talking about.)), this display has some interesting stats:



* Dimensions: 2048 x 1536

* Density: 264 DPI

* Resolution: 3.1 megapixels


This will create some challenges for us as developers and content creators. If you used an iPhone 4 when it was launched, you know that a 1x image displayed on a 4x display actually looks worse than it did on a 1x display because there is much less blur at the pixel boundaries. On iPad 3 launch day, existing apps and sites will look, more or less, like crap. Apple will demo their apps, and of course the New York Times ((The Times will look pretty good at high-res because it is almost all text and uses SVG for their banner.)), but low-res images will make a lot of content blurry for early iPad 3 users.

**Apps at 264 DPI**

App designers will wrestle with 2048 pixel Photoshop files - a pain on anything other than a 27" monitor. Even a 27" iMac can't display all of a portrait-oriented iPad 3 mockup or simulator ((This is a good sign that the upcoming Retina Macs are close: designing for Retina iPads adds a real practical need for such a computer.)). In any case, we'll see high-res assets in iPad apps faster than we did with iPhone apps partly because iOS designers are much savvier about the issue now, and partly because Cocoa's workflow for handing the resources is very seamless. You just create the high-res resource, append "@2x" to the filename, and you're done.

App developers will wrestle with their animations and other graphics performance issues. [Prism](http://www.steamclocksw.com/prism/) is a poster child for high-res iPads: we download and display lots of gorgeous full-screen photos. Although I trust Apple's hardware team will give us enough horsepower to smoothly resize, animate, and transition 3-megapixel images, it will surely take some work on our end to [make the magic happen](https://www.allenpike.com/2011/providing-joy-at-60-fps/).

In general though, iOS apps are well suited to using high-res images because their UI assets are pre-loaded, pre-fetching assets is very straightforward, and Cocoa does almost all of the work for you.

**The web at 264 DPI**
![Top: The current headline image on CNN.com resized smoothly to 4x. Bottom: An image of the same statue at full resolution.](/images/wp-uploads/2012/02/cnn-retina.jpg) On the iPhone 4, the low-res web looked pretty good because most desktop web sites are displayed at well under 100% size. Most phone-oriented sites that use a `meta viewport` to display at 100% size use media queries ((You can write a media query on `-webkit-min-device-pixel-ratio: 2` to serve up high-res CSS that swaps in 4x versions of various background images and UI elements.)) to load high-res resources. This provides a pretty easy call: either serve a given device a scaled down desktop site, or serve them a phone-optimized high-res mobile site. Content images don't usually get a high-quality version, but you don't care too much about images on your phone anyway.

On the other hand, most sites rightly serve their normal desktop edition to the iPad. All these sites (especially the ones with a lot of image content) are going to look blurry on the iPad 3. This afternoon, CNN.com's headline image is blurred out even at normal resolution, let alone 4x. This is going to go from common practice to unacceptable very fast.

At the software level, CMSes need to understand and work with high-res user-agents, and conditionally serve two versions of each image. When you upload an image to any CMS, it should default to treating that as a 4x source image and creating a 1x version to seamlessly serve to low-res clients. Web frameworks and build tools need to make referencing and serving up 4x images as seamless as Cocoa does: reference the image, and at runtime 1x or 4x will get served up depending on the user-agent. On the performance side, engineers will need to handle and mitigate the performance costs of sending 4 times as much image data to some users. This probably means more pre-loading and post-caching of assets.

**A high-resolution standoff**

Websites can do almost everything apps can do, but the tools aren't there yet for high-res. If sites start serving up 4x images relatively soon and are able to do so without crippling page load times, they can provide a great experience for a new class of users. If sites are unwilling or unable to effectively serve up high-res content and UI, they're going to get their butts kicked by beautiful Retina apps that use Cocoa to download their assets ahead of time or asynchronously.

We don't know exactly how quickly high-res user agents will take over the web. Still, with Retina iPads almost here and Retina Macs in the pipeline, many influential users will soon be living in a world of beauty - whether via apps or the web.
