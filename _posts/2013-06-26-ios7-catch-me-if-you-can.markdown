---
author: allen
comments: true
date: 2013-06-26 09:11:16
layout: post
slug: ios7-catch-me-if-you-can
title: "iOS 7: Catch me if you can"
categories:
- Article
- Best Of
tags:
- Apple
- iOS
- UI Design
- Web vs Native
---

<img src="/images/ios7-blur.jpg" class="retinize"/>
In 2007, Apple released a mobile OS that was a generation ahead. It centered around hardware-accelerated touch animations, tracking your fingers so fast that it created an entirely new type of experience. Rich sprites slid in and out with wonderful fluidity. The world was Apple's oyster, as only the best hardware and most efficient software could produce such an experience.

Since then, ever-faster mobile devices have evened the playing field amongst the mobile platforms. Web apps, cheap hardware, and Phonegap have used Moore's law and elbow grease to narrow the gap. For the most part, this was inevitable.

It's now 2013, and the effects that the iPhone popularized have been commoditized. Native iOS apps still have the best implementation of them, but performantly sliding around rich textures in response to touch inputs is no longer impossible in HTML and JavaScript. Moore's rising tide has lifted up the cheap phones and the web renderers. They can can now provide a decent version of the fundamental experience, hurting the case for native iOS apps.

At the core, iOS 6's experience is still just a refinement of what was possible in 2007, running on a lot more transistors than we had then.

### Everything's a blur

Let's say we worked at Apple, and were challenged with designing an experience that was impossible in 2007. Something that would be entirely impossible with web technology. What would our futuristic UI look like?

It would have compositing effects that need serious GPU horsepower. Blur is a beautiful but computationally intensive operation, so we'd use it liberally. To push it further, the blurred areas will need to update during scrolling and update at 60 fps.

We'd add more 3D effects, stacking and layering content where we can. If we felt really crazy, we'd make simple things like home screens and modal dialogs subtly shift in 3D, real-time, in response to gyroscope input. (To a mobile web developer that sounds like a troll feature request.)

Of course, performance-intensive styles are just half the formula. One of the hardest things on the mobile web is to update the UI in response to tracking a touch input at 60 fps. So, let's add scrubbable view controller back animations, and make it easy for developers to do so too. We'll emphasize complex transitions that reshape instead of replacing content, and render live previews of things that were static in the past.

Finally, let's add an entire physics engine to the UI toolkit. We'll add constraints and behaviours that mimic real objects in real time, and ensure it all runs at high enough speed so it can respond to touch inputs.

In short, we'd replace 2007's sliding textures with motion, dimension, and physics.

### Try copying this, assholes

iOS 7 was clearly designed to show off what's possible in 2013. As a side effect, they've embraced conventions that will be hard to emulate with commodity hardware or web tech.

The hairlines and flourescent colours are trendy and easy to copy. On the other hand, bringing to life these blurs, animations, and dynamics with HTML and JavaScript isn't yet possible. You need the latest hardware and the most efficient software to make something feel like this. Further, you need thoughtful APIs so developers can take it to its full potential. In short, the browser vendors have their work cut out for them.

Even with tuned native software, the iPhone 4's A4 chip can't handle the most interesting aspects of iOS 7. The 3D, the blur, the compositing - all of them are disabled or degraded on the A4. iOS 7 is designed and developed for the A5, and will truly shine on the A7.

By hanging up their rich textures in favour of rich effects, Apple has gone well beyond a coat of paint. If people fall in love with this new, beautifully living aesthetic, there will be an argument for building native apps for years yet.