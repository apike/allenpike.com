---
author: allen
date: "2018-01-31 20:00:00"
layout: post
slug: "blockchain"
title: "Chain of Fools"
summary: "We dive into smart contracts - and bananas."
image: "/images/2018/bananacoin-square.jpg"
categories:
- Article
tags:
- choosing
- startups
---

I'm officially sick of hearing about blockchain.

As the recipient of various “idea for an app” emails every week, I don't have much patience for get-rich-quick schemes. Suure, you’re going to put hyperlocal photo messaging “on the Bitcoin”, good luck with that, don’t talk to me or my son ever again.

Recently though, things have shifted on the blockchain front. After two years of monotonically increasing hype and my corresponding antipathy, I've started to get uneasy. While you can (and should) dismiss Bitcoin as a structurally unsound bubble of cosmic proportions, there’s an aspect of blockchain technology that is harder to understand, and thus dismiss: **smart contracts**.

As fun as it is to kick back and laugh at dumb tech fads, it is important to first understand *how* and *why* they’re dumb, so we can mock them soundly and accurately. Before I could let “blockchain” join “bitcoin” in my Twitter mute-filter dungeon, I needed to go on a journey. I needed to understand what smart contracts actually are, what they mean for the blockchain, and confirm whether or not they're just the latest foolish escapade fuelled by a few billion dollars of VC crack.

## Into the abyss

Dutifully, I dug in. Over the last month I’ve read hype pieces and cautionary tales, perused specifications and white papers, and even went to the extraordinary step of talking to [somebody who actually knows what they’re talking about](https://twitter.com/expede). I am now a world expert in blockchain, and I have news for you: it’s bananas.

Specifically, 1kg of bananas, grown in Laos, by shady Russians. Maybe.

Maybe grown, that is. They’re definitely shady Russians.

Let me introduce you to [Bananacoin](https://bananacoin.io/)! In their own words, Bananacoin is:

> The first environmentall friendly plantation in Laos which has released a utility token based on Ethereum, pegged to the export price of 1 kg of bananas.
> 
> Banana plantation is a real proof asset with blockchain inside. It is new technology of the agricultural sector.

<img src="/images/2018/bananacoin.jpg">

At first I thought Bananacoin must be parody, but it is in fact [more ridiculous than parody](https://twitter.com/zackbloom/status/954595391785201666?ref_src=twsrc%5Etfw&ref_url=http%3A%2F%2Fwww.grubstreet.com%2F2018%2F01%2Fbananacoins-are-a-cryptocurrency-linked-to-banana-prices.html) &ndash; it is a blockchain startup in 2018. As of this writing they have supposedly raised $1.9 million sight-unseen for unregulated Laotian banana futures.

They have a handy FAQ. What if there is a bad harvest? There won't be. What if the price drops? It won't. Why use blockchain at all? "[Good question.](https://bananacoin.io/faq/)"

Wait.

Why am I talking about Bananacoin? This piece is supposed to be about how smart contracts work and whether they're good for anything. Unfortunately, trying to discover what blockchain might *actually be good for* is incredibly difficult when 99% of the news about it is a relentless hurricane of irrational exuberance and exuberant meltdowns. Whether it’s government crackdowns, Bitcoin’s rise to $20,000 USD and immediate crash of over 50%, or the latest coin to “exitscam” investors that [simply replaced its website with the word “penis”](https://www.reddit.com/r/Buttcoin/comments/7tn6ld/a_shitcoin_startup_called_prodeum_just/), crytocurrencies and ICOs are a staggering shitstorm right now.

Thankfully, we can actually ignore that part. Bitcoin is a ponzi scheme, ICOs are basically just unregulated securities, and getting involved in all that today is like investing in tech stocks in 1999: you're gonna have a bad time.

Let's just put that aside for now. The actually interesting thing lurks under all this chaos: smart contracts.

## Here’s the deal

So, Blockchains are distributed databases. They store data in a peer to peer fashion, kind of like BitTorrent or Cassandra if you’re familiar with one of those. The clever thing is that blockchains use cryptography to maintain consensus in the system without the need for centralization. This lets them securely implement constraints like “no double spending” in a distributed way.

While this is a interesting theoretical property, it has one main application so far: digital currency. So Bitcoin is a thing, along with the million altcoins and shitcoins that followed it. We now have a veritable smorgasbord of digital currencies, providing 20-somethings worldwide a way to engage in irrational speculation and, occasionally, buy drugs. Blockchain 1, skeptics 1.

Things got a lot more interesting more recently though. In 2015, a 20-year-old (sketchy) Russian-Canadian (double-sketchy) launched the first blockchain to really matter: Ethereum. The key question behind Ethereum is: “What if a blockchain had a full scripting language?” The answer to that question so far has been, “Wait, this… this may change the technology industry forever. Maybe. We’re not sure yet. But just in case, take literally all our money.”

<img src="/images/2018/throw-money.jpg">


With smart contracts, blockchain can be good for more than just cryptocurrency. Smart contracts make it possible to securely run Turing-complete programs on the distributed system. These programs can make evaluations, write data, and perform financial transactions. Beyond being a distributed database of transactions, Ethereum is actually a distributed **virtual machine**. A globally decentralized secure computing platform. Which is pretty neat.

If you’re like me, your first question was probably: *wouldn’t that be really slow and inefficient and hard to program?* And it is. At least so far. You can throw a blockchain VM at a bafflingly large array of problems, but it will only turn out to be *good at* a farily narrow subset. The trick is figuring out what kinds of things this system is good for.

Even at this early stage, simple smart contracts are being put to use that benefit from the system’s decentralization, distributed trust, and transparency. Looking at these can help clarify what kind of industries and products blockchain may actually be useful for, and which applications are probably just dumb.

## Smart is in the eye of the beholder
Within like 30 seconds of smart contracts being a thing, people started making tokens with them. Tokens are simple smart contracts that put coins in your coins, so you can speculate while you speculate.

<img src="/images/2018/dawg.jpg">

More formally, a token is a unit of trade created within a blockchain. They can represent anything, really: assets or funds, commodities or futures, Air Miles or Laotian bananas. Before Ethereum, experimenting with a blockchain-based unit of exchange required you to create and coordinate an entirely new blockchain system. 

Now, you can spin up a standardized token just by filling out a boilerplate smart contract format called [ERC20](https://en.wikipedia.org/wiki/ERC20), then getting your script written to the Ethereum database. You simply implement six methods &ndash; `totalSupply`, `balanceOf`, `allowance`, `transfer`, `approve`, and `transferFrom` &ndash; and Satoshi's your uncle.

Since smart contracts really are little computer programs, a token can behave in almost any way you can imagine: it can award bonus tokens in certain contexts, it can mediate, facilitate, or automate transactions, or it can just [straight-up implement a ponzi scheme](http://ponzicoin.co/home.html).

Just like that, you’ve created the next great investment vehicle, scam, or… okay, let’s be honest, it’ll probably be a scam of some sort. But tokens are the biggest thing to happen to scams since the internet. Whee.

So cryptocurrencies make it easier to buy shady things, and smart contracts make it easier to offer shady investments. That’s great, but we have a strict no-shadiness policy at Steamclock (this policy actually exists and I’ll tell the stories of the clients that led to it another day).

Given that, I wanted to understand: what might Blockchain and smart contracts be good for that *may deliver actual value to people and businesses*? If smart contracts *can* do *anything*, what is *worth* doing with them? That’s the billion-dollar question, and there are some surprisingly plausible candidates for non-dumb applications of smart contracts. Things that are totally not scams that actual smart people are working on with real business cases.

## Three contenders
While blockchains' distributed security and trust models can facilitate shady behaviour, they seem to also be useful for combating certain types of shady behaviour. As far as I can tell, this seems to be where the most promising applications flow from. Beyond the "gimme" interbank finance applications, these are the three best examples I've seen so far:

**1. Supply chain management**

Modern supply chains are fiendishly complex, and offer countless opportunities for shadiness. Counterfeiting, lax quality control, mislabelled materials, adulterated ingredients, and the use of unethical labour are all difficult to track down and eliminate from a complex supply chain. Blockchains’ security, decentralization, and immutability could be useful tools in this space. You can’t stop suppliers from trying these things, but you could potentially trace back who is doing what, and cut them out of future deals.

Imagine you need 40,000 high-grade steel widgets ASAP. Today you might call up a supplier, and try to work out the quality, provenance, and location of the various widgets on the market. Alternatively, a blockchain could tell you that the parts you need are in a warehouse right down the street, what their purity and provenance are, and give you a traceable record of everyone who has contributed to its current state and location.

*Verdict: Maybe not dumb.*

**2. Trading digital art**

As art has moved into the digital world, we’ve mostly lost the idea of ownership &ndash; nobody really collects digital fine art. On a blockchain, though, it’s possible to encode and verify the ownership of digital assets. You can also track provenance, verify scarcity, distribute royalties, and even wire things up so partial proceeds of resales go back to the original artist.

In the last year people have used Ethereum to collect [punks](https://www.larvalabs.com/cryptopunks),  [weird art](https://www.artnome.com/news/2017/12/22/the-blockchain-art-market-is-here), and [self-replicating digital felines](https://www.cryptokitties.co/). There is a lot of exuberance in this space, but unlike the various token offerings, it tends less towards scams and much more towards experimentation and fun.

Also, the sheer novelty of using blockchain smart contracts to implement a genetic algorithm for breeding digital art is kind of staggering. Like, if you can do that, what else can be done? How weird and wonderful can it get?

*Verdict: Possibly dumb, but surprisingly neat.*

**3. Voting**

Now, we should always be skeptical of digital voting. That said, it sounds like blockchains’ transparency, security, and decentralization may make it the *least dumb* digital voting technology proposed so far. Using smart contracts, you can build an open-source voting system that allows people to cast secret ballots that they can still verify, and also make the system-wide tallies independently verifiable by any party.

While digital voting is still terrifying, and the incentives to subvert the system are high, the prospect of securing votes on a blockchain is at the very least intriguing.

*Verdict: Possibly the least dumb attempt in this space. But maybe still dumb. Time will tell.*

## The beauty of the unknown

The smart contracts of today are notoriously hard to write, often expensive to execute, and in many ways are a multi-billion-dollar science experiment. But that’s what makes them kind of interesting: they open up so many potential applications that people are going to have to actually try some of them in order to suss out what actually works. And that’s kind of exciting.

Of course, actually investing in any of these businesses at current valuations would be absurd &ndash; this stuff is hairy enough right now that the Apple or Amazon of smart contract platforms could be a decade out. And my personal specialty, building delightful product experiences, is probably best applied later in the tech cycle than "wait, what if this isn't dumb?" But after a bit of time, maybe a lot of time, blockchain really might drive major changes in how some businesses function.

In the meantime though, I think it’s safe to kick back, eat a Laotian banana, and get back to enjoying blockchain for [its entertainment value](https://www.reddit.com/r/buttcoin/). Oh hey, it looks like the company most responsible for Bitcoin’s recent rally [may just be a sham](https://www.bloomberg.com/news/articles/2018-01-30/crypto-exchange-bitfinex-tether-said-to-get-subpoenaed-by-cftc), and Facebook [just banned cryptocurrency advertising](https://www.cnbc.com/2018/01/30/facebook-ban-on-bitcoin-ads-latest-in-very-bad-day-for-cryptocurrencies.html). What a time to be alive! 🍿
