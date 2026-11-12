# allenpike.com

Allen Pike's personal website, built with [Eleventy](https://www.11ty.dev/).

## Requirements

- Node.js 22.12 or newer (see `.nvmrc`)
- pnpm 10 (see `packageManager` in `package.json`)

## Quick Start

```bash
pnpm install
pnpm dev
```

The site will be available at http://localhost:8080.

## Commands

| Command | Description |
|---------|-------------|
| `pnpm build` | Build the site to `_site/` |
| `pnpm dev` | Build, serve locally, and watch for changes |
| `pnpm dev:cloudflare` | Build and serve through Wrangler, as Cloudflare would |
| `pnpm clean` | Remove the `_site/` directory |

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


