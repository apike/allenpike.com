---
author: allen
comments: true
date: "2015-12-31 18:00:00"
layout: post
slug: "things-to-omnifocus"
title: "Some Things about OmniFocus"
categories:
- Article
---

A couple months ago, I made a big change in how I work. After three years of managing my tasks with Things, I switched to OmniFocus.

People love OmniFocus. People *swear* by OmniFocus. Yet somehow, my first day using it was a disaster. It turns out, OmniFocus is a bit like Photoshop: great to know, hard to learn. Given that, I wanted to share my little journey and some of the pits I fell into along the way.

<img src='/images/2015/things.jpg' width='100%'>

## Making the Switch

For three years I’d been managing my tasks with Things, and it was fine. I get things done on the Mac, and occasionally use the iOS app for quickly capturing a task or checking off shopping items. I don’t formally use [GTD](https://en.wikipedia.org/wiki/Getting_Things_Done), but I’ve come to learn and appreciate its key principles. In particular, the idea of recording the next physical action towards your goal is priceless. "Learn React Native" doesn't get done, but "Find and run a React Native sample project" does.

Anyway, Things was the first task app that ever stuck for me. I lived out of its Today view, which highlights tasks that are due or that you've chosen to do today, and lets you schedule tasks to appear in Today sometime in the future. This worked relatively well &ndash; for a while.

Over time though, my job got more complex, and I got better at logging what I needed to do. Eventually, the number of tasks I was managing outgrew Things' workflow. I'd end up with these massive defer-bombs, where I'd wake up some days with 50 tasks in my Today view. It was getting too hard to focus on anything.

I needed an app to help me to focus on what's important, and keep what's not important out of the way. OmniFocus is recommended so often and so emphatically that it's the natural next step. Omni also has a reputation as an excellent platform citizen on iOS and the Mac, unlike... some other apps.

I knew learning a new task app could be hectic, but I’m okay at computers, so I expected getting the hang of OmniFocus would take perhaps an afternoon. Unexpectedly, my productivity fell into a pit for a week. It was bad enough &ndash; and stressful enough &ndash; that I almost bailed on OmniFocus entirely. Luckily for me, I was set up to keep pushing forward: I had already paid for OmniFocus, I had tech support from Nigel here at Steamclock, and I had publicly announced that I was making the switch. So, I dug in.

## Welcome to OmniFocus

On the surface, OmniFocus’s UI doesn’t seem so intimidating. There is no import from Things, which isn't as bad as it sounds. You can actually drag a list of tasks from Things to a text editor, clean it up, and paste the lines into OmniFocus to re-create them which works okay. Initial input only took an hour.

Once I got my tasks in though, I had a fairly serious problem: OmniFocus now held 500 long-term tasks, 45 short-term tasks, and 5 urgent tasks mixed together in its opaque and mysterious puzzlebox. The only task I knew was important was "Tame OmniFocus". Panic ensued.

I started with my inbox, which looked like some kind of [Superfund](https://en.wikipedia.org/wiki/Superfund) site. Even though I'd put most of the tasks into projects, hundreds of them stayed in my inbox. In Things, inbox items go away as soon as you give them a defer date or a project. By default though, OmniFocus’ inbox items only go away if you give them a project AND a context AND click "Clean Up". Deferring them initially does "nothing" since the default view is All, which shows deferred items.

<img src='/images/2015/omnifocus-view.jpg' width='300px'>Let's talk about views for a second. Each perspective in OmniFocus has a View menu. There's also the usual menu called View, but this is a different thing, also called View, but it's not in the menu bar, even though a menu comes out of it. It's a button called View, with a menu in it. It's the thing with an eye on it, okay?

Anyway, this View menu button menu contains filter options, and occasionally also sort options. They reduce what you see in each list, which lets you focus on tasks that aren't completed, deferred, or blocked. Changing these view settings will update the filter, but only for that Perspective, and by default it won't save them. You'll probably spend the first while confused why you're seeing tasks you didn't expect in any given list. Expert users rarely permanently change these settings, so the behaviour makes a sort of sense, it's just poorly signalled in the UI.

Meanwhile, as I grappled with trying to hide low-priority tasks, I could hear the distant cries of my urgent tasks, buried in some tab or section, calling for help. I had been flagging important tasks and marking due dates, but they weren't consistently visible anywhere. There is no clear equivalent of Things’ Today view where I could see an overview of what's important. The critical tasks were spread all over, hidden behind various perspectives and View settings that aren't initially intuitive. It was that early paranoia about urgent tasks that made me almost switch back to Things. Luckily, there are a few solutions to this.

It turns out that a lot of OmniFocus users use a “Due and Flagged” perspective, which highlights important tasks across all projects and contexts. Strangely though, creating a perspective like this requires upgrading to OmniFocus Pro. While I like the idea of paying indie developers for good software, I was already struggling with OmniFocus' quantity of features and preferences. I didn’t want to unlock *more* features, and I also wanted to learn the rules before I started to break them with additional customization. Given that, I decided to try for at least a month to learn how the non-Pro version is intended to be used, which meant adapting my mentality from Things to this new order.

## The "Getting Better" Montage

So it was bad at first. A few days in though, I started to feel like I was actually successfully using OmniFocus, and my resentment began to fade. By about two weeks in, I was almost as productive at getting things done as I had been with Things. Two months in, I now like it, and understand the UI and product design issues that initially caused me great frustration. It turns out that most of the issues I'd originally considered to be bugs were actually  weird consequences of design decisions I didn’t yet understand.

Sure, there are a couple actual bugs. There are also two supposed search functions, neither of which works app-wide, which is baffling and frustrating. Luckily, proper search is now on OmniFocus for iOS, so it will likely be on the Mac soon. For the most part though, my struggles with OmniFocus early on looked like this:

1. What the hell, wow, why is this happening, this must be a bug.
2. Hm, wait, this is more complex than it seems.
3. Oh, weird, there are multiple features and settings colluding here to create this confusion, and now that I’ve grokked them I realize that this is a product design issue and not a bug.

There are a lot of examples of these. Often they're simply surprising defaults, but most of the issues are tough design problems at the junction of two features, or a choice to favour experienced users over newbies. Now that I understand OmniFocus and its settings, I can work around or live with most of the issues that were initially confusing.

## OmniFocus for Things Users

Given that, here are some hard-won tips that should help anybody making the switch to OmniFocus.

1. By default you need to give each item a project *and* a context to get it out of your inbox. You can make the inbox behave more like Things' with a setting called "Clean up inbox items when they have either a Project or a Context", though you'll still need to hit Clean Up after you assign something to dismiss it.
2. There is no single place to see your due and flagged tasks. The front-line defense for this is to go to the Notification settings and turn on "Show reminders In the Sidebar". This sounds notification-related, but it actually puts badges in the sidebar for what's where in the app. You can also create a custom perspective that shows due and flagged if you upgrade to OmniFocus Pro.
3. You're not going to be able to directly replicate Things' Today view, but you can use the flag feature in OmniFocus to indicate things you'd like to do today. The nominal Today view in OmniFocus' Forecast looks like it has a setting to show flagged items, though that actually refers to OS X's Notification Center.
4. The badge number in the Dock is for how many items are due or due soon, but that number doesn't appear in the OmniFocus UI. You can see these items in the Forecast view, but turning on "Show reminders In the Sidebar" makes it a lot easier to find them across the app.
5. If you defer an item and expect it to go away but it doesn't, there are a few reasons this may be happening. Sometimes a change you made to a task requires you to hit Clean Up, or ⌘K. This is just a thing. Also, check the View menu button menu, which may be set to All for your current perspective.
6. Remember that View button changes are only semi-firm by default, and they go away when you click a perspective &ndash; including the active one. I hope in the future they highlight when you’re in a non-saved View mode, perhaps with a conditional Save button.
7. The Inspector sidebar on the right is daunting, but you can do almost everything without it, since all the little bits of metadata on a task are clickable and changeable.
9. Don't worry about letting some tasks have the default project of Miscellaneous. Over time you'll probably find using a dozen projects and two or three contexts is worthwhile, but Miscellaneous works fine, analogously to Things' Next bucket.
10. OmniFocus' UI puts an emphasis on giving tasks a Context, such as Home or Office. This seems weird, but it is helpful to focus on work tasks when there's just no way you can, for example, take out the garbage. When looking at a Context, there is an option in the View filter button menu button to sort by "Due Date & Flagged." In general this a good working view.
11. If you give a project a Context, then things you put in that project will have that Context by default. If you're going to use Contexts, this is highly recommended.
12. If you have list-like projects like future blog topics or podcast guests, you'll probably want to mark those projects as On Hold with a context like List or they'll make a mess in your other perspectives.
13. Tasks only have a sort order in the context of their Project. A consequence is that you can't reorder tasks in the Forecast or Context perspectives, which is really annoying. If you want to reorder your day's tasks as you work on them like in Things, you need to have them in the same project, or make some sort of fake Today project.

## Control, you must learn control

Most of these problems only matter in the initial days of learning OmniFocus. While I was  surprised at how hard it was to ramp up on, it's hard for the same reasons Photoshop is. Feedback on pro apps comes from advanced users that already understand all these things, and so they ask for even more settings and ways to modify stuff. And so turns the wheel of pro app development.

That said, I think that there's a lot of opportunity for OmniFocus 3 to retain its power and flexibility, but offer a smoother ramp for learners. Tutorials and support are helpful, but things like comprehensive tooltips and other UI improvements could go a long way to making tutorials and support less necessary.

The issue of surprising defaults is more subjective. On one hand, I had a much easier time navigating OmniFocus once I turned on the settings to reveal more badges and indicators. On the other hand, the product is about focus, and you could argue that too many badges and indicators isn't ideal.

In any case, the people at Omni are entirely awesome, and they really do care about this stuff. I shared an initial draft of this with a member of the OmniFocus team, and apparently a lot of these issues are already on their radar, which is great. I'm looking forward to seeing what's next.

And really, as difficult as that first week was, if I had the choice I'd definitely make the switch again. Ideally, after receiving a few tips from my future self.