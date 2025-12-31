---
author: allen
comments: true
date: 2007-11-25 21:29:49
layout: post
slug: games-cores-and-functional-languages
title: Games, cores, and functional languages
wordpress_id: 247
categories:
- Article
oldtags:
- Consoles
- Expressive Programming
- Games
---

![](/images/wp-uploads/2007/11/lambdas1.jpg)This month an architect from EA Black Box gave a talk at SFU about parallelism on the modern game consoles. It seems these systems have so many cores and so much parallelism, C++ just can't cut it. Their findings were that the language is just too damn explicit, and no mere mortal could write C++ code that harnesses all that parallelism. He said they were lucky the Playstation 3 was so much more powerful than the 360, so they could optimize for the 360 and it would be sufficient for the Playstation.

For example, on these systems, you can do 20 CPU operations in the time that it takes to do one memory access ((So much for Big-O of CPU cycles being sufficient for analyzing an algorithm.)). Programmers think in terms of getting memory, then using memory, so this is a huge waste. They found that they their gurus could improve the performance of important functions by 40-400x, not by changing the algorithm, but by spending a month writing holycrap insane code that fully used all the cores and CPU features. Although that's useful, when games have a 1-2 year development cycle and thousands of functions, it just can't scale. He admitted that functional languages ((For those out of the loop, functional languages are very popular in academia, but see very limited use in the "real world" due to performance problems and their tendency to make weaker programmers' heads explode.)) should be able to solve these problems, but dismissed them because they would make many EA employees' heads explode.

So what if it makes EA employees' heads explode? Mop it up and get new employees! Don Stewart [says that the functional language Haskell is a great language for handling concurrency](http://cgi.cse.unsw.edu.au/~dons/blog/2007/11/26#no-headaches) ((I realize that a pro-Haskell link would be more compelling if it wasn't from a .edu domain, but what can you do.)):


> This is almost identical to code you would write ignoring concurrency: nothing scary is needed to write parallel Haskell!


I've only started learning Haskell this semester, so I don't have the experience to say this is a practical approach. I also have no idea how much work it would be to get a Haskell environment to take advantage of all the PlayStation 3 has to offer ((I severely doubt the standard PowerPC Haskell compiler would have impressive performance on PS3, and interfacing with C++ libraries like OpenGL would be an interesting endeavour.)), but at least it should be possible. It might even be testable on the Xbox with the current tools: [XNA](http://msdn.microsoft.com/xna/) lets you develop games using .NET languages, one of which happens to be F#, which is based on [OCaml](http://en.wikipedia.org/wiki/OCaml).

Obviously EA isn't going to fire their veteran C++ programmers and start moving to functional programming this decade. It might just be, though, that a small game development company making the right moves could compete with EA on performance using a lot fewer programmers. Then all we need is procedurally generated art...
