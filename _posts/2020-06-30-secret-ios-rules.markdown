---
author: allen
date: "2020-06-30 8:00:00 -08:00"
layout: post
title: "The Secret Rules of iOS Development"
summary: "Undocumented rules make for unpleasant surprises."
image: "/images/2020/developer-blown.jpg"
tags:
- iosdev
categories:
- Article

---

Two weeks ago, news broke that Apple rejected the iOS version of Hey, Basecamp’s highly anticipated new email product. The reasoning? Like many apps on iOS, Hey didn’t support Apple’s in-app purchase system. Not long ago, Hey’s app would have been approved, but a recent change to the secret rules – not the public guidelines, but the actual policies Apple uses to selectively enforce those guidelines – resulted in a surprise rejection.

As he often does, Michael Tsai compiled quotes from various articles and stories that resulted. The first comments were from pundits and observers, but they quickly gave way to [a catalogue of greivances, unpleasant surprises, and weird injustices developers have faced over years of App Review](https://mjtsai.com/blog/2020/06/16/hey-rejected-from-the-app-store/), often due to rules that have never been publicly acknowledged by Apple.

<img src="/images/2020/developer-blown-wide.jpg" >

In response to the ensuing bad press, Apple allowed Hey onto iOS – despite it still violating the guidelines – and announced that [developers will be getting a mechanism to challenge Apple’s review guidelines](https://www.apple.com/newsroom/2020/06/apple-reveals-new-developer-technologies-to-foster-the-next-generation-of-apps/).

Which is definitely something. The idea seems to be that Hey will have a chance to challenge Apple’s public guideline about multi-platform apps, which says that apps can only allow users to access content, subscriptions, or features they have acquired elsewhere if they are also available via IAP.

While it's great that Apple is open to these rules being challenged, it seems that the things most worth reconsidering about App Review aren't even part of the public guidelines. Will Hey be able to challenge the secret rule that says they need to follow the IAP guideline, but that Slack doesn’t? What about the policy that iOS apps can’t be distributed directly to customers? Or Apple’s habit of quietly changing the undocumented approval policies, without notifying people that apps that used to be approved will now be rejected?

Or the existence of secret App Store policies at all?

I suspect not. Chances are, iOS app development will continue to depend on reading tea leaves and following other developers’ tales of surprise rejections, never fully knowing exactly what can and can't be distributed on iOS at any given time.

But hey, a developer can dream.

