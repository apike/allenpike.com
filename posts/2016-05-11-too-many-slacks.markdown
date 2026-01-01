---
author: allen
comments: true
date: "2016-05-11 18:00:00"
layout: post
slug: "too-many-slacks"
title: "Too Many Slacks"
summary: "Slack can't handle my scale."
categories:
- Article
---

<img src='/images/2016/slack-signin.png' style='width:310px'>

We all know the frustration. You're invited to collaborate with a new team or group. You're excited to get going, your mind filling with possibilities, when **thwack**. You're hit with a signup form. Not only are you forced to create a new account, you now need to keep track of one more set of credentials, forcing you to fight to stay logged in to one more thing across your array of devices.

Thankfully, Slack just introduced a new feature called "[Sign in with Slack](https://medium.com/slack-developer-blog/introducing-sign-in-with-slack-290949e1c3f5#.8posr3xwj)". Similarly to Facebook or Twitter authentication, this new feature lets you simply log in to the apps you use for work using your Slack login. You know, your one Slack login. The single one you have, since having more than one Slack login would make this really confusing.

## Welcome to Slack!

Since October 2014, I have been invited to 19 Slack teams. In addition to the main Steamclock Slack account I use day to day, I have Slack accounts for 5 conferences, 5 developer groups, and 9 clients. Due to the nature of my work and the ever-growing popularity of Slack, I'm now invited to a new Slack on a monthly basis.

For each account, I have a username, a password, an avatar, an unread badge, and a helpful red dot telling me what features are new in Slack. Each team takes up time, attention, and a couple hundred megabytes of memory.

As such, every time I set up an iPhone, iPad, or Mac, I need to evaluate how many Slacks it's worth logging in to. 5? 10? Certainly not 19. Over time I've gone inactive in more and more social Slacks, which is a shame because some of them I really enjoy, but it's just too much to juggle.

So Slack is a really powerful tool for those of us who collaborate across a lot of teams, and it's well known that they [have a problem with account management](https://medium.com/swlh/the-surprisingly-simple-thing-slack-got-wrong-b16f489395e). More interesting to me is why they let it get this bad, and whether or not they're going to fix it.

## July7YardSale.slack.com

Architecturally, every Slack team is separate. It is on an entirely separate subdomain, and it shares no data with any other Slack team. This is wonderful &ndash; for Slack. This separation means each team is its own scalability island, and it can be put on any server, running any version of the software, in any A/B test or custom group, and can completely ignore the now-staggering number of other Slack teams. Siloed clusters of accounts are much easier to scale than a giant interconnected graph, and when you're growing as crazy fast as Slack has been, scalability is good.

An even bigger of advantage of Slack teams being siloed is that enterprise customers have very specific expectations around their data. These customers are willing to pay a lot to control very specific things about how authentication and data storage behaves for their users. If a Very Important Enterprise Customer needs some crazy security feature, or even (god forbid) wants an on-premise install (gasps of terror from the audience, foreboding sound effect plays) then their team can easily be sliced off and put onto a separate server. Meanwhile, a different enterprise customer may require that their users use two-factor auth, or that their usernames must fit a certain format, or that users are immediately logged out if they blaspheme [Ha'atu the All-Seeing](http://cube-drone.com/comics/c/vr-setup-instructions).

In this vein, the folks at Slack have been hard at work building out an array of authentication and account features for enterprises. In fact, Slack already supports single sign-on &ndash; just not the kind that we want. "Plus" accounts can now [use SAML](https://get.slack.help/hc/en-us/articles/203772216-Using-single-sign-on-with-Slack) to enable signing into Slack at the same time as an enterprise's other web apps using a  set of credentials that the company controls.

Slack is also getting ready to launch a set of [long-anticipated enterprise features](http://blogs.wsj.com/cio/2015/12/09/slack-expects-enterprise-version-to-go-to-market-in-early-2016/) centered around security and administration. While you and I may not get out of bed in the morning craving some hot fresh data retention and compliance policies, Slack's pricing page has pencilled in $32/user/mo as the price for these highly-desired features. Considering that companies need to get quite large before they even know these buzzwords let alone want them, these new customers should be incredibly profitable for Slack.

Meanwhile, we freeloaders are whinging about having to juggle our 27 free Slack teams.

## Thanks for your feedback

So, we know why the problem exists, and why it hasn't been fixed yet, but the key question remains: are they going to fix it anytime soon? Do we just wait out the chaos, or do we start evaluating alternatives, even just for the conferences-and-networking use cases that are exacerbating this Slacksplosion?

Clearly, fixing something like authentication retroactively is a ton of work. A change like this requires rearchitecture, serious scaling preparation, and a heavy dose of migration. It took years from Basecamp's launch until they [finally launched a system-wide account system](https://signalvnoise.com/posts/2031-preview-the-latest-on-37signals-accounts), and at that point they still hadn't reached the scale that Slack already enjoys after less than three years.

That being said, the folks who work at Slack give a shit about this kind of UX problem, even if those of us on Free and Standard teams don't generate as much growth juice as a the Enterprise whales do. They're aware of the pain, as we can see in the toil of the SlackHQ Twitter account.

> Oh and setting up 2-factor auth EIGHT TIMES as well. Seriously @SlackHQ how about some consolidation here?

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr"><a href="https://twitter.com/kronda">@kronda</a> Sorry! 😞 Accounts are all kept separate for now, but we hope to improve the experience in future (and hoping never to do it again)</p>&mdash; Slack (@SlackHQ) <a href="https://twitter.com/SlackHQ/status/581596359389786112">March 27, 2015</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>


While feeling bad about it was a good start, by this March their tone [had become more guarded](https://twitter.com/SlackHQ/status/711003464344727552):

> Hey @SlackHQ, how’s it coming with single-sign-on for many accounts?

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr"><a href="https://twitter.com/designatednerd">@designatednerd</a> <a href="https://twitter.com/corvino">@corvino</a> We&#39;ve no near-term plans yet but we understand the usefulness! It&#39;s something to think about <span style='font-size: 28px; position: relative; top: 3px'>🍮</span></p>&mdash; Slack (@SlackHQ) <a href="https://twitter.com/SlackHQ/status/711003464344727552">March 19, 2016</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

While we can all agree on the creamy appeal of CUSTARD (U+1F36E), the phrase "no near-term plans" sounds pretty clear. The juggling will continue until morale improves.

## And yet...

Even if unified sign-in is a dream for now, there are a few intermediate things Slack could do to make working across teams less painful. At [Slack's roadmap event in March](http://techcrunch.com/2016/03/01/slack-roadmap/), they announced that they're working on a feature called Shared Channels. The idea here is that teams will be able to share a channel between them, a more native and capable version of [Slackline](http://slackline.io). This would be an A+ slam dunk for me, since this would eliminate the need for me to be in 8 of the client Slack teams I'm part of.

Although it's likely not part of the initial vision for their Shared Channels feature, an evolution of it could further reduce the unnecessary proliferation of social and conference Slack teams, since most of them fundamentally only need one channel. Occasionally a social group or conference can justify a variety of channels (the XOXO Slack did a surprisingly good job of this) but most of the time, what people creating a social Slack team need is a single channel to chat with an ad-hoc group. In essence, an IRC channel for the 21st century.

I for one would be happy to pay Slack on top of what we pay for Steamclock's team to create a personal team if it would let me consolidate a number of Shared Channels: XOXO, Úll, VanCocoa, &you, Rands Leadership, WWDC, and so on. Since this is a perversion of Slack's concept of a team it would need further product design work, but it could be simpler to implement than full single sign-on and would reduce the overbearing feeling you get when you context-switch into a social slack. More often than not, to justify the existence of an entire team, an optimistic admin has created two dozen channels, only one of which contains the real conversation, while the other 11 are perpetually marked unread by an ill-advised zombie bot that posts in the channel every six seconds when somebody mentions the word "Swift" on Twitter.

<img src='/images/2016/slack-accounts.png' style='width:300px'>

The other ray of light comes from our new friend, "Sign in with Slack." While testing out the feature on the shared channel tool Slackline, I was pleasantly surprised to see a team chooser. This is, as far as I know, the first product feature Slack has launched that shows centralized access to your teams. While it's disconcerting that I may one day may need this to figure out which of my many Slack teams I associated with some web service, it's great to see acknowledgement from Slack, not just in their support tweets but in their product, that this is a real problem they need to solve.

While I feel strongly about this UX problem, I know that there are a lot of pieces in play and fixing it after the fact is fraught with tradeoffs and costs. It's a tough issue, and there's a lot to it. As such, if you work at Slack, I'd be willing to chat in more detail about this issue. Just get in touch, and I'd be happy to invite you to the brand new Slack team I've created for it.