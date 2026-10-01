---
eleventyExcludeFromCollections: true
permalink: false
---

# Party position chart

Matplotlib recreation of `images/2022/vancouver-parties-graph-2022.png`.
The renderer exports a 1299 × 1406 PNG and a vector SVG with outlined text,
so the SVG does not require Avenir on the viewer's computer. The original image
is preserved; the recreation has `-recreated` in its filename.

## Run

From the repository root:

```sh
python3 -m venv /tmp/party-chart-venv
/tmp/party-chart-venv/bin/python -m pip install -r scripts/party-chart/requirements.txt
/tmp/party-chart-venv/bin/python scripts/party-chart/render.py
```

For another election, create a JSON file and choose an output path without an
extension. `--scale 2` doubles PNG resolution while retaining the same layout:

```sh
/tmp/party-chart-venv/bin/python scripts/party-chart/render.py \
  scripts/party-chart/my-parties.json \
  --output images/2026/vancouver-parties-graph-2026 --scale 2
```

## Input

```json
{
  "title": "2026 Vancouver Election: Charting the Parties",
  "credit": "Data: Your source. Presentation: Allen Pike.",
  "parties": [
    { "name": "Example", "x": -0.4, "y": 0.3, "mayoral": true },
    { "name": "Another", "x": 0.5, "y": -0.6, "mayoral": false }
  ]
}
```

- `x`: −1 is Left, +1 is Right.
- `y`: −1 is Urbanist, +1 is Conservationist.
- `(0, 0)`: intersection of the two centre lines.
- `mayoral`: `true` draws a square; `false` (the default) draws a circle.
- `credit`: optional footer text.

Labels sit above their markers by default. For crowded points or a label like
TEAM, add an optional `label` object:

```json
{
  "name": "TEAM", "x": 0.57, "y": 0.95, "mayoral": true,
  "label": { "dx": -31, "dy": 0, "align": "right", "vertical": "center" }
}
```

`dx` and `dy` are offsets in reference-image pixels; positive values move right
and down. `align` accepts `left`, `center`, or `right`; `vertical` accepts `top`,
`center`, `bottom`, or `baseline`. Overlapping labels need manual offsets.
These offsets scale along with the PNG.

The 2022 coordinates and label offsets were measured from the original raster
image; they are approximate positions, not newly sourced political assessments.
Edit `parties-2022.json` or supply a new file to change the data.

## Fonts and library use

On macOS, the script uses installed Avenir Roman for labels, Avenir Black for
the title, and Avenir Light for the credit. It extracts those faces into a
temporary directory during export and does not bundle or distribute the fonts.
On other systems it warns and falls back to DejaVu Sans. Use `--font-file` and
`--title-font-file` to supply regular and bold TTF/OTF fonts.

The script also exposes `render_chart(config, output_stem, scale=1,
font_file=None, title_font_file=None)` for programmatic use; it returns the two
output paths. Points use Matplotlib's scatter plot, with figure annotations for
the typography, arrows, and legend.
