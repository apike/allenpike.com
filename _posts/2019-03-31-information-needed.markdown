---
author: allen
date: "2019-03-31 13:10:10 -08:00"
layout: post
title: "Information Needed"
summary: "App Review just has a few questions for you."
image: "/images/2019/bridge.jpg"
categories:
- Article
tags:
---

If you publish apps for iOS, understanding the App Store review process is part of your job. While [the core guidelines](https://developer.apple.com/app-store/review/guidelines/) are public, their enforcement relies on a large set of private rules and policies, policed by human beings. When you’re trying to release an update to your customers, the keeper of the [Bridge of Death](https://www.youtube.com/watch?v=dPOyOM7wxlE) is not the nicely summarized guidelines, but the machinery that enforces them.

<img src="/images/2019/bridge.jpg">

The high-level guidelines don’t change often, and when they do change developers are often warned in advance. The enforcement policies though – the de facto rules – are continually mutating in response to the latest App Store scams, PR issues, or problem areas.

So, while some guidelines – such as the one about not sending push notifications for marketing – don’t seem to be enforced at all, others are strictly enforced to the letter of the law, and flouting them will prompt a swift rejection. Or, more nerve-wracking, [an eventual rejection of a bugfix update that doesn’t change the relevant functionality](https://twitter.com/agiletortoise/status/1099795630518665216). So it helps to know the system.

## You say you wanna add subscriptions
For example, suppose you’ve seen where the wind is blowing, and have decided to add subscriptions to your app. In preparation, you may come across public Guideline 3.1.2:

> Ensure you clearly communicate the requirements described in Schedule 2 of the Apple Developer Program License Agreement, found in  [Agreements, Tax, and Banking](http://www.apple.com/itunes/go/itunesconnect/contracts).

While you *probably* should read the full agreement, it's a little over 24,000 words long. Maybe more of a weekend read. In the meantime, you can save a bit of time by scoping out a little thing I like to call the "Apple Developer Program License Agreement Schedule 2 section 3.8 part b".

This clause actually has some pretty clear language asking developers to:

> ...clearly and conspicuously disclose to users the following information regarding Your auto-renewing subscription: 
> - Title of publication or service
> - Length of subscription (time period and/or content/services provided during each subscription period)
> - Price of subscription, and price per unit if appropriate
> - Payment will be charged to iTunes Account at confirmation of purchase
> - Subscription automatically renews unless auto-renew is turned off at least 24-hours before the end of the current period
> - Account will be charged for renewal within 24-hours prior to the end of the current period, and identify the cost of the renewal
> - Subscriptions may be managed by the user and auto-renewal may be turned off by going to the user’s Account Settings after purchase
> - Links to Your Privacy Policy and Terms of Use 


Presented with the above, any app designer worth their salt will have a follow-up question: is it even possible to design a nice subscription flow that actually makes all eight of these things clear and conspicuous? Even with all the detail Apple provides – more than we generally get with most guidelines – the requirements leave key questions about how they’ll actually be enforced:

1. Do the App Store reviewers require text meet a certain standard to consider it “clear and conspicuous”? (They do.)
2. Do the links to your privacy policy and terms of use in your app’s settings count towards this requirement? (They don’t.)
3. Do reviewers require that some of these things are *more* clear and conspicuous than others? (They do.)
4. Would they approve an app that followed Apple’s own examples of how to implement subscriptions? ([Not even close.](https://www.theverge.com/2019/3/27/18284628/apple-news-plus-auto-subscription-breaking-rules-how-to-cancel))

I know about these pitfalls thanks to [various](https://twitter.com/agiletortoise/status/1099795630518665216) [developers](https://twitter.com/davedelong/status/1102329011647070209) [sharing](https://medium.com/revenuecat-blog/apple-will-reject-your-subscription-app-if-you-dont-include-this-disclosure-bba95244405d) their lessons learned about the unwritten parts of Apple’s subscription guidelines. As thanks, I wanted to pitch in by sharing some info about a different guideline I’ve learned a fair bit about over the years: **2.1**.

## Guideline 2.1: Information Needed
According to [Apple’s data](https://developer.apple.com/app-store/review/rejections/), the most common reason for an app to be rejected is ostensibly a simple one: "Guideline 2.1 – App Completeness”. The public guidelines for 2.1 describe a few kinds of incomplete or trivial apps, for example:

> We will reject incomplete app bundles and binaries that crash or exhibit obvious technical problems.

Eminently reasonable. In addition to this though, App Review categorizes a common type of provisional rejection as being under Guideline 2.1: “Information Needed”. Since an Information Needed rejection is usually unexpected, it can easily ruin a developer’s day. Thus, it helps to be prepared.

Here are some common reasons you may hit a 2.1:

1. **You didn’t include a working demo account.** D’oh.
2. **You didn’t include enough info to test your In App Purchases.** This is apparently quite common – reviewers have to try out your IAPs, and if it’s not immediately clear how to do so you can get a 2.1 rejection.
3. **Your app is sketchy.** Certain categories of apps are, by volume, often scam or spam. Slots apps, for example, can get a 2.1 as basically a “one strike warning” to give the developer a chance to double-check whether they violate certain rules before they go through full app review. [There are various copies of this warning text online](https://forums.developer.apple.com/thread/100426), so if you’re participating in the dodgy end of the App Store then it’s worth being aware of this.
4. **Your app isn’t testable on a simulator.** If your app isn’t testable except in the “real world”, or requires special hardware, reviewers may 2.1 reject the app pending a video that shows how it works. If your app doesn't run in the simulator, pre-prepping a demo video can help expedite this process. Steamclock builds a lot of apps for Bluetooth devices, so we prep these fairly often.
5. **You need to prove that your company is authorized to offer this app.** For example, let’s say you titled your app "Royal Bank of Canada", but tried to publish it under “Surprised Pikachu LLC”. You may be surprised when App Review asks for some evidence that you are in fact the largest financial institution in Canada and not in fact a lazy scammer.
    
While these cases are all fairly straightforward, there is one particular 2.1 request that I have seen from time to time that did surprise me when I first saw it, and as far as I can tell not much has been written about it. You may in fact be rejected if:
    
<ol start="6">
	<li><b>Your app requires users to log in, but doesn’t offer account creation.</b></li>
</ol>

Without a way to create an account, App Review can't evaluate your payment mechanism. In this case, App Review will typically hit the brakes to determine if the app violates “3.1 Payments”.

If your app’s business model was crafted specifically to circumvent Apple’s In App Purchase rules and you thought just not offering in-app account creation would be enough to fool them, then you’re gonna have a bad time. Otherwise, things aren't so bad. You just need to – carefully, but quickly since your app update is now in the dreaded Review Limbo – make the case that your business model is kosher.

One of the few accounts online of this process [comes from this Japanese blog post by Takuya Matsuyama](https://blog.craftz.dog/avoiding-in-app-purchase-4b7cf310f386), who outlines what App Review may ask in this “business model review” scenario:

> - Does your app access any paid content or services?
> - What are the paid content or services, and what are the costs?
> - Do individual customers pay for the content or services?
> - If no, does a company or organization pay for the content or services?
> - Where do they pay, and what's the payment method?
> - If users create an account to use your app, are there fees involved?
> - How do users obtain an account?

Through the magic of Google Translate, I can see that Takuya and I felt similarly after getting this kind of rejection for the first time:

> Even though Apple's examination was nothing last time, it is scary because it is pointed out from the point of view not to predict suddenly.

Put another away, it’s not fun to have the Supreme Gatekeeper suddenly audit your business model.

## Being prepared

Since I know better than to try to end-run around Apple’s payment rules, every time I’ve received this kind of rejection I’ve been able to walk App Review through the business model and why it’s above board.

That’s not to say caution isn't merited. I've definitely seen clients get a business model review, respond ambiguously without understanding the underlying guidelines, and as a result get caught in a slow secondary review. Don't be like them – be prepared.

If you’re considering building an iOS app that requires login but doesn’t let users create accounts in-app, be sure to review and *understand* Apple’s rules around in-app payment, and schedule an extra 1-2 weeks when you launch or make a major change to the app to accommodate a potentially long review. If your initial submission is approved without a 2.1, be cautious since any future update, even a critical bugfix, could trigger the review.

If the bridgekeeper perceives your iOS app to be main value of a service customers are paying for elsewhere, they could toss you into the Gorge of Eternal Peril for not offering IAP.

If everything is on the level though, and you just haven't gotten around to providing account creation in-app in your initial release, then you should be fine.

Just don't forget your favourite colour.








