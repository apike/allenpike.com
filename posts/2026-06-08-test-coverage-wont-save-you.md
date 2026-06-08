---
layout: post
author: allen
title: "Test Coverage Won't Save You"
date: 2026-06-08T21:11:05.627Z
link: "https://forestwalk.ai/blog/test-coverage-wont-save-you-from-incoherence/"
categories:
  - Link
tags:
  - llm
  - forestwalk
---

Forestwalk's CTO Jenn Cooper shares [what she's been learning about tests](https://forestwalk.ai/blog/test-coverage-wont-save-you-from-incoherence/), after a couple years of increasingly coding with agents:

> Most discussions about AI-native development jump from this problem – agents' tendency to accumulate tech debt – directly to tests. ... Tests verify that code does what it did before.
> 
> Whether what it did was even the right way to do it is a separate question.

She argues that while agents make it easy to have rigorous traditional test coverage, at best unit tests maintain local code cohesion. At worst, they can actually make it harder to improve what agents are worst at: the wider coherence of the entire codebase.

So far I've been impressed with how effective the broader automated checks she describes can be to guard against agentic nonsense.