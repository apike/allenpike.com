---
author: allen
comments: true
date: 2009-07-25 12:36:30
layout: post
slug: arraysort-browser-differences
title: Array.sort browser differences
wordpress_id: 762
categories:
- Article
tags:
- Gecko
- Javascript
- WebKit
---

![WebKit says, "Boolean comparison functions? What the farmer?"](/images/wp-uploads/2009/07/sorting.jpg)Javascript's Array class has a handy function, `sort()`. You just pass in any comparison function, and it will sort the array for you. Therefore, the following code works:

    
    [3,1,4,2,5].sort(function(a,b) {
        return a > b;
    });


Or rather, it works in Firefox: it sorts the array to \[1,2,3,4,5\]. In IE, it seems to work at first glance: the 2 is out of place in the output. In Safari and Chrome, nothing changes at all. That's because Webkit requires the comparison function to return an integer rather than a boolean, otherwise it does nothing with no error. The correct code is:

    
    [3,1,4,2,5].sort(function(a,b) {
        return a - b;
    });


This will work in all browsers. Something to keep in mind if you ever get a "Sorting doesn't work in WebKit" bug and are scratching your head.
