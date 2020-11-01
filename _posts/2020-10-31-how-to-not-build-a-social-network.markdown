---
author: allen
date: "2020-10-31 8:00:00 -08:00"
layout: post
title: "How to Not Build a Social Network"
summary: "I attempt to reason with raw ambition."
image: "/images/2020/mike-holmes-sonic.jpg"
tags:
categories:
- Article

---

I hear that you’d like to build a new social network.

Seems like a good idea, right? Today’s social media is a tire fire, the companies that dominate it rake in billions monthly, and you have a novel concept for a social app that might make people feel less blue, while making you a lot of green.

So where do we start? Well, at the moment, the top result on Google for “how to build a social network” is [an Inc. article so bad that it brings me physical pain to read](https://www.inc.com/john-rampton/how-to-create-powerful-social-network-platform-in-.html):

> The overall vision of your website is crucial. Macro scan that will break things down into categories such as user functions, administrative functions, and advertising is a must thing to do.

Macro scan? A must thing? Website?

> Focus on the core values of your social media platform and build it the best you can. Success is inevitable if you plan everything the right wat. 

Wat indeed.

I regret to inform you that success is extremely **not** inevitable,  no matter how much you plan in advance. If you start building a social media app with any sort of “my vision’s strength will inherently lead me to success” mindset, your aspiring startup is going to get impaled on a sharp and very expensive spike.

Over the last ten years I’ve worked on almost a dozen social networking apps. I’ve worked on chat apps, sharing apps, and dating apps. I’ve seen product-market misfits, product launch faceplants, and strong teams that flirted with traction but just couldn’t get the numbers required to find a path to profitability.

Given this experience, I’d like to share a guide of my own. A resource for future generations of social media hopefuls, informed by my years of walking this path. What is the best way to build a social network?

**1. Don’t build a social network.**

That’s it. That’s the article.

Good night everybody!

------

This post is now over.

When I say “Don’t build a social network” it’s not some kind of “hack” where I claim the *real way* to build a successful social network is to not *think of it* as a social network.

Trust me, half the social networks I’ve worked on had executives insisting that they were not in fact social networks. “Just because our app revolves around people posting things, following one another, and viewing the aggregated content in a feed doesn’t make it a social network”. 🙃

I’m not saying don’t *call it* a social network, I’m saying it is a bad idea to try and build a new platform that revolves around consumers posting content and viewing one another’s content, and you should not do that.

Thanks for tuning in – please like and subscribe, and remember to smash that bell!

------

You’re still here.

Okay. I’ll make you a deal.

As long you promise not to use this information to actually go and try to build a social network, I’ll share a couple of the things that I’ve learned about why it’s incredibly hard to do. The goal is to convince you not to do it.

Although it can take a lot of engineering work to meet the “table stakes” of user expectations in this space, the truth is that it’s not entirely difficult to *build* a social network. The truly difficult part – fiendishly difficult, really – is successfully launching one, and then turning it into a profitable business.

## Trying to iterate a community
Gall’s Law tells us that “a complex system that works is invariably found to have evolved from a simple system that worked.” This generally holds true in the world of software. So much so, that it broadly outlines the challenges of building software products: understanding what parts need to be complex, keeping the rest simple, and evolving the key parts effectively enough that they get Good before you run out of time or money.

Successful software businesses are generally built this way: you make a thing that seems like it’d be useful, then you have some people try it. Based on what you learn from those people, you make the software better, in a repeating loop until the software is Good. Good, in this context, means that your app retains users well enough that you make more money from a customer than it costs to get that customer.

One awesome thing about designing and developing tools – that is, apps that solve a particular problem – is that you can usefully test most tools using a pretty small number of users. If you can find 10 engaged customers that are a reasonable representation of the target market for your tool, you can often learn a lot about how you should be improving your thing, or determine if you need a change of plans entirely.

As a rule, social software doesn’t work that way. If you cloned Facebook at full detail and fidelity – which would be a staggering amount of work at this point – plus made it meaningfully better in a way that you think users would significantly prefer over Facebook, you couldn’t just onboard 10 representative people and determine if your thing was good. Your possibly-awesome codebase with no users would just be a bizarrely complicated ghost town.

*Search for a friend it says, no results. Recommended groups, none. Top photos from your network, nothing. Trends, zilch. What an overwhelming waste of time. What am I supposed to do with this? Invite my friends? Not likely.*

Part of this is the well-known “network effect” where a social platform gets more valuable when there are a ton of people already on it. But there is also a subtle, related issue – a kind of “noise floor” where for a social product, it’s hard to get any signal at all from your users when there aren’t a lot of them.

Consider that even *if* your theoretically-better-than-Facebook platform started to get adoption in some niche, who’s to say those are the users that fit the product best? The same app in 10 parallel universes could have highly varying levels of success depending on who their early users happened to be, and how that effected the community norms, product evolution, and so on.

So sure, you might have this very nice app, only for it to be initially colonized by rabid fans of [badly drawn Sonic cartoons](https://dumbrunningsonic.tumblr.com/). Next thing you know, all your user onboarding algorithms “learn” that new users always want to be recommended looping gifs of a MS Paint style Sega mascot attempting to locomote poorly.

While you’re now excited to finally be getting some user data to start validation, and you appreciate users’ feedback that they wish the app would “run fast,” your team is concerned that they may be hitting a local maxima. While you’re happy to tell your investors about your recent uptick in active users, your growth team is finding that the difficulty of acquiring and retaining new users who are *not* Sonic fans has actually increased, entrenching the existing userbase. Given that you’d still need to scale your network to the hundreds of millions of users to build an independent advertising business that can compete with Facebook and Google, your investors start pushing you to find an acquirer.

FOR SALE: One social network; better than Facebook (we think); as is where is; currently infested with hedgehogs. Will consider all offers.

<p style="text-align: center"><video style="width: 250px;" autoplay loop muted playsinline src="/images/2020/mike-holmes-sonic.mp4"></video></p>

## Shooting the moon
There are countless things that can doom a social networking startup, but most seem to follow a common trajectory:

1. Raise investment around an interesting concept and the vision of a thriving user community.
2. Launch with engagement and retention rates so low that the system needs to be constantly “fed” with expensive new user acquisition to keep learning and iterating the product, after which *maybe* you see some user growth but it levels off well below the enormous size that could make an ad-driven platform profitable.
3. The product team struggles to get traction fast enough to justify the high burn rate, and investors lose interest and cut off the venture.

To be fair, the arc of most tech startups follow a variation of the above. The issue with social networks specifically is that the number of contributing users necessary to have a compelling product and the number of active users needed to ever turn a profit are just far higher than for most software. This makes them expensive to iterate and experiment on, *and* necessitates a smash hit in order to be sustainable. All startups are hard, but this combo makes social media startups exquisitely difficult.

As it happens, realizing this points us to a potential formula for building a social app in a less risky way: develop a platform that is very compelling even with a small initial group of users. If you can make something so useful that you can get a small group to pay for it directly, rather than needing to scale to the point that you can profitably sell ads, you can be sustainable and then grow organically. This is perhaps then less of a social network, and moreso a social tool.

You can see this general approach in certain non-traditional social platforms like Pinboard, most modern dating apps, and even the subscription-required social spaces for fans that have proliferated due to Patreon and its ilk. If you build something that users will pay for directly, a quirky but rabid fanbase becomes be an asset.

Of course, a paid social platform for Sanic gifs has less potential upside than something that tries to dethrone Facebook or Twitter. So, just as people buy lottery tickets, people will still try and build new social networks.

And, inevitably, they will keep trying to hire our team at Steamclock to help them do so. And I will keep trying to convince them not to build a social network at all, partially with arguments like I’ve made here and partially by outlining our ever-growing list of special requirements we have for social app projects.

And – if history is any indicator – my efforts at rebuffing them will endear them to us, and convince them that they want our team of battle-worn app developers who have built who knows how many failed social networks to bring our experience to their project, giving it a better chance at avoiding the pitfalls of their predecessors. And they will probably fail too.

This is my fate. But it doesn’t have to be yours. I’ve said my piece, I’ve made my case.

Don’t build a social network.

That said, it would be great if somebody *actually did* build a better social network. The existing ones are kind of trash...