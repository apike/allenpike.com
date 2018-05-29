---
author: allen
date: "2018-05-29 16:10:10 -08:00"
layout: post
slug: "the-great-bug-hunt"
title: "The Great Bug Hunt"
summary: "A crashing Xbox proves hard to debug."
image: "/images/2018/campfire-square.jpg"
categories:
- Article
tags:
---

A fun thing about programming is that most days, you make progress. Maybe you fix some issues, maybe you add a feature, maybe you build towards something bigger. Your code moves ever forward.

Until it doesn’t.

On occasion, you will hit a Bug. Not a mundane bug, some trifle you can fix in an hour, or even a day. This is a true Bug. One that defies reason. One that evokes a “that’s not possible,” a “how could this even happen?”, or most dreadfully, a “could there be a bug in the compiler?” Hold on kids, we’re going hunting.

Recently, I reported a regression in an app we’re working on: it had become dreadfully slow on launch. QA had noticed the issue too, which is good, but nobody on the development team had seen it happen – which is bad. Scrolling performance was awful our CI release builds, but fine when the project was built via Xcode. The build settings seemed to be the same. Standard performance profiling turned up nothing obvious. We had ourselves a Bug.

Diagnosing and fixing a Bug requires patience, thoughtfulness, and above all a systematic, scientific mindset. We must eliminate variables one by one. Persistently forming hypotheses and testing each one is the name of the game. While the poor engineer assigned to hunt the Bug already knows this, it is our tradition to ease the pain by sharing the story of a legendary Bug Hunt.

Gather 'round, friends, for the Story of the Crashing Xbox.

<img src='/images/2018/campfire.jpg'>

You see, before Steamclock, my co-founder Nigel worked in the games industry. The games industry is very fun, when it’s fun. It’s also very not-fun when it’s not-fun. Games are particularly not-fun when you’re finishing them, so by law that’s when you will discover a Bug.

At that time, the team was working on what was to be one of the first games ever for a brand new game console, called the “Xbox”. As final testing ramped up, QA set up three pre-release Xboxen to run automated tests overnight. If the previous day’s build of the game was still running the next morning, it was a sign of a stable build.

Unfortunately, by morning one of the consoles had crashed. Crashes are never good, but this was a particularly bad crash: something running on the graphics card had brought the whole system down. Diagnosing a GPU crash meant hard mode: no debuggers, no stack traces, no "printf" debugging. All you could do is read the code and try things, like an animal.

And so began the Bug Hunt. Each day the lead engineer would comb through the evidence they had, develop a hypothesis, and work to eliminate possibilities. Each night, QA would get a “random” crash, without a clear cause. “That’s not possible.” “How could this even happen?” “Could there be a bug in the compiler?” All the greatest hits.

Naturally, the game ran perfectly well on the engineer’s machine – for multiple days, even. This was little consolation, as the deadline to print and ship the game loomed large.

Luckily, a pattern was soon detected – albeit a strange one. The game was only crashing overnight on *one* of the three Xboxes.  A search for differences ensued. It wasn’t the power cables. It wasn’t the controllers. It wasn’t the order they were burning the DVDs. Bring the Xbox back to your desk – no crash. Put it back – crash. It was something about the very specific setup QA was using.

Now, the process of elimination requires eliminating all variables. So eventually, in desperation, the engineer tried one more thing: he shuffled which console sat on what table. Boom.

It wasn’t **that Xbox** that crashed, it was any Xbox sitting on **that table** that crashed. In the middle of the night.

<img src='/images/2018/brains.jpg'>

Now, sometimes you need to do strange things for science, and this was one of those times. Stoically, the engineer set up a chair, gathered the requisite quantity of Red Bull, and the Bug Hunt became a Bug Watch. He vowed to watch the Xbox run automated testing on that cursed table until he saw the problem with his own two eyes.

The night passed by slowly, then quickly, and eventually dawn approached. The game still ran. Infuriatingly, it ran. The sun began to rise.

As he started to consider calling it for the night, something interesting finally happened: The Table was struck by a ray of light from the rising sun. Minute by minute, a sunbeam crept across the table towards the Xbox, its warm glow quietly enveloping that black blob of a console.

Which promptly crashed.

It *turns out*, early Xbox units had an issue where the graphics card could fault when the console reached a certain temperature. There was nothing you could do about it in software. The hardware issue was escalated, the game was cleared for release, and the Red Bull was swapped out for beer – or let's be honest, probably whisky. Science one, Bug zero.

---

Back at Steamclock, our scrolling performance Bug was more straightforward. After some process of elimination and some teamwork, yesterday we tracked it down to our crash reporting SDK. A recent change in how the Buddybuild SDK interacts with iOS means that Buddybuild’s Instant Replay feature now causes severe performance degradation, which is very visible when scrolling. Feature disabled, problem solved.

Next time you hit a Bug that defies all explanation, it's worth trying to channel the persistent and systematic nature of the Bug Hunters that came before you. Whether the Bug is in your code, a 3rd party library, or the thermal expansion of prototype hardware in the morning sun, the only solution is science. And maybe a little whisky.