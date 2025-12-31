---
author: allen
comments: true
date: 2008-08-06 19:18:34
layout: post
slug: better-tostring-in-javascript-and-prototype
title: A better object.toString() in Javascript
wordpress_id: 363
categories:
- Link
oldtags:
- Debugging
- Javascript
- JSON
- Prototype
---

When working in Javascript, I often come across a simple object that I want to dump to the console. In Firefox, you have [Firebug's great console commands](http://getfirebug.com/commandline.html), so dir() will solve your problem. In Safari or Internet Explorer, though, many of the methods that you'd hope to return a string representation of your object simply return "\[object myObject\]".

Thankfully, it turns out you can call [Prototype's Object.toJSON(myObject)](http://www.prototypejs.org/api/object/tojson) to get a crisp string representation of your object to dump to the Safari console, a simulated console, or even an alert(). Not the original intention of JSON, but it works!
