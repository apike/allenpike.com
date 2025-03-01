---
layout: post
author: allen
title: "JavaScript Fatigue Strikes Back"
summary: "The new frameworks will continue until morale improves."
date: 2025-02-28T23:45:30.955Z
featured: false
image: "/images/2025/too-many-frameworks.jpg"
tags:
  - choosing
---

In recent months, I’ve returned to writing code daily. It’s been a lot of fun. While I enjoy Swift, Python, and Ruby, we’ve been building in TypeScript lately since it’s a good fit for our latest project.

After about a decade away from regularly writing JavaScript, it’s been fun to catch up on ten years of progress all at once. For example:

1. React has evolved from a little experiment thought to boost performance, into a sprawling ecosystem thought to hinder performance.
2. Platform features like ES Modules, `fetch`, view transitions, and `async`/`await` have made the web a nicer platform to build directly for
3. Serverless has gone from a wild new idea to well-understood
4. Cursor is especially good at working in TypeScript, which mostly eliminates boilerplate tedium
5. Modern build and packaging tools like vite, pnpm, and esbuild have made the tooling around JS nicer and much faster
6. All of the above has taken universal JS – sharing code between the client and the server – from barely-possible to well-supported

These changes have each boosted the ecosystem in its own way. And each has fuelled one dynamic that has not changed: **choosing the right JavaScript framework is hard, man.**

Ten years ago, [I sought to understand why no Rails-like JavaScript framework had arisen](https://allenpike.com/2015/javascript-framework-fatigue) – something featureful, well-maintained, and a good default choice for startups building new products. The problem was that, unlike Ruby, PHP, or Python, most JavaScript needs to run in the browser. Historically, this put an evolutionary pressure on JavaScript frameworks to be small and bereft of legacy code, rather than expansive and featureful.

Although we still want to avoid sending browsers a lot of JavaScript, a huge ecosystem change in recent years has changed the evolutionary pressures on JS frameworks forever: the unification of client and server.

## What if we rendered… *on the server?*

“Oh wow, rendering your templates on the server? You say it can greatly improve page-load speeds? Who would have thought?” said the Rails developer, eyes rolling directly out the top of their head. “You mean browsers can display HTML?”

Of course, web developers have been rendering HTML on the server since the days of `cgi-bin` in the 90s. Until recently, though, there has been an impedance mismatch between your application code that does the initial render on the server, and any separate-but-tightly-coupled logic that renders further interactions and updates in the browser.[^client] Even if both sides were in JavaScript (say, an EJS server that generated React-powered pages) the conflicting runtime environments made sharing any logic between them pretty janky.

This friction has led to the common view that each web application should be either almost entirely server-rendered with very little client JavaScript (Rails/Hotwire), or almost entirely client-rendered with the server mostly vending an API (React SPAs). Both approaches have downsides, but they work, and it’s best that you choose one.

Or at least it was, until recently! In about 2021 key browser APIs, particularly `fetch` and `import`, became well-supported on the server – both in node.js, and in edge environments like Cloudflare. Suddenly, sharing libraries and UI components between server and client went from science experiment to mainstream. You could have apps that were mostly server-rendered, but then that same code could instantly update the UI at runtime in the browser. Or apps that were mostly client-rendered, but later moved piecemeal to the server to improve performance. The holy grail of a unified codebase is now possible.

This has driven a generation of “meta-frameworks” that add routing, data fetching, and server-side rendering to existing client-side JavaScript libraries. While at first these were themselves a bit janky, they’ve in many cases evolved to the level of [official default](https://react.dev/learn/creating-a-react-app):

> If you want to build a new app or website with React, we recommend starting with a framework.

The React docs encourage folks to consider Next.js or React Router for new projects.

1. [Next.js](https://nextjs.org/) is more popular, and maybe as close as we’ve ever gotten to an industry-default, batteries-included JavaScript framework. However, it’s a bit… gnarly? And is best supported on Vercel’s serverless platform, which might make you nervous about lock-in or limitations.
2. [React Router](https://reactrouter.com/) (née Remix) is maybe more elegant and platform-agnostic, but is currently negotiating some growing pains as it works through the recent [React Router / Remix merge](https://remix.run/blog/merging-remix-and-react-router).

However, there are at least three reasons you might not want to choose one of these frameworks:

1. These frameworks integrate deeply with React, but are developed independently. This means that if you follow their development you can see additional thrash arising from these seams[^1].
2. Alex Russell says that [using React in 2025 makes you a bad person](https://infrequently.org/2024/11/if-not-react-then-what/) due to performance baggage.
3. These frameworks support server-side rendering of HTML, but are not particularly suited to building complex backend APIs that do stuff like background processing or websockets.

## Going boring

Okay, so there isn’t one obvious default framework to choose. So how do we make a choice?

When we choose to adopt any new dependency – whether it’s a framework, library, or any other tool – we are making a bet. We’re gambling that the velocity gain from this new tool will not be lost to its maintenance burden. If a shiny framework is overcomplicated, or poorly maintained for our needs, we’re gonna have a bad time.

That’s why the cool kids [choose boring, simple, and well-maintained technology](https://mcfunley.com/choose-boring-technology): you don’t want to be the first team to ever encounter Problem Y with Framework X. Nor do you want to be the last team stuck using an off-brand nuclear reactor after the community has jumped ship for more modern toys.

As far as I can tell, these are the closest we have to boring framework choices for building a JavaScript SaaS app today:

- **The Old School**: A React single-page app consuming an Express API backend. Well-trodden, but verging on antiquated given that it ignores a decade of improved tooling.
- **The Content-Centric App**: Next.js may be weird and chunky and Vercel-pilled, but its ubiquity could qualify it as a boring choice if you’re building an e-commerce or content site well-suited to serverless.
- **The Backend-Centric App**: If your app requires a complex backend for things like background processing or persistent connections, you might go with a well-maintained Express successor like Fastify or NestJS for a backend API, and one of the meta-frameworks for the less-complex user-facing parts.
- **The Vercel Objector**: If you can’t stomach Next.js but want server-side rendering with progressive enhancement, React Router Framework might be the most boring choice available. Hopefully now that Remix has merged into the very popular React Router, it will have a long life.
- **The React Objector**: If you want to share components between client and server but consider React deprecated, Svelte and Vue are relatively popular and clean enough that you could make an argument for them being boring. SvelteKit is a nice way to support Next-like SSR in Svelte, but starts to strain any definition of “boring technology”.[^2]
- **The Table-Flip**: There’s never been a better time to build a whole product in JavaScript or TypeScript, but some sites barely need JavaScript at all. For those, mature frameworks in other languages like Rails or Python FastAPI are pretty compelling.

So, yeah. There are still too many frameworks.

<div class="centered">
<img src="/images/2025/too-many-frameworks.jpg" alt="Too Many Frameworks" />
</div>

I think, though – and this may just be my innate optimism – that the situation has improved a lot. And now that the JavaScript ecosystem is building frameworks that can share code between the client and server but keep most of it from being sent to the browser, the next 10 years of evolution should be less disruptive than the last.

And today, we enjoy an embarrassment of riches: powerful tooling for a variety of use cases. Do I wish it would settle down and be a little more boring? Yes.

But it’s still pretty awesome.

*Thanks to [Jenn Cooper](https://www.linkedin.com/in/jncoops/) and [Brian Leroux](https://brianleroux@indieweb.social/@brianleroux) on their feedback on this post.*

—--

[^client]: As somebody who loves polish and delight I'm very keyed in to this, but sometimes people ask, "What do you even need client-side rendering for nowadays?" I think it matters most for products where folks are actively getting work done, where you want things like optimistic updates, offline mode, rapid workflows, realtime collaboration, and lovely little animations that warm your users' hearts.

[^1]: Just two recent examples: Remix started with its own server component model, but React later shipped React Server Components which has [changed a lot about the evolution path for React Router Framework](https://remix.run/blog/incremental-path-to-react-19). And Next.js 15 was built assuming React 19 would ship much earlier than it did, which led to [Next.js 15 depending on a pre-release React 19](https://www.reddit.com/r/nextjs/comments/1ge5ry8/vercel_pushing_react_19_rc_with_nextjs_15_a/), which just today I heard brought one Next developer to tears. Not controlling your most important dependency is hard!

[^2]: “Um, actually,” you might say, “Astro.js/&shy;Alpine.js/&shy;Hono.js/&shy;Preact.js/&shy;Lit.js/&shy;Solid.js/&shy;Nuxt.js/&shy;Flopsweat.js qualifies as boring technology because it’s good for my use case.” To which I say, “Hm, some of those frameworks do seem pretty awesome. Maybe I should just quickly prototype something…” at which point I get hooked off stage

