---
layout: post
author: allen
title: "Figma Slides is a Beautiful Disaster"
summary: "Some highlights and lowlights."
date: 2025-05-31T23:45:30.955Z
image: "/images/2025/figma-offline.jpg"
tags:
  - products
  - best
  - polish

---

I think of presentation slides as having 3 main jobs:

1. **Emphasize key points**, so people remember
2. **Break up complex concepts**, so people learn
3. **Entertain**, so people pay attention

This calls for slides that are mostly images or very short phrases. A minority of slides justify designing something to match the vibe or illustrate a point – a diagram, for example. This can mean going back and forth between Keynote and, say, Figma, but it’s worth the effort.

This year I’ve been spending a lot of time in Figma, so when I was recently asked to speak at an event I thought, “Why not try [Figma Slides](https://www.figma.com/slides/)?” Figma Slides launched a year back, and [graduated from beta in March](https://www.linkedin.com/posts/paigecostello_figma-slides-came-out-of-beta-today-30-activity-7308211241049591811-Z_-U/). I’ve used Keynote for almost 20 years now – it seemed like time for me to finally upgrade my presentation tool.

So I gave it a whirl.

Pretty quickly, I liked building slides right in Figma. The Grid view made it easy for me to structure my ideas. Features like Auto Layout and Components made building slides that adapt to different text and images a snap.

For example, a key point in my talk was that selecting a JavaScript framework can be overwhelming. It was easy to build a quick visual of this right in the deck.

<div class="centered">
<img src="/images/2025/figma-smash.jpg" alt="A Choose Your Fighter screen of JS frameworks." />
Components and Auto Layout made this 10x faster to build in Figma than Keynote.
</div>

Admittedly, Figma Slides is missing some Keynote features that I think of as pretty essential.

For example, Keynote has long had a toggle to “Autosize Text”, which will set an object’s font size to just big enough to fill its container. There’s no way to do this in Figma’s auto layout because Figma only wants to support layouts that CSS Grid can implement. That constraint makes sense when designing for the web, but shows how hard it is to expand a design tool to other domains.

Another odd omission is that you can’t easily create a slide where items (e.g. bullets, sections of a diagram) appear with each click. The closest you can do is to split them into different layers, add a “Fade” animation of 1 millisecond on each, then *reorder the animation order to match the order they appear on the slide* since it will default to the order the layers were created. 🥴

I’m not a fan of bullet-laden decks, but sometimes you just want to make 4 words appear one by one, okay?

Whining aside, building in Figma Slides got me excited. It was powerful, it was fun, and it gave me hope that Figma would successfully make the transition from single-product company about to be acquired by Adobe, to multi-product company [ready to IPO](https://www.cnbc.com/2025/04/15/figma-confidentially-files-for-ipo-a-year-after-ditching-adobe-deal.html).

Then I made a fatal mistake: I tried to actually give the presentation.


<div class="centered">
<img src="/images/2025/figma-offline.jpg" alt="Figma error -106" />
</div>

I’ve given enough talks that I know to do at least one rehearsal with representative conditions: on an external display, clicker in hand, cued by the presenter view. I know to make sure it works offline, save a backup copy of the deck, and so on.

It was during this dry run I noticed some bad omens:

1. You can “Save Local Copy” of the presentation, but that doesn’t allow you to present it locally.
2. Just because you have a presentation open and loaded, doesn’t mean you can present it. If you are offline when you actually click Present, it will barf.
3. Once you are presenting, you can click to “download” the presentation to be available offline – but be careful not to close the tab or it will undownload!
4. When you do click Present, you will not get a full-screen audience view, nor a [keyboard shortcut to swap which display the audience can see](https://support.apple.com/en-ca/guide/keynote/tanfde4a3e6d/mac). You just get a pop-up window you need to manually drag to the projector – hope it’s somewhere intuitive! – then maximize it. At a pro event you can do this with the AV crew, but at a meetup this is just visible to the audience.
5. Make sure you then move your mouse to the edge of the screen. Otherwise, it will stay there on top of your slides like it’s 1999.
6. Even beyond this, the functionality around managing Present and the Audience view is just a little… flaky?

<div class="centered">
<video style="max-width: 100%" src="/images/2025/figma-x.mp4" autoplay loop muted playsinline controls>
  Your viewer doesn't support HTML5 video, but you [can see the video here](/images/2025/figma-x.mp4).
</video>
Figma will decide when your presentation is over.
</div>

This all made me uneasy, so I practiced the flow more often than usual. I made sure I clicked the right things to make it work offline. Then, I went to go present.

At the venue, I immediately noticed something once the slides were up on their giant 40 foot display: I needed to click twice to advance each slide. Odd, but I’m an adult. I can click twice for each slide.

Unfortunately, halfway into my talk I noticed a much bigger problem.

The animations – which I had used only on my most complex slides, which needed to be explained in parts – weren’t advancing at all. Even if I clicked twice, the audience display would continue to show a blank slide.


<div class="centered">
<a href="https://www.youtube.com/watch?v=j7_o-YiwGwo">
<img src="/images/2025/clicker-fail.jpg" alt="A man looks in confusion at his own clicker." />
</a>
Looking at my clicker in desperation: the exact moment I realized that I’d been hoisted on my own petard.
</div>

After some exploratory clicking, I found that once all the builds on a blank slide had been triggered, it would then jump to the next slide. At that point, you could click back to show the fully built skipped slide.

So that’s what I did: on a slide with 7 builds, I would dutifully click 14 times to get Figma through to the next slide, then then click back, and attempt to explain all seven parts at once.

I stumbled through. The audience was gracious – thankfully it was only 100 people and they were friendly. But it stung a little.

A silver lining was that the core point of my talk was that [boring technology is underrated](https://boringtechnology.club/). Watching me struggle with Figma Slides helped prove the point. **Here lies Allen, murdered by not-boring technology**.

While I was able to reproduce the animation bug the next day, I haven’t been able to since restarting Figma. Their forums have stories of [other](https://forum.figma.com/ask-the-community-7/fixed-figma-slides-show-smart-animate-transition-only-in-presenter-view-and-not-in-audience-view-39081?utm_source=chatgpt.com) [similar](https://forum.figma.com/ask-the-community-7/fixed-figma-slides-show-smart-animate-transition-only-in-presenter-view-and-not-in-audience-view-39081?utm_source=chatgpt.com) [bugs](https://forum.figma.com/ask-the-community-7/figma-slides-with-multiple-videos-in-present-mode-have-to-click-arrow-key-loads-before-next-slide-28477?utm_source=chatgpt.com), none quite the same. So maybe it’s fixed.

Even if this specific bug is fixed, though, I get the impression that Figma doesn’t treat presenting Slides as mission-critical. A team that uses Figma Slides at meetups or conferences wouldn’t let clicking Present offline just vomit “Error -106”.

While Keynote is old, and pasting things in from other design tools feels janky, the OG still benefits from Apple institutionally [giving a shit](https://allenpike.com/2022/giving-a-shit) about giving a presentation to an audience. You can tell they feel it should be bulletproof.

So, in the end, I learned the lesson I was trying to teach. Boring technology is good, actually. 

Here’s to Keynote: it works. 🍻

----

*Update*: A PM at Figma [has graciously taken this feedback to the team](https://news.ycombinator.com/item?id=44152221), and says they do see this flow as needing to be bulletproof. That’s great to hear, since there's a lot to like about Figma Slides. I look forward to a world where Figma’s new products graduate from fascinating to boringly reliable. 🌟
