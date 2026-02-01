# allenpike.com

Allen Pike's personal website, built with [Eleventy](https://www.11ty.dev/).

## Requirements

- Node.js 20.x (see `.nvmrc`)

## Quick Start

```bash
npm install
npm run serve
```

The site will be available at http://localhost:8080.

## Commands

| Command | Description |
|---------|-------------|
| `npm run build` | Build the site to `_site/` |
| `npm run serve` | Build, serve locally, and watch for changes |
| `npm run clean` | Remove the `_site/` directory |

## Project Structure

```
├── _config/        # Eleventy config modules (filters, collections, markdown)
├── _data/          # Global data files (YAML)
├── _includes/      # Layouts and partials
├── posts/          # Blog posts (Markdown)
├── css/            # Stylesheets
├── images/         # Static images
└── _site/          # Generated output (git-ignored)
```

## Writing Posts

Posts live in `posts/` as Markdown files with YAML front matter. The filename format is `YYYY-MM-DD-slug.md`.

## License

The code in this repository (templates, configuration, CSS) is available under the [MIT License](LICENSE).

The content of blog posts and images is © Allen Pike. All rights reserved.

## License


