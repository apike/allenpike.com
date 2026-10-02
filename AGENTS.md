Principles for working in this blog repo:

- Do not write or change prose unless asked. This is a human-written blog.
  - However, flagging prose, links, or other content that seems clearly incorrect or suboptimal is helpful.
- Commit messages are to be short and sweet, typically provided by a human.
  - You can add concise details if it feels necessary (especially if major code changes were involved), but keep commit messages short and sweet.
- Pushes to origin main will deploy the site, which is almost always desirable for typo fixes and other obvious improvements.
  - Code changes and higher-stakes changes may merit a PR, which will create a preview deploy.
- Don’t break the RSS feed or trigger all past posts to become unread by a minor change.
  - The feed has tens of thousands of subscribers AND powers the mailing list, so changes that affect it must be tested well.