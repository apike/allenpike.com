---
author: allen
comments: false
date: 2006-11-22 01:01:22
layout: post
slug: fantasytech-3-goto-fun
title: 'FantasyTech 3: GOTO FUN'
wordpress_id: 107
categories:
- Article
- Best Of
tags:
- Experience
- Games
- Software Engineering
---

![FantasyTech 3 Menu](/images/wp-uploads/2006/11/ftech-menu.jpg)Of all the things I've written in my ten years of programming, my first big project, FantasyTech 3, was one of the most provoking. I like the word provoking because it doesn't say something is good, just that it provokes.

FantasyTech was a huge, unmaintainable, frightening hack job that seemed like it was written by a 13 year old. Mind you, I was 13 when I wrote it. It was a pretty archtypical text adventure game, featuring about 200 locations, a battle system, various stats, spells, random encounters, a market with trade routes, simple puzzles, and more. In retrospect, from someone who (at the time) was never taught how to program, nor ever read a book on programming, it was somewhat impressive. What's best, it was written in a tiny subset of QBasic.

For those who aren't familiar with QBasic, it was a simple BASIC interpreter that came as part of DOS. Since I had no manual, all I knew of were the simplest four Basic commands: IF, GOTO, PRINT, and assignment (=). In a couple cases when I knew I needed something (such as COLOR and RANDOMIZE), I'd find it in the extremely simple function reference; but virtually all the code was those four basic commands. I simulated many things programmers take for granted - includes, loop structures, and even (at first) functions. My code in some ways was pretty close to assembler... except in BASIC.

![FantasyTech 3 Battle](/images/wp-uploads/2006/11/ftech-battle.jpg)The biggest challenge I had was probably with code size. One day I was happily coding along, writing thousands of lines of code (I didn't even know what a data structure was, so things got loooong...) Then suddenly, the program wouldn't run, giving the error "Module level code too large". Wtf?! What does that even mean? It turns out that QBasic could only interpret source files that were 100KB long. My heart was crushed - the game was far from complete.

After a couple weeks of thinking, searching, and a trip to the library, I devised a way to forge on. I split each area of the game into a separate program, and when you moved from one area to another, it would save your game to a text file, quit, load the next program, and load your game. It was a big hack, but it worked! ![FantasyTech 3 Location](/images/wp-uploads/2006/11/ftech-location.jpg) The only problem was that I had to copy and paste the huge pile of "common" stuff (the battle system, options screens, etc.) into each program. This of course was a giant pain when I wanted to change some common code, and had to change the same thing by hand in all 7 game files.

For _some_ reason I stuck with it for a year or two, and we even tested it extensively. During this time my brother Joel found one of my favourite bugs of all time: a nomad would offer you a wager, and you got to say how much you bet. Joel, being a great tester (albeit 10 years old at the time) bets -99999 gold pieces, and "loses" -99999 gold pieces... making him instantly rich. D'oh!

In the end, I distributed it on floppy to my friends for something like $2 each. It was such an amazing feeling to have actually completed something so big, and be able to say "this is done". At the time, I calculated that my earnings were less than one cent per hour - definitely worth the pay.
