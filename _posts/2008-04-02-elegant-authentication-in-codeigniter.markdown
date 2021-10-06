---
author: allen
comments: true
date: 2008-04-02 02:15:36
layout: post
slug: elegant-authentication-in-codeigniter
title: Elegant authentication in CodeIgniter?
wordpress_id: 289
categories:
- Article
oldtags:
- CodeIgniter
- Frameworks
- PHP
---

![The Vilcus plug dactyloadapter.](/images/wp-uploads/2008/04/plugin.jpg)At work we're using [CodeIgniter](http://codeigniter.com/) to build a web-based game for teachers. CodeIgniter is a PHP Model-View-Controller framework that is generally well thought out and doesn't get in our way... at least it didn't. This week it came time to add login enforcement to our app. It should be easy, right? Right?

All I want is an simple authentication system that calls our library to see if you're logged in ((Our user data is stored in Amazon's SimpleDB, so the existing SQL-based authentication systems for CodeIgniter don't work.)), and load the user data if so. Otherwise, it should show a nice login page. The usual way to do this would be a chunk of code that runs at the beginning of each page load that can call libraries and decide what's going to happen. This should be easy to get into the app elegantly, since CodeIgniter can be extended in many different ways.

So, I start writing a library, and... wait. Libraries don't call themselves, duh. Clearly, it should be a hook. I love hooks ((Wordpress' hook API is a pleasure to work with.)), so I'm excited. I make a pre-controller hook, and... wait. It seems at the pre-controller hook can't call libraries, since it's the controller that loads them. Okay, a post-controller-constructor hook it is, and... wait. Once I've loaded the controller, it's past the point of no return, and my new login page is followed by the controller's usual view (complete with another header, content, and footer.) Uh, okay.

I decide at this point I'm probably barking up the wrong tree. [According to Snook](http://snook.ca/archives/php/codeigniter_vs_cakephp/), CakePHP encourages you to make your own subclassed controllers, so let's see if the same works in CodeIgniter. It might, but [CodeIgniter's docs say](http://codeigniter.com/user_guide/general/core_classes.html), in bold, "Most users will never have any need to do this, but the option to replace or extend \[controllers\] does exist for those who would like to significantly alter the CodeIgniter core." I don't want to alter the core, I want to tweak the routing. Wait, routing!

If I could call my library at routing time, I could very easily accomplish all this by choosing the controller based on login info. So I go into the routing file, and... wait. You can't call libraries at routing time. Am I missing something fundamental here?

Derek Allard, one of the lead programmers on CodeIgniter, [links to an authentication extension ](http://www.derekallard.com/blog/post/code-igniter-user-authentication-management-library/)[called "auth"](http://www.derekallard.com/blog/post/code-igniter-user-authentication-management-library/), so I download it to dissect. How does auth elegantly connect with CodeIgniter? It uses a helper, a hook, two libraries, a model, and an inheriting controller, a language file, and host of views to handle stuff like password changes and errors. Is this a cruel joke?

I don't have time for that this week, and refuse to believe it's all necessary, so I cork the hole with a post-controller-constructor redirect and will return after the pilot launches with a fresh mind. No Hollywood ending, just a dull throbbing in my temples.
