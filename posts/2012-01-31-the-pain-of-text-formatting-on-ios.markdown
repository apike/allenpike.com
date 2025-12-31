---
author: allen
comments: true
date: 2012-01-31 16:26:01
layout: post
slug: the-pain-of-text-formatting-on-ios
title: The pain of text formatting on iOS
wordpress_id: 2118
categories:
- Article
oldtags:
- Cocoa
- iOS
- Performance
- WebKit
---

Today Buzz Andersen highlighted the biggest hole in Cocoa Touch: [there is no simple way to format text](http://log.scifihifi.com/post/16834335332/a-plea-for-better-ios-text-facilities).



> What we really need is a facility that provides access to at least some subset of WebKit HTML rendering capabilities at a level between CoreText and UIWebView—something that doesn’t require developers to essentially re-invent HTML and CSS but allows them to render at least some level of HTML formatted text to a native view without the overhead and inflexibility of UIWebView—basically, a next generation version of Mac OS X Cocoa’s NSAttributedString



My favourite "why is native iOS development sometimes expensive" story is the Tale of the Bold Username. In an alpha version of the iPhone app we built for Foodtree, we displayed comments like so:



> Allen: These are some great-looking blueberries! This year I'm buying a few pounds and freezing them.



We'd just hired Angelina, who had a background in web development, and her first task was to change the formatting to look like this:



> **Allen** These are some great-looking blueberries! This year I'm buying a few pounds and freezing them.



She was surprised that we estimated it would take her two days. In HTML this would take a few seconds - possibly a few minutes. Sure enough, it took two full days to get the text layout reimplemented in the low-level C APIs, called CoreText ((Uncharacteristically, we didn't bill for the time - partly because she was learning, and partly because it seemed so ridiculous.)).

As soon as we changed to a formatted multi-line label, we had to do a whole pile of work just to lay out the text, specify the character range we wanted to format, wrap the text, actually render, and then get the dimensions of the final output. Things were further complicated by the fact we needed to get the dimensions of the output for every row in the table before it could be displayed, since this determined the height of the rows and therefore the scrolling metrics.

Why not just use a WebView? In most cases we would, but this is was one little element that may appear hundreds of times in a scrolling TableView. The table needs to be able to [scroll at 60fps](/2011/providing-joy-at-60-fps/), and there's no way we can tear down and set up WebView fast enough.

Worse, in order to get the proper scrollbar height at load time, you'd need to render the whole content in every WebView for the entire table. We could reimplement the entire main view of the app in a WebView, but that would have a whole other set of performance and UI consequences, and be a lot of work. 

I think Buzz' conclusion is apt:



> I think the absence of such an API on iOS is holding the platform back as a media platform more than almost anything else I can think of.
