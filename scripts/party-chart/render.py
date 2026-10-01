"""Render an Illustrator-style party chart from JSON using Matplotlib."""

import argparse
import json
import math
from pathlib import Path
from tempfile import TemporaryDirectory
import warnings

import matplotlib

matplotlib.use("Agg")
from matplotlib import font_manager
from matplotlib.figure import Figure
from matplotlib.markers import MarkerStyle
from matplotlib.patches import Polygon
from fontTools.ttLib import TTCollection

HERE = Path(__file__).resolve().parent
WIDTH, HEIGHT, DPI = 1299, 1406, 100
LEFT, TOP, SIDE = 126.5, 96.5, 1084
MAGENTA, GRID, ARROW = "#c601ff", "#d5d5d5", "#b0b0b0"


def avenir_fonts(directory):
    """Extract installed TTC faces; no proprietary fonts are stored in the repo."""
    collection = Path("/System/Library/Fonts/Avenir.ttc")
    if not collection.exists():
        warnings.warn("Avenir is unavailable; using DejaVu Sans. Supply --font-file for a closer match.")
        return {
            "regular": font_manager.FontProperties(family="DejaVu Sans"),
            "title": font_manager.FontProperties(family="DejaVu Sans", weight="bold"),
            "credit": font_manager.FontProperties(family="DejaVu Sans"),
        }
    faces = {"Avenir-Roman": "regular", "Avenir-Black": "title", "Avenir-Light": "credit"}
    result = {}
    with TTCollection(collection) as fonts:
        for font in fonts.fonts:
            name = font["name"].getDebugName(6)
            if name in faces:
                target = Path(directory) / f"{name}.ttf"
                font.save(target)
                result[faces[name]] = font_manager.FontProperties(fname=target)
    return result


def validate(config):
    if not isinstance(config.get("title"), str):
        raise ValueError("title must be a string")
    if not isinstance(config.get("parties"), list):
        raise ValueError("parties must be an array")
    for party in config["parties"]:
        if not isinstance(party.get("name"), str) or not party["name"].strip():
            raise ValueError("Each party needs a nonempty name")
        for axis in ("x", "y"):
            value = party.get(axis)
            if isinstance(value, bool) or not isinstance(value, (float, int)) or not math.isfinite(value) or not -1 <= value <= 1:
                raise ValueError(f"{party['name']}: {axis} must be a finite number from -1 to 1")
        if not isinstance(party.get("mayoral", False), bool):
            raise ValueError(f"{party['name']}: mayoral must be true or false")
        label = party.get("label", {})
        if not isinstance(label, dict):
            raise ValueError(f"{party['name']}: label must be an object")
        for offset in ("dx", "dy"):
            value = label.get(offset, 0)
            if isinstance(value, bool) or not isinstance(value, (float, int)) or not math.isfinite(value):
                raise ValueError(f"{party['name']}: label {offset} must be a finite number")
        if label.get("align", "center") not in ("left", "center", "right"):
            raise ValueError(f"{party['name']}: invalid label align")
        if label.get("vertical", "bottom") not in ("top", "center", "bottom", "baseline"):
            raise ValueError(f"{party['name']}: invalid label vertical")


def make_figure(config, fonts):
    """Use data coordinates for points and reference pixels for typography/layout."""
    fig = Figure(figsize=(WIDTH / DPI, HEIGHT / DPI), dpi=DPI, facecolor="white")
    ax = fig.add_axes([LEFT / WIDTH, (HEIGHT - TOP - SIDE) / HEIGHT, SIDE / WIDTH, SIDE / HEIGHT])
    ax.set(xlim=(-1, 1), ylim=(-1, 1), xticks=[], yticks=[])
    for spine in ax.spines.values():
        spine.set(color=GRID, linewidth=2.4 * 72 / DPI)
    ax.axhline(0, color=GRID, linewidth=2.4 * 72 / DPI, zorder=0)
    ax.axvline(0, color=GRID, linewidth=2.4 * 72 / DPI, zorder=0)

    def text(x, y, value, size=31.6, face="regular", **kwargs):
        return fig.text(x / WIDTH, 1 - y / HEIGHT, value, fontsize=size * 72 / DPI,
                        fontproperties=fonts[face], color=kwargs.pop("color", "black"), **kwargs)

    def arrow(x, y, dx, dy):
        # Illustrator's concave arrowheads, expressed in reference pixels.
        length = math.hypot(dx, dy)
        ux, uy = dx / length, dy / length
        vx, vy = -uy, ux
        outline = [(0, -3), (length - 32, -3), (length - 42, -14.5),
                   (length, 0), (length - 42, 14.5), (length - 32, 3), (0, 3)]
        vertices = [((x + u * ux + v * vx) / WIDTH, 1 - (y + u * uy + v * vy) / HEIGHT)
                    for u, v in outline]
        fig.add_artist(Polygon(vertices, closed=True, facecolor=ARROW, edgecolor="none", transform=fig.transFigure))

    text(652, 58, config["title"], size=31.3, face="title", ha="center", va="baseline")
    text(113, TOP + 3, "Conservationist", rotation=90, ha="right", va="top")
    text(113, 653, "City Development", rotation=90, ha="right", va="center")
    text(113, TOP + SIDE + 4, "Urbanist", rotation=90, ha="right", va="bottom")
    arrow(92.5, 496, 0, -143)
    arrow(92.5, 799, 0, 143)
    text(LEFT, 1229, "Left", ha="left", va="baseline")
    text(LEFT + SIDE, 1229, "Right", ha="right", va="baseline")
    text(668, 1229, "Social and Economic Issues", ha="center", va="baseline")
    arrow(463, 1219.5, -143, 0)
    arrow(869, 1219.5, 143, 0)

    for party in config["parties"]:
        marker = MarkerStyle("s" if party.get("mayoral", False) else "o", joinstyle="miter")
        points = ax.scatter([party["x"]], [party["y"]], marker=marker,
                            s=(35 * 72 / DPI) ** 2, facecolors="none", edgecolors=MAGENTA,
                            linewidths=5 * 72 / DPI, zorder=3, clip_on=False)
        points.set_joinstyle("miter")
        label = party.get("label", {})
        x = LEFT + (party["x"] + 1) * SIDE / 2
        y = TOP + (1 - party["y"]) * SIDE / 2
        text(x + label.get("dx", 0), y + label.get("dy", -22), party["name"],
             ha=label.get("align", "center"), va=label.get("vertical", "bottom"))

    # Legend markers have the same geometry as the data markers.
    for x, y, marker in ((213, 1314.5, "s"), (711, 1311.5, "o")):
        fig.add_artist(matplotlib.lines.Line2D([x / WIDTH], [1 - y / HEIGHT],
                       marker=MarkerStyle(marker, joinstyle="miter"), markersize=35 * 72 / DPI, markerfacecolor="none",
                       markeredgecolor=MAGENTA, markeredgewidth=5 * 72 / DPI,
                       linestyle="none", transform=fig.transFigure))
    text(251, 1329, "With Mayoral candidates", va="baseline")
    text(750, 1326, "Council candidates only", va="baseline")
    text(675, 1391, config.get("credit", ""), size=27.4, face="credit", color="#555555",
         ha="center", va="baseline")
    return fig


def render_chart(config, output_stem, scale=1, font_file=None, title_font_file=None):
    """Save PNG and outlined SVG. Scale increases PNG resolution only."""
    validate(config)
    if not math.isfinite(scale) or scale <= 0:
        raise ValueError("scale must be a positive finite number")
    output_stem = Path(output_stem)
    output_stem.parent.mkdir(parents=True, exist_ok=True)
    with TemporaryDirectory(prefix="party-chart-fonts-") as directory:
        fonts = avenir_fonts(directory)
        if font_file:
            fonts["regular"] = fonts["credit"] = font_manager.FontProperties(fname=font_file)
        if title_font_file:
            fonts["title"] = font_manager.FontProperties(fname=title_font_file)
        # Isolate styling from other scripts importing this module.
        with matplotlib.rc_context({"svg.fonttype": "path", "text.usetex": False,
                                    "text.hinting": "none", "path.snap": False}):
            fig = make_figure(config, fonts)
            outputs = [Path(f"{output_stem}.{extension}") for extension in ("png", "svg")]
            for output in outputs:
                fig.savefig(output, dpi=DPI * scale, facecolor="white")
            fig.clear()
    return outputs


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("data", nargs="?", type=Path, default=HERE / "parties-2022.json")
    parser.add_argument("--output", type=Path, default=HERE.parents[1] / "images/2022/vancouver-parties-graph-2022-recreated",
                        help="Output path without extension")
    parser.add_argument("--scale", type=float, default=1, help="PNG resolution multiplier (e.g. 2)")
    parser.add_argument("--font-file", type=Path, help="Alternative regular TTF/OTF font")
    parser.add_argument("--title-font-file", type=Path, help="Alternative bold TTF/OTF font")
    args = parser.parse_args()
    try:
        outputs = render_chart(json.loads(args.data.read_text()), args.output, args.scale,
                               args.font_file, args.title_font_file)
    except (ValueError, OSError) as error:
        parser.exit(1, f"Error: {error}\n")
    for output in outputs:
        print(output)


if __name__ == "__main__":
    main()
