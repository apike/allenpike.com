---
author: allen
comments: true
date: 2009-10-17 21:20:33
layout: post
slug: i-am-not-a-contact
title: I am not a contact
wordpress_id: 892
categories:
- Article
oldtags:
- Google
- OS X
- User Interface
---

![The "me" label in Address Book. A bit more obvious when it's blown up 400%.](/images/wp-uploads/2009/08/me_card.jpg)The Address Book on OS X has an interesting little feature where one contact is designated as the "Me" card. The card is filled for you when you set up your OS, and there is an API to get this information. ((`ABAddressBook`'s `me` method returns an `ABPerson` that represents the currently logged in user.)) In the same way, Google creates a "Me" contact for you in your GMail contacts that their APIs can reference. The problem is that the vast majority of users don't know this feature exists. Worse, some users who are aware of it still don't realize what's going on when this data gets out of date.

When I was first playing with Google Talk, I initially set my display name to something silly. Ages later, I realized that my Google Reader social features were labeled as being from "Growser". ((I called myself "Growser" because that week rumours about Google Chrome were hot. The rumours were accurate, but with no name to attach tothe browser at the time, I thought it would be funny if they'd called it "Growser". I said it was silly.)) What the hell Google? It took me **3 years** of searching — admittedly, not full-time — to figure out where this setting was coming from: the Me card in the Contacts portion of GMail. Only then did I make the connection that on multiple occasions I'd received email from GMail users with bizarre "From:" names that I wouldn't have expected them to use.

For iWork.com beta's initial release, we used the Me card to send emails from you when you invited users. This worked, but even as a developer who knew what was going on, it was never intuitive to me how to change my outgoing email address or name for iWork.com invitations. Starting with the latest iWork update, we use your Apple ID information when sending emails and things are much happier.

In both cases, there was a more obvious place for the user information to be expected. OS X users have the Users preference pane, and Google users have the Google Profile page. They might not be familiar with them, but they're on a pedestal that makes them easy to find. So, do your users a favour. If you're going to keep information about them, make it really clear where they can go to update it. And if you have API access to some user information, make sure they know where that information can be updated, or they'll surely blame you.
