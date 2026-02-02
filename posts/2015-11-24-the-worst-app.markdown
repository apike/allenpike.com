---
author: allen
comments: true
date: "2015-11-24 18:00:00"
layout: post
slug: "the-worst-app"
title: "The Worst App"
summary: "Stephanie isn't the only one upset about an app."
categories:
- Article
tags:
- steamclock
- best

---

*Update 2: This story now has [an epilogue](#update2).*

One of the various things I do at Steamclock is provide support for our apps. Our music apps don't require much support, and much of the email we get is positive, so tending to support is generally pleasant.

Or at least it was pleasant, until recently. On September 30 I received a very concerning support email.

> Subject: Report & Contact
> 
> My app keeps skipping when i close to my lock screen or go on a different app, and it also keeps taking forever to play the song when i click on it, and it wont play song after song i have to manually click on a new song after one ends. Can i get a reply to these issues please?

This is a terrible kind of email to get - it points to serious low-level problems with the audio engine, perhaps a media playback API regression or other critical bug.

I responded immediately with some questions. I asked for some further details like the OS version and device, and I asked whether they're using Party Monster or WeddingDJ. My worry turned to confusion when I received the reply:

> I am using the app Play Tube Pro-playlist manager.

You're using... what? I tried to clarify but got no response. Wrong number, I guess.

## Please help me

A month later, I received another foreboding support email.

> Subject: Report & Contact
> 
> Is not functioning very well 
> Please help me 

How terrible! We never want a customer to feel like that after using one of our... wait a minute. Report & Contact? I've seen that before.

I apologized to the user for what they were experiencing, and asked for a link to the specific app they were having trouble with. Bizarrely, they link me to an app I've never seen before: [Music Player & Playlist Playtube manager](https://itunes.apple.com/us/app/music-player-playlist-playtube/id1050536218?mt=8) by Vi Tran, a shovelware YouTube app with a 1.5 star rating.

Well, that explains it! These weren't emails for a Steamclock app at all. I promptly made a TextExpander shortcut to explain that it's not our app, and to contact Apple. Case closed, not my problem.

> Subject: Report & Contact
> 
> Hi please I cannot play music

Sorry about that, not our app my friend.

> Subject: Report & Contact
> 
> No va bien es una mierda

I don't speak Spanish but that doesn't sound very good... still, it's not our app.

> Subject: Report & Contact
> 
> That's the worst app I have ever purchased, it's not even working and why the hell do you think you can put adds while I paid for that horrible app.

Turns out, this is my problem. One email a month turned into one a week, then one a day, then multiple every day. Soon I was spending more time dealing with support for Music Player & Playlist Playtube manager than I was for our actual apps. Particularly frustrating was the fact that many of the emails described problems that could plausibly occur in our apps. It was time to dig deeper.

The App Store page revealed little, other than that I wasn't the only person unhappy with this app. If you think the App Store reviews on good apps are negative, you should see the reviews on bad apps.

> 👎 ★☆☆☆☆ <br>by stephaniechabot12983456688
>
> THIS APPLICATION IS REALLI NOT GOOD!!! I CANT LISTEN TO MY MUSIC!! AND WE NEED TO PAY!! OHHH HELL NO!!!!

Well said, Stephanie.

The app's website link on the App Store went to [an unrelated company](http://skyhdapp.com), and the copyright credit was for [another unrelated company](http://wonderbox.io). I contacted them, and they were as confused as I was. With no way to contact the actual creator of the app, the only solution was to get Apple to pull it.

## Time to die

Now, the App Store review process is a mixed bag. While it definitely has some problems, its fickle nature has an upside. When an app is in egregious violation of common sense and decency, Apple can simply pull it from the store. All you need to do is contact Apple about the app.

Unfortunately, one does not simply contact Apple about an app. The official way to complain about an app is via the "Report a Problem" link from when you buy the app. Of course, I'm not going to *buy this scam app* just to complain about it, so I dug up [an alternate form](https://getsupport.apple.com/) to report a problem. Maddeningly, one of the required fields on that form is an order number - the one you receive when you buy the app. Stalemate.

For a few more days I stewed. As each app victim wrote in, I asked them to contact Apple and complain, using their precious order number. Pretty soon, people started to report back that they *had* contacted Apple:

> I **did** they said to contact you!<br> 
> If I was owing money to you guys God forbid I would get black listed because it the other way around nobody has the decency to help!! Not good enough.

Ookay. It seemed I had no choice - I had to get to the root of this. I pulled out the Steamclock credit card and, for $3.49 CAD, I bought Music Player & Playlist Playtube manager.

## Into the breach

<img src='/images/2015/playtube-screenshot.jpg' style='width:250px' class='side'> I must say, Music Player & Playlist Playtube manager is a truly remarkable app. Its novel colour scheme of black, gold, grey, and coral breaks new ground. The various bugs that immediately present themselves prove that this developer understands how important it is to "always be shipping". Perhaps most notably, in a market suffering a race to the bottom, this developer showed true entrepreneurial spirit by charging $3 *and* putting up a full-screen modal advertisement every few seconds.

As interesting as the app was, my attention immediately fixated on the prominent menu item titled "Reporting". Tapping this composed an email &ndash; addressed to me, titled "Report & Contact", and eager to capture your thoughts and feelings about the app.

I took some notes and screenshots and contacted App Store support. I explained that the app was buggy, not working as advertised, and instead of providing a way to contact the developer, was redirecting their angry support email to me. I asked them to pull the app.

Their initial response was, remarkably, that I should contact the developer. Now don't get me wrong, as a developer I'm glad that's in their script. Still, in this case, not so helpful. After some further explanation they refunded my purchase &ndash; the one I made so I could ask them to pull the app &ndash; but beyond that would only direct me to the generic [feedback form](http://www.apple.com/feedback/itunesapp.html). Rest assured, I filled that form with an incredibly convincing explanation of why the app was toxic waste and should be pulled. So far though, it hasn't swayed anybody.

## Electric Boogaloo

Yesterday I got an unexpected email, congratulating me on launching some app called "Feeling Drawing". I checked the store, and sure enough a new app had just gone live, featuring virtually the same icon as the Playtube app, but this time called Feeling Drawing and attributed to "Solaro Nohimdad". This time, the app's support website was listed as steamclock.com. They even went as far to proclaim the app "© Steamclock". In the immortal words of Stephanie, OHHH HELL NO.

I immediately [reported trademark violations](http://www.apple.com/legal/internet-services/itunes/appstorenotices/#/issues) on both apps to Apple Legal. The good news is that they pulled Feeling Drawing from the store within 24 hours. The bad news is that Music Player & Playlist Playtube manager is still at large, laying waste to customers' sat worldwide.

I suspect that sooner or later, whether due to my tortured wails or the deluge of one-star reviews, Apple will pull this particular piece of garbage. Even when that happens though, many questions will remain. Does the App Store need a formal policy on app support? How many more junk apps are they going to put up and attribute to us? Am I on a shockingly convoluted and drawn-out episode of [Punk'd](https://en.wikipedia.org/wiki/Punk%27d)?

Anyway, time to get back to work. It looks like I have a bunch of support email to answer.

----
**Update, Nov 25 2015:** <a name='update'></a>Multiple helpful folks from Apple promptly reached out about this post, and I see that Music Player & Playlist Playtube manager has now been removed from the App Store. This is a win for users and a win for my support inbox.

In the longer term, I hope they put together a policy to deal with this kind of scam. This is surely not the only offending app. In fact, I was notified today that [another scam app just went up](https://itunes.apple.com/us/app/calo-caculator-premium/id1059599767) that uses our website as their support link. Still, forming good policies takes time, so I wanted to thank the folks at Apple. They do care.

---
**Update 2, Nov 14 2016:** <a name='update2'></a>A year later, this is still periodically happening. I suspect the same scammer. For example this week I'm getting email about <a href='https://itunes.apple.com/ca/app/automatic-call-automatic-recorder/id1168938955?mt=8'>Automatic Call - Automatic Recorder</a>, a scam app that claims to be "© steamclock.com" (which makes no sense), sends its support email to a Vietnamese company called SmartDev (who have emailed me in the hope of somehow removing it), and whose supposed function is in fact impossible on iOS. Some other examples I've noticed over the year included:

- Cinema Box : Let's Discover your Movies & TV Show trailer
- Playbox HD for Moviebox & Showbox Preview
- Greatest Music : Free Player Manager & Search Song
- Record Tool Quick
- iRecorder Shou
- Your minds: Get the best quotes for life
- Free Music Finder for Spotify Premium
- Premium Song Player for Spotify
- LocationFaker : Choose & Share Your Pet

It seems that this scammer's favourite MO is to create a new personal iTunes account in a new name, find a popular Android app that is not allowed on iOS, make an app that looks as if it is that app, attribute the copyright and support to legitimate developers, and profit. Often the name the scam apps are published under is Vietnamese, which makes me suspect the scammer is Vietnamese as well.

When one of their apps gets popular enough that we start getting hate mail we try to whack-a-mole report it via Apple's trademark infringement form, but for now it's a continual slog. With luck, Apple will offer a better way of reporting scam apps in the future.