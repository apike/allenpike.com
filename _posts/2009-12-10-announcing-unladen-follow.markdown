---
author: allen
comments: true
date: 2009-12-10 01:58:20
layout: post
slug: announcing-unladen-follow
title: Announcing Unladen Follow
wordpress_id: 1305
categories:
- Article
tags:
- Twitter
- Unladen Follow
---

![The Unladen Follow mascot. He is fat because he ate too many tweets.](/images/wp-uploads/2009/12/unladen-follow.png)If you're like me, you find Twitter can have a high noise to signal ratio. I wrote recently about stopping the fire hose for blogs, but it can be trickier on Twitter, where you don't have Google Reader's Trends.

To this end, I built a little tool to help you tone down your Twitter following list: [Unladen Follow](http://www.unladenfollow.com/). It scans your incoming tweets, and uses some metrics to suggest people for you to unfollow. I imagine that an unfollow helper may be construed as antisocial, but I think of it the other way around. By unfollowing a couple spammy users, you can socialize with many more casual Twitterers without overloading your brain.

As you might have concluded from [my recent OAuth howto](http://www.antipode.ca/2009/accessing-twitter-with-the-oauth-gem-and-rails/), Unladen Follow uses Ruby, the OAuth Gem, a trivial amount of Rails, and a fair bit of Javascript ((I originally used [Grackle](http://github.com/hayesdavis/grackle), which has a great design: instead of wrapping the Twitter API, it dynamically passes Ruby calls into API calls, making it lightweight and resilient. Unfortunately, a memory leak in the package motivated me to move most of the server code into the client. I considered also dropping Rails for Sinatra, which I will do if performance becomes a problem.)).

I have a todo list for version 2, but I'm curious what the Twitter users in the crowd think of it. Is it neat? Is it useful? Is it evil?
