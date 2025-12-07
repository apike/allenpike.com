---
layout: post
author: allen
title: "Why is ChatGPT for Mac So Good?"
summary: "Claude, Copilot, and making a good desktop app."
date: 2025-11-30T23:45:30.955Z
featured: false
image: "/images/2025/claude-popups.jpg"
tags:
  - llm
  - products

---

This year, even as Anthropic, Google, and others have challenged OpenAI’s model performance crown, ChatGPT’s lead as an end-user product has only solidified. On the Dithering podcast [last week \(paywalled\)](https://dithering.passport.online/member/episode/ai-in-the-ai-app?code=ViRWjeRadfXzawELuzbSYB&guid=https%3A%2F%2Fdithering.passport.online%2Fmember%2Fepisode%2Fai-in-the-ai-app), Ben Thompson called out an aspect of why this is:

> I need someone to write the definitive article on why the ChatGPT Mac app is so good, and why everyone else is in dereliction of duty in doing these.
> 
> Gemini 3 is reportedly coming this week. […] And I’m looking forward to it. I expect it to be good. And it’s just going to have to be so astronomically good for me to not use ChatGPT, precisely because the [Mac] app is so useful.

A model is only as useful as its applications. As AI becomes multimodal and gets better at using tools, these interfaces are getting even more important – to the point that models’ [apps now matter more than benchmarks](https://www.macstories.net/notes/the-ai-app-experience-matters-more-than-benchmarks-now/). And while every major LLM has a mobile app, only three have a Mac app: Copilot, Claude, and ChatGPT.

And of those, only one is truly good.

Hold on – we’re diving in.

## The Apps

ChatGPT for Mac is a nice app. It’s well-maintained, stable, performant, and pleasant to use. Over the last year and a half, OpenAI has brought most new ChatGPT features to the Mac app on day one, and even launched new capabilities exclusively for Mac, like [Work with Apps](https://help.openai.com/en/articles/10119604-work-with-apps-on-macos?utm_source=chatgpt.com).

The app does a good job of following the platform conventions on Mac. That means buttons, text fields, and menus behave as they do in other Mac apps. While ChatGPT is imperfect on both  Mac and web, both platforms have the finish you would expect from a daily-use tool.

<div class="centered">
<img src="/images/2025/chatgpt-mac-web.jpg" />
ChatGPT for Mac (left) vs. ChatGPT on the web (right).
</div>

Meanwhile, the Mac apps for Claude and Microsoft’s “365 Copilot” are simply websites residing in an app’s shell, like a digital hermit crab. 365 Copilot is effectively a build of the Edge browser that only loads [m365.cloud.microsoft](https://m365.cloud.microsoft), while Claude loads their web UI using the ubiquitous Electron framework.

<div class="centered">
<img src="/images/2025/claude-popups.jpg" />
Claude.app: a website with window controls.
</div>

While the Claude web app works pretty well, it only takes a few minutes of clicking around Claude for Mac to find various app-specific UI bugs and bits of missing polish.

As just one example: Mac apps can typically be moved by dragging the top corner of the window. Claude supports this too, but not when you have a chat open?

<div class="centered">
<video style="max-width: 100%" src="/images/2025/claude-drag-high.mp4" autoplay loop muted playsinline controls>
  Your viewer doesn't support HTML5 video, but you [can see the video here](/images/2025/claude-drag-high.mp4).
</video>
A classic case of `-webkit-app-region: no-drag` over-application.
</div>

Unsurprisingly, the Microsoft 365 Copilot app is even worse, and Gemini doesn’t have a Mac app at all. The desktop has not been a focus for the major AI labs thus far.

The oddball here is the plain “Copilot” app, which is of course unrelated to the “365 Copilot” app other than sharing an icon, corporate parent, and name. Copilot for Mac is, it seems, a pared-down native Mac reproduction of the ChatGPT app with a bit of Microsoft UI flavor. It’s actually weirdly nice, although it’s missing enough features that it feels clearly behind ChatGPT and Claude.

Fascinatingly, the Copilot app doesn’t allow you to sign in with a work account. For work – the main purpose of a desktop app – you must use the janky 365 Copilot web app. While this dichotomy might be confusing, it’s a perfect illustration of the longstanding tension that’s made cross-platform the norm for business apps.

## The Strategies

Cross-platform apps like Claude’s are, of course, cheaper to develop than native ones like OpenAI’s. But cost isn’t the most important tradeoff when these very well-capitalized companies decide whether to make their apps cross-platform. The biggest tradeoff is [between polished UX and coordinated featurefulness](https://allenpike.com/2021/gravity-of-cross-platform-apps).

<div class="centered">
<a href="/2021/gravity-of-cross-platform-apps"><img src="/images/2021/polished-coordinated-chart.png" style="max-width:420px"></a><br>
ChatGPT has focused more on the vertical axis, Claude more on the horizontal.
</div>

It’s easier to get a polished app with native APIs, but at a certain scale separate apps make it hard to rapidly iterate a complex enterprise product while keeping it in sync on each platform, while also meeting your service and customer obligations. So for a consumer-facing app like ChatGPT or the no-modifier Copilot, it’s easier to go native. For companies that are, at their core, selling to enterprises, you get Electron apps.

This is not as bad as it sounds, because despite popular sentiment, Electron apps *can* be good apps. Sure, by default they’re janky web app shells. But with great care and attention and diligence and craft, they can be polished almost as well as native apps.

While they might not feel native, Electron apps like Superhuman, Figma, Cursor, and Linear are delightful[^1]. These apps are tools for work, and their teams invest in fixing rough edges, UI glitches, and squirrelly behaviour that might break users’ flow.

Meanwhile, ChatGPT, despite being built on native tech, has its share of problems. These range from the small (the Personalization settings pane currently has two back-arrows instead of one) to the hilarious.

<div class="centered">
<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/DRtOyj3jNOR/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px auto; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/reel/DRtOyj3jNOR/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/reel/DRtOyj3jNOR/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Allen Pike (@allenjpike)</a></p></div></blockquote>
<script async src="//www.instagram.com/embed.js"></script>
</div>

At the end of the day, the ChatGPT app for Mac is good because they care. They have a product-led growth model that justifies spending the resources, an organizational priority on user experience, and a team that can execute on that mission.

Meanwhile, Anthropic’s been going hard on enterprise sales, so it’s not shocking they’ve neglected their desktop experience. It’s unlikely they have a big team of developers on the app who don’t care about these issues – they probably haven’t had many folks working on it at all.

Still, I wouldn’t count out the possibility of a change in course here. While mobile is king, desktop is still where work happens. While OpenAI has [acquired Sky](https://techcrunch.com/2025/10/23/openai-buys-sky-an-ai-interface-for-mac/) to double down on desktop, Google has long been all-in on the browser. That leaves Anthropic as the challenger on desktop, with their latest models begging to be paired with well-crafted apps.

While Anthropic could surprise everybody by dropping a native Mac app, I would bet against that. There’s a lot of headroom available to them just by investing in doing Electron well, mixing in bits of native code where needed, and hill-climbing from “website in shell” to “great app that happens to use web technology”.

Just as ChatGPT’s unexpected success woke OpenAI to the opportunities of being more product-centric, the breakout hit of Claude Code might warm Anthropic to the importance of investing in delightful tools. Last year they [brought on Mike Krieger as CPO](https://www.anthropic.com/news/mike-krieger-joins-anthropic), who certainly seems like he could rally a team in this direction given the chance.

Until then, ChatGPT will reign supreme.

*Update: Although I think ChatGPT for Mac has problems but is useful, [not everybody agrees](https://allenpike.com/2025/why-is-the-chatgpt-app-bad)!*

[^1]: We’ve done some Electron work at Forestwalk, and it was surprising how easy it was to cause classic Electron bugs like the whole app being a white square, the top navigation scrolling out of view, and the like. It was even more surprising how tractable it is to just refuse to tolerate these common issues, and put in the time to fix them one by one. It can be done.
