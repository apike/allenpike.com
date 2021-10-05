---
author: allen
comments: true
date: 2010-03-02 01:09:07
layout: page
slug: engineering-faith
title: Engineering Faith
wordpress_id: 1480
---

![](/images/wp-uploads/2010/03/logo.png)
([Back to about Altering Time](/altering-time/).)

Political Asylum was a success, but the code was as bad as you'd expect from a teenager in the middle of learning PHP – although admittedly, it had [once been even worse](http://www.antipode.ca/2006/fantasytech-3-goto-fun/). I learned a hell of a lot about game design and web applications, and applied it all to my next web-based game: Engineering Faith.

In Faith, you designed your own religion. You could pick from dozens of rules, laws, and customs: are your followers nudists who have ten kids each, or are they ritually silent, tattooed warriors? You created beings for them to worship, places for them to worship, and acquired artifacts for them to venerate. All these things were constantly affecting your people's many attributes, which changed as time passed in real life.

As is common with [Second Systems](http://en.wikipedia.org/wiki/Second-system_effect), the complexity was a lot harder to manage than I expected. My new fancy algorithms interacted in such complex ways that the system often just felt like chaos. There were so many laws, programs, and attributes that balancing them all was a nightmare. The constantly-changing aspect of your followers was neat, but it wasn't that fun because most of the things you did affected their future rather than their present.

Of course it makes sense that announcing they should worship the new Macaroni God initially annoys them more than anything, but over years it works into their daily life. How fun is that though? It was neat that you could pick from 40 different laws to enact, each with their own consequences - but did you want to go through that every time you played? Probably not. I [proposed cutting the number of virtues](http://www.alteringtime.com/news/2007/virtuosity-more-faith-less-numbers/), but naturally got a lot of community protest: it would have turned almost everything on its head, and still might not have solved the problem.

Designing Faith by engaging the Altering Time community that had formed around Asylum was a lot of fun though. While it did have the side effect of feature creep, it also produced a lot of new ideas. For example, some rejected suggestions for the name of the game included:






* Holy Havoc

* Virtuous Reality

* Karmic Chaos

* Altaring Time

* Sects and the City

* Pope John Paul's Extreme Religion 2004

Another part of the process I really enjoyed was designing the 8 icons for your faith's virtues. [It was hard](http://www.alteringtime.com/news/2005/what-does-loyalty-look-like/), but in the end I think I came up with a set of visually distinguishable icons that worked together but were somewhat recognizable.

In the end, I have to categorize Faith as a failure. People played it, and had fun, but even though it looked better than Asylum, was coded better than Asylum, and had more potential than Asylum, it was never as fun. Maybe it eventually could have been ironed out, but [other things got in the way](http://www.antipode.ca/2008/appled/), and it never reached my goals. That said, it was one of the most educational, memorable, and fun failures I've ever had.

Below is a gallery of some of the more interesting bits of the Faith interface, with commentary about how the game worked.

### Laws

![](/images/wp-uploads/2010/03/all-laws.png)

Awesome, or ridiculous?

I think most people had a lot of fun when they first encountered these, reading them and thinking about what kind of faith they wanted. Re-doing them each time you played was less fun, unfortunately.

Putting together these laws was a lot of fun. I spent a lot of time trying to make it possible to model any religion, past or present, using these laws. I tried to make their effects somewhat reasonable, if sensational. I think people got a kick out of making their followers nudist warriors or silent monks.

### Artifacts

![](/images/wp-uploads/2010/03/artifacts.png)

Randomly-generated artifacts with various abilities and strengths could be found, bought, and sold.

### Beings

![](/images/wp-uploads/2010/03/beings.png)

The interface for creating and updating the beings you worshipped was always frustrating to use. Like many parts of Faith and Asylum, I think a Ajax interface could have made a tedious interface fun.

### Events

![](/images/wp-uploads/2010/03/events.png)

Architecturally, events were much better in Faith than in Asylum. There were various priorities of event that would be visible to others based on age, distance, and other factors. You could also pin events or clear them to clear up clutter.

### Laws

![](/images/wp-uploads/2010/03/laws.png)

Once you’d picked some laws, you could say how strictly people must adhere to them. The downside of having too many laws was Burden, which was a barrier to people converting to your faith.

### Places

![](/images/wp-uploads/2010/03/places.png)

Building and upgrading your Places of Worship was pretty straightforward, but players never got much sense of attachment to your various places, and more or less felt generic. This would have been better off if you just had the ability to upgrade aspects of all your places, but with more flair.

### Programs

![](/images/wp-uploads/2010/03/programs.png)

You could upgrade various programs that would benefit your people. One of the more reasonable UI bits in the game.

### Science

![](/images/wp-uploads/2010/03/science.png)

This mechanic worked quite well, in my opinion. As the game went on (Science always went from 1 to 200) various effects would come into play. Some were subtle, but some had a huge impact on the game, enabling new strategies or requiring some sort of countermeasure.

### Sidebar

![](/images/wp-uploads/2010/03/sidebar.png)

In Asylum, you had 3 main attributes. In Faith, you had 14. The effects and inter-relations of these Virtues were complex, dynamic, and interesting. A lot of the complexity of the game, in fact, came into play just from the consequences and the movement of these Virtues from generation to generation of your followers. This focus on mechanics over core gameplay was fatal.

Rather than strategies focusing on using certain mechanics or features of the game, they focused on attaining a certain mix of Virtues. This was not a design goal, but more a consequence of thinking about Faith too much as a simulation and not enough as a game.

So maybe you were going high military high birthrate, or maybe high economy high loyalty. Since most game mechanics could get you any Virtue, it sucked the life and identity out of any one mechanic. It was a hard lesson, but building and evolving Faith taught me more about what makes a game fun than I ever could have expected.

On the other hand, I loved those little icons.

### Virtues

![](/images/wp-uploads/2010/03/virtues.png)

Since Faith took place over millenia, and was based on ongoing effects like churches, laws, and beings, Virtues moved gradually. Every five minutes, you gained or lost a little bit of each Virtue depending on how you’d set up your faith. (I’ve written about the problems with the Virtues system on the Sidebar page).

It turns out that in games, people play for instant gratification. They want to click, and see an effect that they like. Unfortunately, in Faith, this display of your incoming Virtues was about as close as you got to instant gratification.

What people really loved, though, were the graphs. (The graphs broke badly from a server move and were one of the few things I couldn’t get a screenshot of.) Faith graphed your success over time compared to your neighbours, the average, and other metrics. You could graph any particular virtue you were interested in, too. It sounds plain at first, but never doubt how much people will love a graph of their awesomeness going up.
