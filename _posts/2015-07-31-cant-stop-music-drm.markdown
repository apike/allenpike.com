---
author: allen
comments: true
date: "2015-07-31 18:00:00"
layout: post
slug: "cant-stop-music-drm"
summary: "Apple Music throws a wrench in the gears."
title: "Can't Stop the Music"
categories:
- Article
tags:
- steamclock

---

Five years ago, Steamclock launched our first app, [WeddingDJ](http://www.steamclock.com/weddingdj/). The concept was simple: a foolproof music app that you can use to run a wedding. A simple interface lets you plan out your songs and playlists, and the playback screen keeps a fat finger from skipping halfway through "Here Comes the Bride".

The app was well received, but we immediately started getting requests for one specific feature above anything else: crossfading.

<img src='/images/2015/weddingdj-crop.jpg'>

Crossfading is in some ways the feature that distinguishes a DJ app from a basic playback app, and it was an obvious feature missing from the default iPod app that's still absent today. Adding crossfading was no small task, since it required leaving behind the padded room that is Apple's high-level MediaPlayer API. While MediaPlayer is easy to use, it essentially just pokes at the system iPod playback mechanisms: play, pause, and skip.

Adding crossfading meant getting serious and writing our own audio engine. Luckily, iOS provides a world-class set of APIs for this. The AV Foundation APIs open up a world of possibilities for how DJ apps can play your iTunes music, and for the truly serious, Core Audio gives extremely fine-grained control over audio playback.

These advanced APIs allowed us to implement crossfading in WeddingDJ, and later Party Monster, our general-purpose queueing DJ app. As proud as we are of our little apps, their usage of the audio APIs pales in comparison to blockbuster DJ apps like [Djay](https://www.algoriddim.com/djay) and innovative audio apps like [Capo](http://supermegaultragroovy.com/products/capo/). With this rearchitecture, we joined a rich ecosystem of apps that can play back your iTunes library in creative ways.

Unfortunately, there is one tiny little problem with playing back iTunes audio yourself: sometimes you can't.

### You shall not pass
When we launched the first version of WeddingDJ that used AV Foundation in 2011, we immediately started getting reports of certain songs "randomly" not playing. Within a day, we understood that our app could no longer play back old iTunes Store purchases that were encumbered with DRM. While this was kind of annoying, and we filed a Radar asking for an official solution, it was a short term hurdle. You see, the iTunes Store had already been selling DRM-free tracks for four years by that point, and folks were slowly replacing their legacy libraries with unencumbered AAC files. For the meantime, we patched our app to alert the user when it encountered unplayable songs, adding an explanation of the DRM issue and how to work around it.

We planned to wait patiently for the issue of unplayable music to fade away, but Apple never stands still. Within months of our new audio engine debuting, Apple started to roll out new services that instilled iTunes with the boundless power of The Cloud™.

<img src='/images/2015/itunes-errors.jpg' width='400'>

First, we got iTunes Match. This magical service would match your poorly ripped or questionably acquired songs with high quality, DRM-free tracks from the iTunes Store. What's not to like about that? In addition, iTunes Match tracks would be available in the cloud until your device needed them.

Unfortunately for anybody building a 3rd party DJ app on iOS, these magical cloud songs aren't downloadable or streamable via AV Foundation or Core Audio. The best you can do is alert an iTunes Match subscriber that they should go download their songs in the Music app and, once they've finished, return to your app to play them.

So, no DRMed songs, and no iTunes Match songs. We added to our disclaimers, made our error messages longer, and filed more Radars.

iTunes' next big step towards streaming was a quiet one. Even as close Apple watchers, we didn't notice the change until I started getting mysterious support mail. It turns out that iOS 6 introduced a clever new feature where new device restores no longer download all the music you had on your old device. Instead, restored devices display purchased tracks as streamable from iTunes in the Cloud. Next thing you know, users who weren't even iTunes Match subscribers were upgrading their devices, opening their DJ apps, and not being able to play anything at all.

After another round of new error messages, disclaimers, and Radars, developers of DJ apps everywhere were concerned. We knew there were sharks in the water, but the path forward wasn't clear. Should we keep trying to surf the wave of uncertainty churning the seas of our users' iTunes libraries? Or, did we need to bail on our advanced playback features and just grab a beachside beverage, dump the sand from our shorts, and start considering new markets for us to torture with a surfing metaphor?

This month, Apple answered that question. By prompting every user of the Music app with a free subscription, Apple Music has flooded folks' iTunes libraries with music they haven't purchased  *and* offline versions of tracks that are protected by the second wave of DRM. This is bad.

Now, the surge in songs we can't download or stream is a pain, but the re-introduction DRM is a brick wall. Not only can we not play DRMed songs, but DJ apps can't even detect their presence. An enterprising developer may find that the AVAsset API has a property `hasProtectedContent` that sounds like it would help. Unfortunately, to get an AVAsset you need an asset URL, and if you ask for the URL of a DRMed MPMediaItem, you just get `nil` -- the same value you get if it's an iTunes Match track. Or an iTunes in the Cloud track. Or an Apple Music track. Or a really bad cover of Billy Ray Cyrus' Achy Breaky Heart and it is currently a Thursday.

<img src='/images/2015/cant-play.jpg' width='350'>

As a result, our ability to communicate to the user why we can't play their songs is pretty limited. 


At first we filed Radars and otherwise lobbied for improved playback through AV Foundation, but in the context of a subscription service, it's not a problem Apple can fully solve. Apps might get support for downloading iTunes Match and purchased iTunes in the Cloud tracks one day, but letting 3rd parties decode DRMed Apple Music tracks in our sandboxes would almost certainly violate Apple's agreements with the music labels. [DRM on purchased music](http://www.marco.org/2014/09/18/thoughts-on-music-formats) is ridiculous, but DRM on offline caches of songs that you have because of an active subscription service isn't even controversial. In the modern world of streaming, it's just a fact of life.

### What do
So, like anybody else who sells a DJ app on iOS, my inbox is now filled with messages like this one I received yesterday:

> iPhone will not let Download songs on the app because of Apple music. Please help!!!!

According to our latest stats, 17% of Party Monster users have been unable to play a song in their iTunes library, and 22% of WeddingDJ users have tried to cue a playlist that has so many unplayable tracks that we need to display a warning. While it's a miracle that we've been able to maintain a 4 star rating through all of this, it's not going to last if we stay the course.

Given all of this, we have a couple options. We could double down and go pro, catering to serious DJs who can load DRM-free music into our sandbox. Pro DJs who use our apps often have a large licensed library of songs, and won't rely on iTunes Match or Apple Music.

Alternatively, we could steer towards the mass market, drop crossfading support, and regain full iTunes compatibility. We could also put in the work to add support for Spotify or other competing streaming services, and focus our apps less on playback features and more on having a great UI for queueing.

We're still evaluating our options, but I think we may end up trying both. First, we'd do an update to the apps that adds a crossfade-less compatibility mode using boring old MPMediaPlayer. Then, we'd add Spotify support. Finally, we would investigate more deeply a "Pro" version of the app that would add support for actually loading songs into our app bundle using a NAS or other means, and explore the more advanced features like beat matching and stripping silence that we've long wanted to do.

We have another option, one that not long ago seemed ridiculous but might just make sense. We receive a lot of requests for Android versions of our apps. Historically the library and audio API situation on Android has been such a hellstew that it hasn't made sense, but the issues with AV Foundation have made us realize that we're willing to put up with a fair bit for the love of the music, and users appreciate it when we do. We also have a couple great Android devs on staff now, and Android 5.0's new MediaBrowser API may bring it close enough to iOS parity that it's worth a serious look. 

Either way, we need to keep up with the times. Apple Music may take off, or its [quirks](http://www.marco.org/2015/07/31/apple-music-matches-files-with-metadata-only
) and [pitfalls](http://www.marco.org/2015/07/26/dont-order-the-fish) may prevent it from really getting traction. Regardless, we've seen the writing on the wall: we've built our apps on a data source that we don't control, and it's slowly being eroded out from under us.

Given this struggle and the relatively modest sales volume of DJ apps in 2015, some folks have asked why we don't just bail on music apps entirely. Perhaps from a cold business perspective, there's an argument to be made, but here's the rub: we love working on music apps, and they pay our rent. We've been in the indie software business for five years now, and we've learned to recognize when something's right - and to put in the work to keep it going. Wish us luck.



