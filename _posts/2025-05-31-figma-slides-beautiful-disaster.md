---
layout: post
author: allen
title: "Figma Slides is a Beautiful Disaster"
summary: "It was the (best|worst) of times."
date: 2025-05-31T23:45:30.955Z
featured: false
image: "/images/2025/figma-smash.jpg"
tags:
  - llm
---

I think of presentation slides as having 3 main jobs:

1. Emphasize key points, so people remember
2. Break up complex concepts, so people learn
3. Entertain, so people pay attention

This calls for slides that are mostly images or very short phrases. Often a couple slides justify something a bit more complex to illustrate a point. This sometimes means going back and forth between Keynote and, say, Figma, but it’s worth the effort.

This year I’ve been spending a lot of time in Figma, so when I was asked to speak at Vancouver's JavaScript meetup I thought, “Why not try [Figma Slides](https://www.figma.com/slides/)?” Figma Slides launched a year back, and [graduated from beta in March](https://www.linkedin.com/posts/paigecostello_figma-slides-came-out-of-beta-today-30-activity-7308211241049591811-Z_-U/). I’ve used Keynote for almost 20 years now – it seems like time for me to finally upgrade my presentation tool.

So I gave it a whirl.

Pretty quickly, I appreciated building slides right in Figma. The Grid view made it easy for me to structure my ideas. Features like Auto Layout and Components made building adapted to different kinds of content a snap.

For example, a key point in my talk was that selecting a JavaScript framework can be overwhelming. It was easy to build a quick visual of this right in the deck.

<div class="centered">
<img src="/images/2025/figma-smash.jpg" alt="A Choose Your Fighter screen of JS frameworks." />
Components and Auto Layout made this 10x faster to build in Figma than Keynote.
</div>

Admittedly, Figma Slides is missing some Keynote features that I think of as pretty essential.

For example, Keynote has long had an use option to “Autosize Text”, which will set an object’s font size to just big enough to fill its container. There’s no way to do this in Figma’s auto layout because Figma only wants to support layouts that CSS Grid can implement. That constraint makes sense when designing for the web, but shows how hard it is to expand a design tool to other domains.

Another odd omission is that you can’t easily create a slide where items (e.g. bullets, sections of a diagram) appear with each click. The closest you can do is to split them into different layers, add a “Fade” animation of 1 millisecond on each, then *reorder the animation order to match the order they’re displayed on the slide* since it will default to the order the layers were created.

I’m not a fan of bullet-laden decks, but sometimes you just want to make 4 words appear one by one, okay?

Whining aside, building in Figma Slides got me excited. It was powerful, it was fun, and it gave me hope that Figma would successfully make the transition from single-product company about to be acquired by Adobe to multi-product company [ready to IPO](https://www.cnbc.com/2025/04/15/figma-confidentially-files-for-ipo-a-year-after-ditching-adobe-deal.html).

Then I made a fatal mistake: I tried to actually give the presentation.


<div class="centered">
<img src="/images/2025/figma-offline.jpg" alt="Figma error -106" />
</div>

I’ve given enough talks that I know to do at least one rehearsal with representative conditions: on an external display, clicker in hand, cued by the presenter view. I know to make sure it works offline, save a backup copy of the deck, and so on.

It was during this dry run I noticed some bad omens:

1. You can “Save Local Copy” of the presentation, but that does not allow you to present it locally – that’s something else.
2. Just because you have a presentation open and loaded, does not mean you can present it. If you are offline when you actually click Present, it will barf (see above).
3. Once you are presenting, you can click to “download” the presentation to be available offline – but be careful not to close the tab or it will undownload!
4. When you do click Present, you will not get a full-screen audience view, nor a [keyboard shortcut to swap which display the audience can see](https://support.apple.com/en-ca/guide/keynote/tanfde4a3e6d/mac). You will instead get a pop-up window you need to drag over to the projector – hope it’s somewhere intuitive once you plug in! – then maximize it. At a pro event you can do this with the AV crew before you’re live, but at a meetup this is just visible to the audience.
5. Make sure you then move your mouse to the edge of the screen, otherwise it will stay there on top of your slides like it’s 1999.
6. Even beyond this, the functionality around managing Present and the Audience view is just a little… flaky?

<div class="centered">
<video src="/images/2025/figma-x.mp4" autoplay loop muted playsinline>
  Your browser doesn't support HTML5 video.
</video>
Just an example of the little quirks and features of Figma Slides.
</div>

This all made me uneasy, so I practiced the flow more often than usual with an external monitor. I made sure I clicked the right things to make it work offline. Then, I went to go present.

At the venue, I immediatley noticed something odd once the slides were up on their giant 40 foot display: I needed to click twice to advance each slide. Problems at T-minus 60 seconds are unsettling, but I’m an adult. I can click twice for each slide.

Unfortunately, halfway into my talk I noticed a bigger problem.

The animations – which I had used nly on my most complex slides which needed to be explained in parts – just weren’t advancing. Even if I clicked twice, the audience display would still just show a blank slide.


<div class="centered">
<a href="https://www.youtube.com/watch?v=j7_o-YiwGwo">
<img src="/images/2025/clicker-fail.jpg" alt="A man looks in confusion at his own clicker." />
</a>
The exact moment I realize that I’d been hoisted on my own petard.
</div>

After some exploratory clicking, I found that once all the builds on the blank slide had been triggered, it would eventually jump to the next slide. At that point, you could click back to show all the completed animations of the skipped slide. So that’s what I did: if a slide with 7 builds came up, I would click 14 times to get Figma to the next slide, and then click back and attempt to explain all seven parts at once.

I stumbled through. The audience was gracious – thankfully it was only 100 people and they were friendly. But it stung a little.

One silver lining was that the core point of my talk was that boring technology is underrated. Watching me struggle with Figma Slides helped prove the point. **Here lies Allen, murdered by not-boring technology**.

While I was able to reproduce the animations bug the next day, I haven’t been able to since restarting Figma. Their forums have stories of [other](https://forum.figma.com/ask-the-community-7/fixed-figma-slides-show-smart-animate-transition-only-in-presenter-view-and-not-in-audience-view-39081?utm_source=chatgpt.com) [similar](https://forum.figma.com/ask-the-community-7/fixed-figma-slides-show-smart-animate-transition-only-in-presenter-view-and-not-in-audience-view-39081?utm_source=chatgpt.com) [bugs](https://forum.figma.com/ask-the-community-7/figma-slides-with-multiple-videos-in-present-mode-have-to-click-arrow-key-loads-before-next-slide-28477?utm_source=chatgpt.com), none quite the same. But maybe it’s fixed.

Even if this specific bug is fixed, though, I get the strong impression that Figma doesn’t treat presenting Slides as mission-critical. A team that uses Figma Slides at meetups or conferences wouldn’t let clicking Present offline just vomit “Error -106”.

While Keynote is old, and pasting things in from other design tools feels janky, the app still benefits from Apple institutionally [giving a shit](https://allenpike.com/2022/giving-a-shit) about giving a presentation to an audience. You can tell they feel it should be bulletproof.

So, in the end, I learned the lesson I was trying to teach. Boring technology is good, actually. 

Here’s to Keynote: it works. And they give a shit. 🍻
