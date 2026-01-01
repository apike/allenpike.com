---
author: allen
comments: true
date: 2014-03-31 23:00:00
layout: post
slug: "hashed-out"
summary: "Hashtags get banned."
title: "Hashed Out"
categories:
- Article
oldtags:
- Twitter
---

People get pretty worked up when I tell them I muted "#" on Twitter to help me keep up with my stream. "You can't do that! You're a monster!" If you like that, you should try muting "@".

<img src='/images/2014/twitter-hell.jpg' width='300'>

Brent Simmons wrote a piece today about [the power of Mark All as Read and evil of unread counts](http://inessential.com/2014/03/31/mark_all_as_read). While I agree that you shouldn't spend your life worrying about unread counts, I'm not fond of marking all as read. It's important to be able to declare bankruptcy on Twitter or RSS, or even your email. However, each time you find the need to do that, it behooves you to prune your inputs and cut the noise.

Information is like food. You want it, you need it, it's wonderful. Consuming it makes you happy, to a degree. Too much though, and you're going to get heart disease.

## Cue the mutiny

Over the last two years I've met and followed a lot of interesting people who tweet a lot, to the point that I can't quite keep up with what's going by. There are three solutions to this:

1. Unfollow people with below-average signal/noise ratio
2. Only read a random subset of my tweets (the "scroll to top" approach)
3. Mute tweets with below-average signal/noise ratio

I'm not interested in reading a random subset of my tweets just based on what time I happen to be reading them. Reading semi-random content instead of the best content seems crazy to me.

With this in mind, I built [a tool to unfollow noisy people](http://www.unladenfollow.com/), which really does help. Unfortunately, it's heavily gated by Twitter's new API restrictions so it gets a fairly narrow slice of my timeline. I also actually like the tweets of the high-volume people I still follow, I'd just prefer there to be less of them.

So, on came the mute filters. If your Twitter client doesn't support mute filters, check out [Tweetbot](http://tapbots.com/software/tweetbot/). (Twitterrific has a related feature called muffling which is very cool but isn't as flexible unfortunately.) Justin Williams maintains [a nice list of Tweetbot mute filters](https://github.com/justin/SilencedBots/blob/master/RegEx-Filters.md) for a wide range of noise, but two months ago I threw down a very simple mute: "#".

Hashtags are inhuman, they're noisy, and they make your timeline harder to skim. They draw your eye to giant pieces of punctuation and irrelevant highlighting. Hating on them is [not even remotely new](http://blog.extraface.com/2008/02/26/why-i-unfollow-people-who-use-hashtags-on-twitter/), but a lot of well-meaning people still crap up their writing with them.

Whether you are bothered by hashtags or not, for any mute the question to ask is the same: are tweets that match the filter lower quality than average? If so, muting them will increase the quality of your Twitter stream. Higher  quality and lower volume means less bankruptcy and a better use of your time.

My # mute cut out less than 5% of my stream, but it was liberating. In one fell swoop, I improved the signal to noise ratio of the feed, I was spending less time on keeping up, and I didn't need to unfollow anybody who I wanted to keep up with. After a few weeks of this, I was convinced it was the right move. One busy day this month, drunk with power, I went a little further.

<img src='/images/2014/tweetbot-mutes.jpg' width='300'>

I muted "@".

And then, tranquility. I had intended to just mute @ for the day, but I screwed up and didn't put a time limit on the rule. Twitter's roar of debates, promotions, and one-upmanship turned into a serene flow of one-liners and insightful links. Most of the tweets I saw were from people who, from a Social Media Consultant's playbook, were doing Twitter wrong. They were just writing what they thought, with no embellishments or weird punctuation. It was downright peaceful.

It was too peaceful. For every dumb argument, I missed two insightful comments. For every friend flogging [his fricken video game podcast](http://upup.fm), I missed three interesting launches or announcements. After a few days of a bizarrely quiet Twitter, I clued in that the @ filter was stuck on. When I removed it, real human conversation flooded back into my stream. My heart grew three sizes that day, and I started to re-evaluate muting #.

## Missing out
If you mute hashtags, what do you miss out on, really? You definitely miss some tweets from people with an axe to grind.

> Another FUCKING donut shop closure in Brooklyn #savethedonuts #why

You also miss some tweets from people who have a well-intentioned but ill-fated thing to promote.

> If you care about the viability of #bitcoin, you MUST read this medium.com thinkpiece and take action now

And mercifully you miss some of the many tweets about conferences you're not at.

> why am i still going to this conference #sxsw #killme

At the same time, you'll miss out on some good stuff, and not just jokes. By sheer luck I stumbled across [this tweet from Neven Mrgan that had been muted](https://twitter.com/mrgan/status/446705191140618240):

> Our game is almost done, and I'll likely be tweeting about it more. Would it be helpful or annoying if I used the hashtag #spaceage?

Not only would I potentially miss out on info about Neven's [upcoming game](http://www.spaceageapp.com/), but I wouldn't have even seen his question about hashtags due to my filter. That was the beginning of the end for my indiscriminate muting of #.

Today, I moved to a more moderate set of filtering punctuation:

1. Mute three or more @s in a tweet
2. Mute two or more #s in a tweet
3. Mute tweets starting with .@

Together, these give me most of what I want - a timeline with less noise. Still, although the extreme experiment failed for me, I encourage you to try it. Mute # or @ for a week. Mute "http://". Mute Instagram. Cut your stream down to the minimum possible, without killing what you love about it.

Then, get back to work.