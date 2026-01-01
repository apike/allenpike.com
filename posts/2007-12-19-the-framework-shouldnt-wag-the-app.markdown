---
author: allen
comments: true
date: 2007-12-19 13:13:15
layout: post
slug: the-framework-shouldnt-wag-the-app
title: The framework shouldn't wag the app
wordpress_id: 267
categories:
- Link
oldtags:
- Frameworks
- Undo
---

The app should wag the framework. Wil Shipley of Delicious Monster wrote yesterday about how, when given the Core Data framework's "free" undo, [he ended up doing contortions to make the feature work for him](http://wilshipley.com/blog/2007/12/transitions-and-epiphanies.html):


> Well, I have undo in Delicious Library 1. It's not "magic" like with CoreData, but it works. In fact, now that I am thinking about it -- I've spent months and hundreds of lines of code trying to get CoreData's "magic" undo to work, when, in fact, there are really only FOUR actions that are ever undone.


I'm not sure what happens more often: people not letting a framework do what it could easily do, or people forcing a framework to do something that would be easier done by hand. Don't peel your potatoes with a knife, but don't peel your pineapples with a potato peeler. Actually, you should try that.
