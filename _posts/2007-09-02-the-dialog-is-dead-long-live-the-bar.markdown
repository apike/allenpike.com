---
author: allen
comments: false
date: 2007-09-02 02:22:49
layout: post
slug: the-dialog-is-dead-long-live-the-bar
title: The dialog is dead, long live the bar
wordpress_id: 180
categories:
- Article
tags:
- Firefox
- Modal Dialogs
- User Interface
---

Through Jesse Ruderman's wonderful [Burning Edge weblog](http://www.squarefree.com/burningedge/2007/09/01/2007-09-01-trunk-builds/) I learned that tonight's Firefox nightly build has finally killed the intrusive "Do you want to save this password" dialog. Before, Firefox would ask if you wanted to save the password as soon as you clicked Log In, and you had to answer before you could continue (aka 'modal'). But now...

![The new password UI.](/images/wp-uploads/2007/09/firefox-pass-bar.png)

They simultaneously eliminated various problems:



	
  * Saving incorrect passwords or typos

	
  * Interrupting users who are in an hurry

	
  * Bugging those who haven't decided if they want the password saved yet

	
  * Intimidating new users who don't know what to do with such a dialog


We've [known for a long time](http://www.codinghorror.com/blog/archives/000432.html) how much Firefox's modeless Find Bar kicks old-school find dialogs' asses. They've also applied this approach in a few other places, such as the Popup Blocker and their upcoming Redirect Blocker. Firefox has been a pioneer in this, but it's happening all over town. It's now obvious that modal dialogs that unnecessarily interrupt users aren't going to cut it.

How useful are modal dialogs anyway? Sure, a modeless "Are You Sure You Want to Quit Bar" would be pretty lame. For the most part, though, users are becoming less tolerant of dialogs being shoved in their faces, obscuring their content, and demanding their precious attention.
