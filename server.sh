#!/bin/sh

docker run --rm \
  --volume="$PWD:/srv/jekyll:Z" \
  --volume="jekyll-bundle:/usr/local/bundle" \
  --publish 4000:4000 \
  --init \
  jekyll/jekyll:4.2.0 \
  sh -c "
    trap 'exit 0' SIGINT SIGTERM
    bundle_version=\$(grep -A 1 \"BUNDLED WITH\" Gemfile.lock | tail -n 1 | tr -d ' ')
    gem install bundler:\$bundle_version
    bundle install
    exec jekyll serve --trace
  "