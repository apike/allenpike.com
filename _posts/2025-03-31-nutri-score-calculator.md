---
layout: post
author: allen
title: "A Score for Snacks"
summary: "The Nutri-Score, and a calculator for it."
date: 2025-03-31T23:45:30.955Z
featured: false
image: "/images/2025/nutri-score.jpg"
tags:
  - overboard
---

Recently, I was in the grocery store with my kids, looking at granola bars.

“DAD can we have *these* in my lunches?” My 8-year-old was waving a box of birthday-cake-flavored granola bars.

“Uh, birthday cake? Will that actually keep you full?”

Before I could read anything on the box, my 5-year-old interjected. “No we should get THESE!” He thrust a box of fruit snacks at me.

As I attempted to parse the box’s claim that it is “100% fruit!” and thus healthy, the kids quietly inserted more dubious packaged snacks into our cart. *Is chocolate-drizzled worse than all-sugar no-protein? Is this one’s higher sugar proportional to how much larger the bars are?*

I made some guesses about which boxes were the worst, and resigned myself to accepting the rest. Birthday Cake 1, Dad 0.

We all know we’re better off eating whole food, not packaged snacks. But also, we’re human. Sometimes we’re busy. Or tired. Sometimes we need (or want) a packaged snack. So to mitigate the downside, we want to gauge whether a given snack is:

1. Roughly fine for you in moderation – at least it’ll keep you full, or
2. A 100% organic, no-artificial-colours, all-real-ingredients, now-with-more-protein candy bar

In 2020 I had the same question about cereal, and [did a deep dive](https://allenpike.com/2020/unified-theory-of-cereal). The time has come to do the same for snacks!

So I recently set out to devise a formula. I wanted to take into account the relative benefit and harm of foods’ nutrients, relative to how filling the various choices are. I set out to update myself on the latest nutrition evidence, and use that knowledge to create and refine an algorithm that would give me… wait. Wait a minute.

*Has this been done before?*

Yep! Over the last decade nutritionists have increasingly been developing and refining formulas for distilling what we know about products’ healthiness into a score. And some of those formulas are now proposals for front-of-box food packaging!

There are a few of these, but the most prominent is the **[Nutri-Score](https://en.wikipedia.org/wiki/Nutri-Score)**.

## The Nutri-Score

The Nutri-Score is the most widely adopted nutrition scoring system for packaged foods. It’s informed by science, and recommended by multiple governments in the EU as a front-of-package nutrition label. Unlike some food-scoring systems, it doesn’t seem to have been totally undermined by lobbyists in the meat and dairy industry. And the labels are pretty clear.

<div class="centered">
<img src="/images/2025/nutri-score.jpg" alt="Nutri-Score package examples" />
</div>

The algorithm normalizes different options by portion size, assigns “bad” points for sugar, saturated fat, calories, and sodium, then subtracts “good” points for fibre, protein, and whole fruits & vegetables. The result is a letter grade – A through E for how reasonable the food is. Imperfect, but rather helpful.

In practice, foods that are filling and have a good nutrient profile tend get good Nutri-Scores, and foods that are short-lived insulin bombs tend to get poor ones. It’s roughly the same formula I would attempt to run in my head in the grocery aisle, but printed on the box.

While we’re a ways out from a similar system being on packages in the US and Canada, checking the score for some of your favourite snacks can be illuminating. Or horrifying.

## A Snacky Happiness Calculator

Since there are no nice Nutri-Score calculators online that take the kinds of units that are listed on North American food packages, I built one.

The [Nutri-Score Snack Calculator](https://nutri-score.allenpike.com/) shows the scores of a few dozen example breakfast cereals and snack bars, and lets you enter any other packaged food to see how it stacks up.

The scoring order of the cereals was very similar to my own analysis from 2020, but I found a few things surprising about the snacks’ scores:
- It is very hard to make a snack bar that gets a good Nutri-Score!
- The flavour of a snack bar – birthday cake vs. peanut butter – makes much less of a difference than the brand and line (say, Nature Valley Crunchy vs. Larabar)
- A lot of bars try to make up for the fact they’re calorie bombs by adding a lot of protein. The nutritionists behind Nutri-Score specifically disapprove of this, and ignore protein for foods that exceed a specific “bad” threshold. Thus, a lot of protein bars get a poor grade.
- Some comparison snacks I thought would do terribly (goldfish crackers, fruit rolls) were no worse than the snack bars.
- If you’re putting Quaker Dipps bars in your kids’ lunch, consider upgrading to a healthier option: Oreos. 🤯

The Nutri-Score system is imperfect – for example, it could try harder to reward less-processed food, and have a more gradual penalty for protein-laden junk food. But all said, I think a labelling system like this is far better than nothing, and once it’s there it can be further refined and iterated as our still-limited understanding of health and nutrition improves.

Maybe, in time, we can be spared the torture of attempting to do math in the grocery isle as kids try to stack your cart with hidden sugar bombs.

In the meantime, I’ll have a wary eye on any and all snack bars.
