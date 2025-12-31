---
author: allen
comments: false
date: 2006-09-20 00:40:15
layout: post
slug: ipod-sdk-open-up
title: iPod SDK, where art thou?
wordpress_id: 96
categories:
- Article
oldtags:
- Apple
- DRM
- iPod
- SDK
---

![iPod mini dissassembled.](/images/wp-uploads/2006/09/ipod3.jpg)Apple doesn't want you to have a a Software Development Kit (SDK) for the iPod. Five years after its introduction, this mythical wonder is still elusive, and quite on purpose. Some people have it, mind you - as proof, the iTunes Store is now selling [iPod Games](http://www.apple.com/itunes/store/games.html) such as Tetris. But thousands of other developers like myself would love to start churning out games, utilities, and other fun things that run on the iPod, making it a more useful and valuable device. There are 5 reasons, however, that Apple is getting in the way.


### 1. You didn't say the magic word


For 5 years Apple has had complete control over the iPod experience, and they have little intention of letting it go now. Steve Jobs craves control - he _needs_ it. As such, for Apple to even acknowledge the SDK's existence you need a special deal with them. They now have a [simple file format for applications](http://www.bensinclair.com/article/whats-inside-an-ipod-game) (via [Warped Visions](http://warpedvisions.org/2006/09/18/an-ipod-platform/)) but for it to work they have to be stamped with Apple's Digital Signature of Wholesomeness.

Other than that, there are ways your software can export still images or [lame NotesOnly files](http://www.macworld.com/2004/09/secrets/septgeekfactor/) to an iPod, but that's it. [iPodLinux](http://ipodlinux.org/) is cool and all, but it doesn't work on any of the iPods released in the last couple years. So why not just open the damn thing up?


### 2. $5 a pop


The new iPod games available for download on the iTunes Store are netting Apple $4.99 of revenue each. If Apple gets a cut of every application available for the iPod, they stand to get some of a very large pie. On the other hand, if they release a public SDK I could probably write a Tetris clone in two days and release it under the GPL, slaying their $4.99 Tetris sales. Forcing software to be all the same price and shepherded by Apple is very much the iPod way.


### 3. $DRM = off;


![iPod complaining about the RIAA.](/images/wp-uploads/2006/09/ipod4.jpg)

There are a lot of things iPod applications could theoretically do that would cause Apple an infarction. Obviously they would try to make it hard to interfere with the workings of their DRM system, but people will no doubt try. In the meantime, I'm sure apps would appear within seconds that let you send unprotected mp3 files to strangers on the bus. Cue the RIAA screaming in horror, and hitting Apple in the head with a blunt object in their blind rage. There are other, even more sinister applications Apple doesn't want on iPods. Microsoft Windows Media support, for example.


### 4. Illegal operation, please reboot iPod


The birth of bad iPod apps would be the result of a public SDK, especially considering how unusual a platform the iPod is. Apple wants iPod applications not only to be high quality, but battery-friendly, scroll-wheel-friendly, and hard-drive-friendly. iPod drives aren't meant for a serious thrashing, which is fine because the iPod software uses the drive infrequently. Creative coders, however, could inadvertently put your tiny drive through weeks of calisthenics, sending a drove of under-warranty drive replacements Apple's way.


### 5. They're not ready


![iPod nano disassembled.](/images/wp-uploads/2006/09/ipod2.jpg)

Opening a public development API takes serious testing, documentation, backwards compatibility maintenance, and support for developers. Maybe the sanctioned games are just an intermediate roll-out, to test out the SDK. Maybe it's all awaiting the next version of XCode.

It seems, though, that Apple will need to get over themselves on the previous points before readiness becomes an issue. In any case the process will likely still involve some sort of official approval before your application is signed by Apple, after which it cannot be modified to do anything untoward. So much for my GPLed iPod Tetriz - maybe it wasn't meant to be.
