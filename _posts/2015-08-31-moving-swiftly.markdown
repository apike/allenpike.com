---
author: allen
comments: true
date: "2015-08-31 18:00:00"
layout: post
slug: "move-swiftly"
title: "Moving Swiftly"
categories:
- Article
---

Last year, Apple revealed Swift, the future of software development on their platforms. [Next Wednesday](http://www.loopinsight.com/2015/08/27/apple-sends-out-invite-for-sept-9-special-event/) they're expected to officially release Swift 2 as part of Xcode 7 GM. In just a year, everything has changed. We went from writing our apps in an object-oriented flavour of C, to writing almost exclusively Swift. I'm personally writing more code than I have in years, in part because it's just fun.

<img src='/images/2015/new-language.jpg'>

Now, to be clear, writing Swift 1.0 was not fun. It was novel, it was at times exciting, but it was not fun. The compiler would crash, the syntax highlighter would crash, the IDE would crash. The running app would surprisingly not crash, but that was pretty much the only non-crashing thing in the vicinity of any Swift 1.0 developer's desk. I think this caused a bit of bad blood, and a number of folks who tested the Swift waters early promptly returned to the Objective-C they knew and loved.

While that was happening, Steamclock dug in. We started building internal tools with Swift last June. That October, we decided to start giving clients the option of going for Swift for new app builds. It seemed optimistic, but we were excited to level up our Swift experience and give new projects a leg up on the future. The results were blow-away: of roughly a dozen clients, only one opted for Objective-C. Swift became our default programming language almost overnight.

Now, as the language is hitting its stride, we're more productive, we're seeing fewer issues in the field, and our clients are happy to be ahead of the curve. Almost as importantly, it's fun - it sure makes recruiting easier when you're hiring people to write [Stack Overflow's "most loved" language](http://stackoverflow.com/research/developer-survey-2015). (By the way, if you're a Vancouver mobile developer who'd like to come write Swift at Steamclock, [we're hiring](https://careers.stackoverflow.com/jobs/97036/swift-developer-steamclock-software).)

## Trouble
That's not to say that the Swift transition didn't cause some pain. For example, the explicit lack of source compatibility between versions is pants-on-head insane. At least, that's what people say when they hear the term "no source compatibility between versions."

In practice it's not quite so bad. Lack of source compatibility means that each time a new version of Swift is released, you need to block out an hour to a day to migrate your code to it, after which point it will no longer run on the old version of Swift. In the common case that you're not distributing your code that's not *so* bad, but when you start dealing with Swift-based CocoaPods, it gets messy.

The bigger issue is that Swift versions are tied to Xcode versions, and Xcode versions are tied to iOS versions. So, if you want to debug your Swift app on an iOS 9 device, you need to use Xcode 7 beta, which only compiles Swift 2, which means you need to port your app to Swift 2 to debug it on iOS 9. Meanwhile, even this late in the game, you still can't send betas to customers or reviewers from Xcode 7 beta, which means you can't beta test Swift 2 apps, which means Testflight and Swift don't go well together.

It's clear they're going to improve this little mess, though it's unclear exactly when or how. Either Swift needs to start locking down some source compatibility, or Xcode and Swift need to be more decoupled. Either way, Testflight definitely needs to support external beta testing with beta versions of Xcode, because srsly.

All that said, we've successfully worked around it, mostly by relying less on Testflight and by avoiding the Xcode betas for projects that might need to be distributed to the App Store any time soon. It's not ideal, but this dance been a worthwhile tradeoff for the benefits Swift gives us. It seems like the language is in a good enough place that future versions should require substantially less thrash, but are we out of the woods yet? It's a bit hard to tell.

## Salt in the wound
With Swift 2, the other issue I still regularly hit is quirky error reporting. Errors matter a lot in statically compiled languages, which ask a lot more of developers than a loose language does in terms of just getting the damn thing to run. Swift is more heavy-handed this way than Objective-C, due to its stricter mutability and optionality rules.

As such, writing Swift code that doesn't compile is easy, especially when you're learning. Luckily, a great compiler can have a nuanced enough understanding of your code to point out issues clearly and rapidly. Swift was designed to enable exactly this, via great autocompletion and expressive error messages. 

Unfortunately, while the infrastructure for developing good errors was in place early on, initial versions of Swift tended to produce very misleading errors, even from simple typos. Even with 2.0, Xcode will give you the occasional self-referential error that really makes you wonder what exact strain of hallucinogen it has recently consumed.

<a href='https://openradar.appspot.com/radar?id=4969800275066880'><img src='/images/2015/cgfloat.png'></a>

Luckily, the errors are getting a lot better, and seem to be rightly recognized as a priority to the Xcode team. In many cases, Swift now gives better errors than were possible in Objective-C. For example, this code can't compile because Swift won't coerce Int to a String:

    let number: Int = 1
    let text: String = (number < 0) ? "" : number

For that code, in Swift 1.2 the error you would get was:

**Could not find an overload for < that accepts the supplied arguments**

Which is wacky, since "<" has nothing to do with the problem. I filed a Radar, and in Swift 2 the error is now much better:

**Result values in '?:' expression have mismatching types 'String' and 'Int'**

Which is exactly the problem and immediately clear. With that positive reinforcement, I and many others keep filing [silly error Radars](https://openradar.appspot.com/radar?id=6731369132589056). The error messages keep getting better, and my affection for Swift grows.

In this way, the march of progress has been both steady and relentless. Swift 1.1 brought improvements to the Cocoa APIs to make them more Swift-friendly, tweaked and improved the language, and made Xcode more reliable and performant. Swift 1.2 brought more of the same. Swift 2.0 brought yet more. A year later, the annoyances and remaining issues feel small compared to benefits we're getting, and it just keeps getting better.

## Think about the good times
Meanwhile, lot of smart people are still [holding off on using Swift](http://khanlou.com/2015/06/why-i-dont-write-swift/). I get the rationale &ndash; it was rough out of the gate, and learning a new language is a substantial undertaking. Swift is a bigger language than Objective-C or something like JavaScript, and it has a lot of depth. This is clear from the fact that other smart people are still [theorizing and dissecting](http://inessential.com/2015/08/11/swift_diary_11_objective-swift) their experience of learning Swift, working to understand how best to use this new tool.

Yet as much as it may seem like work, this investment will pay off quickly. Basic Swift is very easy to write, and learning something new never goes out of style.

So I have a proposal to all you Objective-C developers out there. Next Wednesday, when the Xcode 7 GM delivers Swift 2 in its full shininess and, likely, [open source](https://developer.apple.com/swift/blog/?id=29) goodness, jump in. Start something new. A side project, a game, a new view in your existing app - anything to get over the idea that you don't know Swift. Something to get you addicted. Know that the fear of something big and new, the fear of losing what you know, the fear of "doing it wrong" at first, is natural. You've just gotta shake it off. Shake it off.
