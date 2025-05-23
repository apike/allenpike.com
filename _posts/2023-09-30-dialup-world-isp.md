---
layout: post
author: allen
title: The Curse of Dialup World
summary: An acquisition gets weird.
date: 2023-09-30T05:45:30.955Z
featured: true
image: "/images/2023/dialup-broadband-chart.png"
categories:
  - Article
tags:
  - best
---

A long time ago – at the turn of the century, as kids would call it now – my first job was at a dialup internet service provider. Officially, I was hired to be a sort of errand-boy. Instead, the role was more interesting: a front seat for one of the great meltdowns of our time.

Here’s how it went down.

-----

The basic idea of dialup internet was that if you wanted to look up information, check email, or otherwise “surf the web” as people honest to god called it, your computer needed to call another computer over a phone line and play it [a cool sound](https://www.youtube.com/watch?v=abapFJN6glo).

As archaic as this may seem, it was a major improvement over what came before, which was having no internet at all.

The internet was so compelling, even in the early days, that subscription numbers grew wildly. Exuberantly. Running an ISP in 1999 was an intense but desirable job: all the graphs were going up and to the right. Fulfilling this prodigious demand, however, was tough: all those inbound calls could only be served if you had enough physical phone lines.

<div class="centered">
<img src="/images/2023/dialup-chart.png" style="max-width: 455px">
<p>Pictured: Dialup subscription numbers going to the moon</p></div>

That’s right – dialup required a separate physical phone line for every connected device. If this seems pretty bonkers, it was. The relentless flood of signups required wiring up new phone lines at unprecedented rates. Unused lines were an expensive waste, but insufficient lines meant people trying to connect would get a busy signal. Let that happen, and your customers are prone to cancel and go to a competing ISP that paid for more phone lines.

So let’s say you’re an ISP in 1999 called… Dialup World. You might look at your graphs and call up the regional telephone company saying, “We’re anticipating massive growth! Please install 20,000 more phone lines across these twelve towns.”

The telco might respond, “That would be fantastically expensive. We’ll only build those lines if you commit to pay for them for at least six years.”

As the ISP you might think, “Well, sales are up 400%. [If these trends continue…](https://www.youtube.com/watch?v=e6LOWKVq5sQ)” and sign the long-term contract. You might even take out some debt and produce a million dollar commercial telling everybody how great Dialup World is. You know – party like it’s 1999.

Unfortunately for you, it will eventually stop being 1999.

<div class="centered">
  <img src="/images/2023/dialup-broadband-chart.png" style="max-width: 455px">
<p>Pictured: Dialup meeting its new friend, broadband</p></div>


Fast forward a couple years. You realize you’ve way over-projected, the telco has already built your lines and is demanding payment, you can’t pivot to broadband fast enough, your lenders are very suspicious, and you’re headed for the wood chipper. “Dialup ISP. 20,000 customers, 40,000 phone lines. As is, all sales final.”

## Incoming trade offer

That’s where I come into the story. As it happens, my employer – a somewhat larger and shrewder ISP than Dialup World – had a strategy of buying smaller providers that were going under, amassing a bit of a dialup empire. As I understand it, this strategy not only let them acquire customers on the cheap, it meant that at a certain size, they could become Too Big to Fail™ in the eyes of the telco, to whom they were already paying eye-wateringly high sums for phone lines. Vendors will let a small fry go under, but are liable to renegotiate rather than let their biggest customer implode.

So our big fish ate a medium fish, feeling very clever snapping up Dialup World for pennies on the dollar. It was at that time I started at the big fish, initially as a sort of intern, shredding paper and stuffing envelopes. A couple weeks in though, I had a new assignment.

> There is a problem. We need you to take customer service calls.

You see, most Dialup World employees had been given notice that they would be laid off. Instead of being paid severance, they were asked to keep diligently working through their notice period. While some employees simply used these final weeks to slack off or raid their work PCs for harvestable components, one of the aggrieved chose to show their displeasure by posting the list of all Dialup World user accounts online – **along with every password in clear text**.

Initially, this meant anybody in the world could get free unlimited internet by dialling in with these passwords. Security quickly shut that down by changing every ex-Dialup World password to a random string, but this had a side effect: it effectively shut off 20,000 customers’ internet access and their associated email accounts. Without access to the internet or your email account, a password reset becomes challenging.

So, they called us. All of them. They were not happy.

For weeks, five customer service reps – or I suppose, four customer service reps and a teenage errand-boy – answered calls. The phone queues were full before we opened in the morning, and they were full when we had to close at the end of the day.

While occasionally we got a call about a billing question or service change, almost every call was the same: I’d politely ask how I could help. “I can’t get online!” I’m so sorry about that, I’ll reset your password for you. The calls blended into one another.

While the deluge did abate after a few weeks, a new type of complaint slowly rose in their place. These were also from Dialup World customers, and they were also angry, but they were much more mysterious. Here is one example that came in via email:

> I do not know how poor you are in order to ugly make your penies. Do you feel shame of making the money by your dirty way?

While the content varied, they always had a contentious billing complaint. At first I thought these might be people whose passwords we’d reset and were angry we were still charging them, but no. Over time the picture became clearer. We were all getting multiple calls and emails a day with a variant of the same story: “I canceled my Dialup World account a long time ago, who are you and why the fork are you billing me.” Something had gone wrong.

Now, when something doesn’t make sense, it pays to be curious. (If you don’t work somewhere that rewards curiosity, find somewhere else to work.) Sometimes you’ll investigate a mystery and find that the underlying systems are reasonable – you simply didn’t understand them yet. Other times, you’ll uncover something delightfully and poetically dysfunctional, as I did the day I learned about Dialup World’s former billing system.

## A way to bill subscribers

1. When a customer submitted their signup form to Dialup World, they would add a row for that new customer to their 20,000-row Excel spreadsheet.
2. Then, they would put that signup form in a pile with all the other signup forms of customers who had signed up on that day of the month.
3. Every day, they would find which one of the 31 piles of literal signup forms corresponded to that day of the month.
4. Then, they'd charge the customers in that pile, one by one, for a month of service.
5. When a customer called to cancel their service, they would stop that customer from being billed further by simply – I shit you not – finding that customer’s signup form and trashing it. No signup form in the pile, no more bills going out.

You gotta hand it to these people. The seminal startup essay “[Do Things that Don't Scale](http://paulgraham.com/ds.html)” didn’t come out until 2013, and these legends were doing things that didn’t scale way back in the late 90s. They got 20,000 signups billed with the process equivalent of a shoelace and a discarded sauce packet.

While the wild inefficiency of all this probably did not help with Dialup World’s eventual demise, I have it on good authority that the staff who were subjected to this deranged system at least had a good laugh about what would happen when we, as acquirers, inherited their tragic mess. We thought we’d bought 20,000 customers, but had in fact bought 20,000 mystery rows in a spreadsheet.

Within a couple years, most of the Dialup World “customers” had canceled. How many did so just because they upgraded to broadband? How many canceled because we leaked their passwords and locked them out? How many had already canceled years prior and were forced to cancel a second time by a colossal act of billing incompetence? Should the people who made this deal not feel shame of making the money by their dirty way?

A couple years later when – very predictably – our entire office was laid off, it tied a nice bow on my misadventures in ISP land, directing me towards ventures that were less doomed. I like to think, though, that I took away some valuable things from the experience.

While working in a dysfunctional environment can build bad habits, it can also grant a bit of perspective. It helps you to appreciate excellence when you find it, and remember the consequences dysfunction can bring. It can also teach you to be a little bit skeptical of plans that seem too good to be true – even if the graph is currently going up and to the right. Maybe especially then.


-----

*It was an interesting exercise to revisit this story 16 years after [I first recounted it](https://allenpike.com/2007/wanna-buy-an-isp). I considered removing that janky 2007 version, but maybe it’s an interesting reference for how my writing has evolved over the years. Maybe I’ll revisit this again in ’39.*

