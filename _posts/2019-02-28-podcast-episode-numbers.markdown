---
author: allen
date: "2019-02-28 13:10:10 -08:00"
layout: post
title: "325: Podcast Episode Numbers"
summary: "Podcast episode numbers may not belong in titles."
image: "/images/2019/X7X7X7Xggxhgx&X&X8X&X&gxUGYUXGYUXGYUX.jpg"
categories:
- Article
tags:
---

In iOS 11, Apple  made a variety of [changes and improvements](https://developer.apple.com/videos/play/wwdc2017/512) to the Apple Podcasts app and spec. Among other things, they added support for a new show format: serial podcasts. Finally, narrative-driven shows could request be shown in strict chronological order.

As part of this change, Apple added support for an "episode number" tag, and recommended that podcasters stop including episode numbers directly in the title of each episode. _Sure whatever, metadata best practices blah blah._

Smash cut to yesterday, when we all received a mass email from Apple Podcasts about ensuring our show isn’t “rejected or removed from Apple Podcasts” by “optimizing your show’s metadata”. While much of it was just about not being spammy, they asked more firmly this time for podcasters to stop including episode numbers in titles:

> **Adding episode numbers in titles.** For example, show titles like “The Very Hungry Tourists Episode 01” or episode titles like “01 Broken Heirloom.”

I was a bit surprised by this. _Everybody_ includes episode numbers in their titles... don't they? Though come to think of it, why do we? Why do I do it for [Fun Fact](https://funfact.fm/)? We don't number our blog posts; why podcasts? Am I being sucked into a deeply pedantic rabbit hole, never to return?

## No, why, why do you care about this Allen

According to historians, podcasters have included episode numbers in titles since the late Cretaceous Period. There are a few benefits, but the primary two are:

1. Give people an easy handle to find or refer back to to a specific episode
2. Make it easier to play through episodes from the beginning in a podcast client

While the introduction of "serial" shows has made playing from the beginning easy for certain kinds of podcasts, apps still make the assumption that all shows are either **strictly** linear and need to be listened to in order (a crime investigation in 10 parts), or that each episode is **completely** unrelated and you would never want to start from the beginning (a daily news briefing).

This is a pain in the ass for shows where the episodes are _loosely_ ordered, kind of like a sitcom. The episodes make sense on their own, so new viewers probably want to check out the latest one first – but there are back-references and follow-up items that can make it appealing to listen from the beginning. Without episode numbers, this can be annoying to actually do.

In an _ideal world_, Apple would support a third type of show, something like `episodic-series`, for shows where playing from either end is desirable. It could then prioritize the newest episodes, but still surface episode numbers and accommodate users who want to start at the beginning.

Back in the _actual world_, Apple wants you to decide if your show is linear or ephemeral, and stop trying to hedge that classification.

Still though, why do they care? Is it truly awful to have semi-episodic podcasts putting numbers in their episode titles?

As is often the case, you can indeed find something truly awful by exploring iTunes:

<img src="/images/2019/itunes-numbers.png">

Yes that's right, on the desktop iTunes will number your numbered episodes _as if the latest episode was episode 1_, followed mind-bendingly by the episode number you've included in the title. While this is horrific, it actually makes podcasters _want_ to keep including their episode numbers right in the title, since otherwise the presentation makes it look like the newest episode was actually your first, which is even more horrific and I just can't even with this thing.

Thankfully, most people do not listen to podcasts in desktop iTunes. The big show, the app that we – and Apple – are concerned about is Podcasts on iOS. So let's take a look at how episode numbers show up there.

## 045: The Why Do You Care About This Allen Show – Ne...

With iOS 11 and the new metadata, Apple built accommodations for episode numbers into the UI, allowing them to cleanly and consistently show numbers as part of the UI in contexts where it matters – such as serial shows – and _not_ show episode numbers in contexts where it very much doesn’t matter. For an example, let's take a look at the Top Episodes list.

<img src="/images/2019/podcasts-top-episodes.jpg" style="float: right; width: 300px">

Now, £1 says that Jony Ive would be rather cross if he saw this list with **5** different formats for showing episode numbers. With title data this noxious, there's not much Apple can do to present a nice, clear list of episodes.

Consistency aside, in this context the episode numbers aren't even useful. While the Top Episodes list should in theory be a gentle entry point for somebody new to podcasting, it is currently weird and intimidating.

If they can get podcasters to provide title and episode number metadata separately, Apple Podcasts can show the numbers where relevant, and style the them thoughtfully in different contexts, rather than being forced to serve up the the dog's breakfast that is episode title metadata today.

And while numbers in titles is a time-honoured tradition, I have to admit that episodes of newer shows that follow Apple's guidelines look pretty nice amongst their metadata-laden peers.

<img src="/images/2019/podcast-player-numbers.jpg">

The more I look at these screenshots, the more sympathetic I am to the ideal of relegating the episode numbers to metadata, and having player apps take the responsibility of showing those numbers where they're useful. In fact, when it comes to finding specific episodes or playing "episodic" shows chronologically, modern podcast apps already have some helpful features that make episode numbers less important than they once were.

For example, in Overcast you can tell a smart playlist to sort by "Oldest to Newest by Podcast". Then, if you go into a show's back catalog and add a horde of early episodes, they'll automatically stay together in chronological order. It's pretty hidden, but in Castro you can also queue up a show chronologically by subscribing to a show, then going to Library → _That Show_, then dragging "All" to your queue.

While neither of these approaches are as nice as a simple UI for playing a show from the beginning, I think they can bridge the gap as shows move episode numbers into metadata and players get smarter about it.

Similarly with episode discovery, instead of scrolling to a number you can type an episode title into Apple Podcasts and it will come up. In Overcast you need to search for the show first and then the episode title, but the functionality is still there.

Unfortunately, there is still a gap between the web and podcast players when it comes to linking an episode. As far as I know, there's no way yet for your podcast's website to predict the URL for "Open Episode X in Player Y", which would make it easier to go from a Google search or a shownotes link right to listening to an episode. With luck this will come.

## I get it, you care, what are you going to do about it

Regardless of what any 3rd party podcast apps are doing, the reality is that Apple runs the biggest podcast directory and app in the world. They’ve told us to give them a clean title and episode tag in `<itunes:title>` and `<itunes:episode>`. In return, they’ll be more likely to feature our show, Jony will be placated, and they’ll stop maybe-implying that our podcast may be “rejected or removed”. So, a pretty easy call there, I think.

A more interesting question remains though: for semi-episodic shows like Fun Fact where people may want to start at the beginning, should we keep the episode number in the `<title>` tag for 3rd party clients like Overcast and Castro? Certainly some people with opinions on the internet [think so](https://twitter.com/apike/status/1100837204346032128).

But I have to admit: I can't unsee what I've seen. I’ve beheld the clean and clear presentation of numberless episode titles. I’ve heard from the listeners who are scared off from trying out podcasts where every title advertises how many episodes they've missed. I've come to terms with the fact that even a few months in, starting with the most recent episode is the way to go for our show. And most dangerously of all, I’ve come to the conclusion that It Would Be Nice™ if podcast players directly used the episode meta tag to only show numbers where it matters.

So, as of today, our episode titles are clean and number-free. It was difficult and emotionally taxing, but I have made peace with my decision. May the the era of clean podcast titles one day come to pass.

---

_Update_: Apple just sent a followup email clarifying that "Your Show Won’t Be Removed for Having Episode Numbers in Episode Titles". It then goes on to say:

> We encourage you to use the tag to send us your episode numbers. If you decide to include episode numbers in your episode

The email then ends mid-sentence. We can only speculate on the fate of the Apple Podcasts employee who attempted to send this missive. Our thoughts are with their family tonight.