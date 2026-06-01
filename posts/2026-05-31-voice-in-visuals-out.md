---
layout: post
author: allen
title: "Building for Voice In, Visuals Out"
summary: "Flashes of brilliance, and the tyranny of latency."
date: 2026-05-31T23:45:30.955Z
image: "/images/2026/audio-timeline.jpg"
tags:
  - llm
  - products

---

Recently, [Andrej Karpathy argued](https://x.com/karpathy/status/2053872850101285137?s=46) that the ideal interaction pattern for AI models is **voice in, visuals out**:

> Audio is the human-preferred input to AIs, but vision is the preferred output from them. Around a ~third of our brains are a massively parallel processor dedicated to vision; it is the 10-lane superhighway of information into brain.

The claim is that while “text in, markdown out” is the mode most people use LLMs today, what we should be building toward is a Jarvis-like mode where we primarily speak to AI – and it primarily responds with UI, video, or other visuals.

Let’s check in on where we’re at for both halves of this claim: visuals as output, and voice as input.

## Visuals Out

Humans love looking at things!

While it can be convenient to be able to listen to our computers speak, waiting through a voice response feels kinda… ugh. You can increase the speaking rate, but fundamentally, the fastest way for a computer to give humans information is to display it.

We’re faster at reading text than we are at listening, but that's just the start. There’s a good reason computers long ago evolved past text-only terminals: [richer interfaces are often faster, clearer, nicer, and more useful](https://allenpike.com/2025/post-chat-llm-ui/). The power of human vision has facilitated a rich history of computers showing people stuff.

At first, LLMs [weren’t great at producing visuals](https://simonwillison.net/tags/pelican-riding-a-bicycle/), often spending many tokens to produce half-baked results. However, Anthropic’s Thariq Shihipar recently wrote how [HTML is increasingly a viable output format](https://claude.com/blog/using-claude-code-the-unreasonable-effectiveness-of-html) to supplant Markdown, for certain model responses. This is great, since HTML is a powerful way to show visuals.

Going beyond text can give us dynamic:

- Hierarchy (sidebars, columns, navigation)
- Exploration (drill ins, filters, expansion)
- Direct manipulation (scrolling, dragging)
- Data visualizations (graphs, charts, dashboards)
- Mockups and prototypes (show, not tell)
- Illustrative images and video (pelicans, bicycles)

Thus the DOS era of AI begins to end.

While it will be a while before general-purpose agents consistently return compelling HTML in response to arbitrary requests, visual responses are already practical for vertical agents – it helps to do one thing well. Recent months have seen a noticeable uptick in AI features producing useful diagrams, charts, sliders, and so on.

So, yep. Visual output is a natural fit for AI, and we're already going beyond plain text.

## Voice in

On the other hand, most people are ambivalent about the idea of talking to AI. We were promised the Star Trek computer, or Jarvis, but so far we’ve gotten [Siri](https://daringfireball.net/2025/03/something_is_rotten_in_the_state_of_cupertino?utm_source=chatgpt.com) and automated spam calls.

There’s merit to the skepticism. Fundamentally, voice is never going to be the only input mode for computers. Just as we sometimes need voice because our hands are occupied, other times it’s impractical to speak aloud for social or confidentiality reasons. And even when we *can* speak, voice alone isn’t enough – effective computer use will always require more precise inputs, such as mouse clicks and drags.

However, voice is a deeply human and useful input mode. For example, it’s excellent for getting out our not-yet-organized thoughts and observations. While ChatGPT voice mode is substantially dumber than its text mode, it can still be useful for organizing your thoughts – advanced rubber-ducking.

Compared to text, speech also contains additional nuance and detail.

Voice is not just words – it’s intonation, timing, tone, pitch, energy, and emphasis. Where a transcript would only see `okay`, how you voice the "okay" might convey “Sounds good!”, “Tell me more”, “I kind of doubt that.” or “Get the hell out of my office.” This is why we call somebody if we need to have an emotional conversation, rather than sending misinterpretable text messages.

We speak faster than we type in terms of WPM, so together with the additional details in our voice, we simply put out more information per second via voice than from a keyboard.

## The Tyranny of Latency

So, great. Talking to AI and having it respond with visuals are both natural and highly useful. Why aren’t we doing this all the time?

If you’ve actually used AI voice systems, you’ve probably noticed that they’re usually slow, dumb, or both.

In order to feel fast, we’ve [known since the 60s](https://www.nngroup.com/articles/response-times-3-important-limits/?utm_source=chatgpt.com) that computers should respond within about 100ms, and that in order to keep users’ sense of flow, they need to respond within about 1000ms (1 second). Even before networks and giant neural nets, it could be a challenge to hit these bars.

But voice AI adds a substantial new hurdle. Humans are more sensitive to lagged voice than we are to lagged visuals. For a fully fluid voice conversation with interruptions going both ways, the latency bar is about 200ms. More than that, and interruptions feel janky and annoying. You’ve experienced this on voice calls with other humans: if there’s a noticeable lag and you’re stepping on one another’s words, you back off into a more stilted turn-taking conversation style.

At best, this is what we get with common AI applications today: slow, single-duplex turn-takers. They listen until it seems like you’ve stopped, generate a response, then stream until it sounds like you’ve started saying something, at which point they abruptly stop. 

While 200ms is a long time in traditional computing terms – a smooth animation frame needs to render in just 16ms – you'll find 200ms is not a long time to do the complex work of sending a user's voice over the network, making sense of it, generating a voice response, and sending it back.

In order to achieve the required latency, applications generally do voice inference with rather small models. The most advanced voice model most people have tried, ChatGPT’s rather outdated voice mode, is profoundly dumb compared to GPT 5.5 or Claude Opus 4.8. Even if you understand why this is the case, it’s fun to watch [that guy who awkwardly gets it to misadvise him](https://www.instagram.com/p/DWUs-hnAZpo/)[^1].

But there is hope. Earlier this month Thinking Machines gave a preview of their approach for realtime voice models, which they call [Interaction Models](https://thinkingmachines.ai/blog/interaction-models/). These are full-duplex systems, which means we're finally getting simultaneous perception and generation.

<iframe style="width: 100%; aspect-ratio: 16 / 9; margin: 0 auto;" src="https://www.youtube.com/embed/A12AVongNN4?si=LK3gBMfximxQtiia" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

Rather than switching between generation and listening, these streaming models slice time into 200ms chunks, interleaved continuously. While 200ms isn't enough to generate a very smart response, that fast streaming model can call slower, smarter models to do things like lookups, reasoning, and generating artifacts – then return the results in 200ms chunks when they’re ready.

Now, this is all very exciting, and I’m excited to see where it goes. But despite the claim “The model instantly reacts to visual cues”, even their demo videos show a noticeable and sometimes awkward lag between stimuli and voice responses.

This is partly because it’s early – Thinking Machines was only founded last year. But it's partly because humans are just that sensitive to voice delays. It’s a fundamentally difficult problem.

However. Humans are *less* sensitive to laggy visuals. Since visuals are less intrusive than a voice response, you get the more permissive 1000ms response budget that we’re used to when building computer programs.

This is convenient, since voice → visuals is a great interaction mode.

## Voice In, Visuals Out

The good news is that you don’t need to wait for Thinking Machines or any other model advances to build useful voice in, visuals out experiences today.

Here’s a quick example of what voice in, visuals out can feel like: not a chat, but a live visual representation of what you're working on.

<div class="centered">
<video loop playsinline controls style="max-width: 100%;">
  <source src="/images/2026/voice-in-demo.m4v" type="video/mp4">
</video>
<span class="caption"><a href="https://cedarloop.ai/">The Cedarloop voice agent</a> can help outline notes, file bugs, and do other in-meeting work.</span>
</div>

Here are a few latency approaches to keep in mind if you're working on voice-in, visuals-out agents:

1. The underlying model needs to be very fast. Any slower than p50 latency of 700ms and p95 of 1200ms will feel janky. Meanwhile, it’s common to see small requests on “fast” models that have over 5000ms of p95 latency 🫠
2. You need to send uncomfortably short time slices for inference. Err on the side of sending incomplete text rather than waiting for two-second pauses, and use context engineering to have the model heal any errors.
3. Keep your context prefixes stable, so they can be well-cached. 90%+ of our input tokens are cached, and thus far faster (and cheaper) than if we were sending fresh context every request.
4. Tokens are slow, and HTML is token-heavy. Realtime visuals-out needs to use efficient formats out of the LLM, which can then be displayed in a rich web or native view.

Get it dialled in right, and you can build delightful-feeling experiences.

If you’re working on these kinds of realtime apps, I’d love to chat – happy to share what we’ve been learning, and hear what others have been finding.

[^1]: GPT-Realtime-2 recently launched in the API with “GPT-5-class reasoning,” but is not in ChatGPT yet. And so far, Claude has no realtime multimodal model at all.