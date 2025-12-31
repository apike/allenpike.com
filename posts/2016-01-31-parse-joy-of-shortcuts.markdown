---
author: allen
comments: true
date: "2016-01-31 18:00:00"
layout: post
slug: "parse-joy-of-shortcuts"
title: "The Joy of Shortcuts"
summary: "Parse teaches us about shipping."
featured: true
categories:
- Article
tags:
- choosing
- startups
---

Some time ago, we had a client come to us with a problem. Their app was a mess. It consisted of roughly 400 kilograms of copy-pasted Objective-C, written by a departed team member in some kind of over-caffeinated fever dream. There was no server logic, or anything else that would qualify as logical for that matter. It was simply a large, quivering mass of queries to Parse.

As a whiz-bang NoSQL Backend as a Service, Parse let people quickly build mobile apps. You just start coding, they said, and we'll worry about the rest. Your fever dream will only last so long, and any moment you spend worrying about server infrastructure is a moment you're not furiously typing square brackets or whatever else makes your app special. And you know what, it kinda worked.

## A rocket ship to somewhere

Like many other tools, Parse was a shortcut, a temporary simplification, an abstraction. Shortcuts let you move faster from idea to product, helping you focus more on shipping and less on diversions. Just like Interface Builder helps you rapidly prototype your UI and JavaScript frameworks help you get a web front-end up faster, Parse let you defer writing and maintaining a custom server backend until another day. Judicious use of shortcuts like these can make or break a fragile new venture.

As nasty as our client's mass of Parse and Objective-C was, their working prototype allowed them to raise a serious round of funding and collect a waiting list of eager customers. With that funding they hired us to write a new, high quality version of the app, and roll it out to their newfound fans. This is an age-old story in technology: a quick and dirty prototype is a stepping stone to something good. Hell, Objective-C itself started out as just a bunch of macros on top of C. Sometimes, shortcuts are the best first step.

Perhaps more importantly though, shortcuts help you fail cheaply. In 2014, the wonderful folks at Panic [built and tested an app](https://panic.com/blog/the-2015-panic-report/) to share and discover music. Instead of building a whole custom backend, they put it up on Parse. The app was beautiful, and it worked, but they rightly questioned its revenue potential. They deliberated, and in the end they decided to shelve the project. With that, whatever money they saved by building it on Parse was cash in the bank. When an idea doesn't pan out, every shortcut taken on the way there is a blessing.

## I have an idea for an app, please advise

The world of consumer software is a sea of uncertainty. Most app ideas simply don't work out. Still, when you're excited about your idea's potential to take over the world, it's easy to get sucked in to building out a sophisticated scaling infrastructure, loading up on administration and monitoring, and deeply documenting and unit testing your soon-to-be masterpiece.

Once that's done, though, once your miracle of modern software engineering wades out into the red ocean of social apps and flapping poultry, you're going to be fighting the same battle as everybody else. If you're lucky, you'll be clamouring for attention, iterating, and working your ass off looking for success, hoping you don't run out of time or money before you get there. If you're unlucky, [you'll hit a brick wall](http://mashable.com/2012/10/17/color-shuts-down/#N75AVQyT6qqu). Only if you get traction will the price of your shortcuts come due.

Of course, as useful as shortcuts can be for proving or disproving an app idea, they're much more dangerous when your project is more than an idea. While most apps will never get 1,000 active users, others are likely to get hundreds of thousands, if not millions. If your product is highly anticipated, is bringing a popular app to a new platform, or is packing the power of a big brand, you don't have the luxury of quiet experimentation. That's when the rigorous work of instrumenting, testing, and building for scalability needs to happen up front. It sounds scary, but [it's easier than it sounds](https://marco.org/2016/01/30/mjtsai-sunsetting-parse). The hard part is knowing when enough is enough.

## Moving on

Next January, [Parse is shutting down](http://blog.parse.com/announcements/moving-on/). The successful Parse apps will get moved to a custom backend like ours was, perhaps using [Parse's excellent open-source server and migration tool](http://blog.parse.com/announcements/introducing-parse-server-and-the-database-migration-tool/). The unsuccessful Parse apps will die. Hundreds of thousands of unsuccessful Parse apps will perish. Like links to long-dead Geocities pages, dead mobile apps that relied on Parse will linger in the App Stores for years, slowly accumulating one-star reviews.

<img src='/images/2016/parse-trust.jpg' width='100%'>

As much as Parse will try to get the word out that they're shutting down, many apps' owners don't even know that they're reliant on Parse. Parse's overly generous free plan made them popular with freelancers and consultants building quick app backends for their clients. Many of those clients don't know what Parse is, let alone that the little app they commissioned a couple years ago is a ticking time bomb.

While the death of these apps is sad, it's unclear who to blame. The majority of them would have died anyway, regardless of what they were built on. The lack of a monthly bill from their server provider kept them shuffling along for a while, but sooner or later, unmaintained software dies.

Our industry, the software industry, builds things that are so ephemeral, so fragile. Sometimes software grows, it changes, and it has a long life. Other times it doesn't, and it's swept away. Either way, though, these minor calamities help us sort out what kind of things we want to build. Do you want to build bold experiments, take shortcuts, and see where your customers take you? Or do you want to build solid foundations, sturdily engineered, and hunker down for the long haul?

Me, I'm still not entirely sure. Either way, I know one thing: I won't be building them on Parse.
