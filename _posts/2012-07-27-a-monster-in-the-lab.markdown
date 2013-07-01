---
author: allen
comments: true
date: 2012-07-27 08:46:20
layout: post
slug: a-monster-in-the-lab
title: A Monster in the lab
wordpress_id: 2385
categories:
- Article
tags:
- iOS
- Party Monster
- Steam Clock
- Visual Design
---

[![](/images/wp-uploads/2012/07/party-monster-crop.jpg)](/images/wp-uploads/2012/07/party-monster-crop.jpg)Steam Clock traditionally keeps its products under wraps until they're ready to buy. For this year's new app, I'm going to share the process, hopefully getting some good feedback along the way.

**What to build?**

In v2 of our [Wedding DJ app](http://www.steamclocksw.com/weddingdj/), we really want great request management. Queuing, skipping, and reordering songs needs to be extremely easy to use, so you can get back to the party and not accidentally put everything to a screeching halt. The more we discussed this feature though, the more we wanted it as just a standalone app.

There are a ton of things the default iOS music player can't do well:



	
  * I want to hear this next.

	
  * I want to hear a certain song, and then continue a certain playlist.

	
  * I want to look through what's coming up, and veto certain songs.

	
  * I want to skip or pause this song, but have it fade the transition.

	
  * I want my songs to crossfade.

	
  * I want to queue up a few songs, and then let it ride.


So what we want is a simple queuing music player that crossfades and is very quick to operate. It would shine brightest at a party, where curation and avoiding a sudden stop is most important. As a matter of fact, it could serve as a drop-in replacement for WeddingDJ for some weddings. Another awesome use case is road trips, with the passenger curating the tunes.

For now, we're calling it Party Monster. I'm not sure, but I suspect this is an awesome name.

**What does it look like?**

Almost immediately, I get to paper sketching. I'll usually sketch a couple dozen versions of an app's main screen, and roughly sketch some of the other screens. A lot of my sketching time is actually spent going back and forth with the team, pitching things. Well, more often I pitch removing things. "What if we take out reordering songs?" "What if there's no explicit skip button?" "Is audio playback strictly necessary? Okay, fine."

![](/images/wp-uploads/2012/07/party-monster-sketches3.jpg)

The starting point is iTunes' Party Shuffle behaviour: fill the list of songs from a playlist, and allow the user to queue more songs below the play head. From there, we trim the fat and stir in some unicorn dust.

We managed to rid ourselves of almost every button, including play, pause, and skip. For a personal music player you often skip many times in a row, but for a DJ player like this you usually jump to a specific other song, and almost never go backwards. And so, we adopted [Clear.app](http://www.realmacsoftware.com/clear/)'s delightful pull-to-act approach. A lot of swipe-to-act implementations suck because they either don't give enough feedback that you're on the right track (Tweetbot's swipe on tweets is like this) or they reveal more buttons, making the task very slow. Clear's behaviour is more like a sideways pull-to-trigger behaviour, and it's a joy to use.

In Party Monster you pull a song one way to play, and the other way to ditch an upcoming song. If you forget this, you can always tap a row and it'll bounce to indicate you can pull it - like Apple's home screen Camera button. All this together makes for very quick operation and no accidental skips or pauses. Or, so we think - none of this has even been prototyped yet!

**Now make it pretty**

It takes iteration to get mockups looking good in Photoshop, and then many roundtrips through [xScope Mirror](http://xscopeapp.com/) to get the look right on the actual device. In the case of Party Monster, on-device testing showed that the tap targets needed to be bigger, the dark theme had to go, and that my color calibration between Photoshop and the iPhone is not even close.

![](/images/wp-uploads/2012/07/party-monster-mocks.jpg)

Just like the name Party Monster, the choice of purple was kind of random, but it stuck and people seem to really like it.

**Now all you need to do is build it**

The mockups are good enough that we can start showing them to people, and feedback so far has been good. We have lots of work left: upgrading WeddingDJ's audio engine for the new features we want to add, building out the UI for Party Monster, and writing all the nice animations and effects we have planned.

![](/images/wp-uploads/2012/07/party-monster-mock-explained.jpg)



So, what do you think? Is this something you'd buy for $1.99 on the App Store, and if so, what aspect you most interested in? What do you think of the design? Are we completely insane?

**Updated Dec 5, 2012:** [Party Monster is now live on the App Store!](http://www.steamclock.com/partymonster/)
