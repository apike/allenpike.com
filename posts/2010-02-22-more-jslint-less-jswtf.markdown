---
author: allen
comments: true
date: 2010-02-22 12:35:03
layout: post
slug: more-jslint-less-jswtf
title: More JSLint, less JSWTF
wordpress_id: 1408
categories:
- Article
oldtags:
- Javascript
- Textmate
---

![](/images/wp-uploads/2010/02/wtfjs.jpg)The JavaScript community has been enjoying [WTFJS](http://wtfjs.com/) this week. Seasoned JS programmers know there are a few weird bumps and traps in the language if you're not watching. You can take some of the burden off yourself, however, by linting your JavaScript.

There are many JavaScript linting programs out there. As a counterpart to his book _The Good Parts_, Douglas Crockford maintains a tool called [JSLint](http://www.jslint.com/). Matthias Miller was inspired by this, and maintains a similar but less picky tool he confusingly calls [JavaScript Lint](http://www.javascriptlint.com/). If you want to go even further, there is the [Google Closure Compiler](http://code.google.com/closure/compiler/).

Take [this WTFJS caused by implied semicolons](http://wtfjs.com/post/393377619/im-certain-that-this-will-end-all-debate-about):


    
    function laugh()
    {
      return
      {
        haha: "ha!"
      };
    }
    laugh();
    // returns undefined



The lint programs will warn you (in different ways) that your return gets an implicit semicolon, and the object with "haha" in it never gets executed.

Or [this one](http://wtfjs.com/post/386167751/this-is-because-parseint-accepts-a-second-argument):

    
    parseInt('06'); // 6
    parseInt('08'); // 0



Lint will tell you that you can't use parseInt safely without specifying that you want base-10, or wrapping it in something that assumes base-10.

They'll also catch things like this:

    
    {
      "ping": "pong",
      "foo": "bar",
    } // IE says parse error on the last line of your file.
    // (It doesn't understand trailing commas, yay!)



and this:


    
    if (foo == bar) {
    {
      // You doubled a bracket.
      // Now need to round-trip to your browser to find out.
    }



You can save yourself from these wtfs and parse errors. All you need to do is have your text editor run a lint program instantly when you save your JavaScript. The excellent [JavaScript Tools Textmate bundle](http://github.com/subtleGradient/javascript-tools.tmbundle) does this for you using JavaScript Lint ((Even though JavaScript Tools says it's using JSLint, it's actually using the more lax JavaScript Lint.)), and is easy to set up. If Textmate isn't your favourite or you prefer the more aggressive JSLint, you can set up your own save macro on any editor worth its salt.
