---
author: allen
comments: true
date: 2010-03-01 20:01:56
layout: post
slug: cassandra-too-fast
title: 'Cassandra: Too fast'
wordpress_id: 1445
categories:
- Link
oldtags:
- Databases
- Facebook
- NoSQL
---

Twitter's [Ryan King on the Cassandra non-relational datastore](http://nosql.mypopescu.com/post/407159447/cassandra-twitter-an-interview-with-ryan-king):



> We were originally trying to use the BinaryMemtable interface, but we actually found it to be too fast — it would saturate the backplane of our network. We’ve switched back to using the Thrift interface for bulk loading (and we still have to throttle it). 



Awesome.
