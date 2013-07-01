---
author: allen
comments: true
date: 2008-03-29 21:35:00
layout: post
slug: c-getting-lambdas-and-closures
title: C++ getting lambdas and closures
wordpress_id: 295
categories:
- Link
tags:
- C++
- Expressive Programming
---

I've been following the evolving C++0x standard, and although it's been adding a lot of new features, I didn't expect this one: [lambdas and closure syntax](http://herbsutter.spaces.live.com/blog/cns/). Well, more like existing C++ syntax forged into lambdas and closures.


> 

>     
>     // Writing a collection to cout, in C++0x:
>     for_each( w.begin(), w.end(),
>                     [](const Widget& w) {cout << w << " ";} );
> 
> 



Some think that C++0x is adding excess complexity into an excessively complex language. That may be so, but man it would be nice to be able to use some of these features as a game developer restricted to C++.
