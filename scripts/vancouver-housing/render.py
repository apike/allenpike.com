"""Render the draft housing figures. Requires matplotlib; reads frozen data.json."""
import json
import sys
from datetime import datetime
from pathlib import Path

import matplotlib
matplotlib.use('Agg')
import matplotlib.pyplot as plt
import matplotlib.dates as mdates
from matplotlib.ticker import FuncFormatter
from matplotlib.lines import Line2D

HERE = Path(__file__).resolve().parent
OUT = HERE.parents[1] / 'images' / '2026'
DATA = json.loads((HERE / 'data.json').read_text())
PURPLE, TEAL = '#8B32C6', '#087E8B'
plt.rcParams.update({'font.family': 'DejaVu Sans', 'font.size': 12,
                     'axes.spines.top': False, 'axes.spines.right': False,
                     'axes.spines.left': False, 'axes.spines.bottom': False,
                     'svg.fonttype': 'none', 'text.color': '#222222',
                     'axes.labelcolor': '#555555', 'xtick.color': '#555555',
                     'ytick.color': '#555555'})

def style(ax):
    ax.set_axisbelow(True)
    ax.grid(axis='y', color='#E5E5E5', linewidth=.8)
    ax.tick_params(length=0, pad=9)

def save(fig, name):
    OUT.mkdir(parents=True, exist_ok=True)
    for ext in ('svg', 'png'):
        fig.savefig(OUT / f'{name}.{ext}', dpi=180, facecolor='white')
    plt.close(fig)

rows = DATA['construction']
def total(year, metric, through=12):
    return sum(r[metric] for r in rows if r['month'].startswith(str(year)) and int(r['month'][5:]) <= through)

per_capita = '--per-capita' in sys.argv
indexed = '--with-rents' in sys.argv or per_capita
long_view = '--since-2006' in sys.argv or indexed
start_year = 2006 if long_view else 2016
prices = DATA['regional_composite' if long_view else 'royal_lepage']['observations']
dates = [datetime.strptime(r['month'], '%Y-%m') if long_view else datetime.strptime(r['date'], '%Y-%m-%d') for r in prices]
fig, ax = plt.subplots(figsize=(8 if long_view else 10, 7.5))
fig.subplots_adjust(left=.14 if long_view else .11, right=.84 if long_view else .87, top=.74, bottom=.25)
building = ax if per_capita else ax.twinx()
fig.text(.09, .93, 'Vancouver prices, rents and completions' if indexed else 'Vancouver home prices and completions', fontsize=16 if long_view else 20, weight='bold')
subtitle = 'Prices: Greater Vancouver composite benchmark · Completions: City of Vancouver' if long_view else 'Royal LePage quarterly aggregate · Prices and completions: City of Vancouver'
if indexed:
    subtitle = 'Prices: Greater Vancouver · Two-bedroom rents and completions: City of Vancouver'
fig.text(.09, .875, subtitle, color='#555555', fontsize=8 if long_view else 10)
cpi = {r['month']: r['value'] for r in DATA['cpi']['observations']}
base_cpi = cpi[DATA['cpi']['base_month']]
real_prices = []
for row, date in zip(prices, dates):
    quarter_cpi = cpi[row['month']] if long_view else sum(cpi[f'{date.year}-{month:02}'] for month in range(date.month-2, date.month+1)) / 3
    real_prices.append(row['nominal'] * base_cpi / quarter_cpi)
if indexed:
    base_price = real_prices[dates.index(datetime(2006, 10, 1))]
    real_prices = [100 * value / base_price for value in real_prices]
    rent_rows = DATA['rents']['observations']
    rent_dates = [datetime.strptime(r['month'], '%Y-%m') for r in rent_rows]
    real_rents = [r['nominal'] * base_cpi / cpi[r['month']] for r in rent_rows]
    rent_index = [100 * value / real_rents[0] for value in real_rents]
    assert abs(rent_index[0] - 100) < 1e-9 and abs(real_prices[9] - 100) < 1e-9
    ax.plot(rent_dates, rent_index, color=TEAL, linewidth=2.5, marker='o', markersize=3)
ax.plot(dates, real_prices, color=PURPLE, linewidth=2.5)
if not long_view:
    ax.axvline(datetime(2021, 4, 1), color='#AAAAAA', linestyle=':', linewidth=1)
    ax.text(datetime(2021, 4, 1), 2.35e6, 'Methodology changed\nQ2 2021', ha='center', va='top', fontsize=9, color='#777777', backgroundcolor='white')
handles = [Line2D([0], [0], color=PURPLE, linewidth=3, label='Composite benchmark price' if long_view else 'Aggregate home price')]
if indexed:
    handles.append(Line2D([0], [0], color=TEAL, linewidth=3, label='Two-bedroom rent'))
completion_color = '#525D68'
handles.append(Line2D([0], [0], color=completion_color, linewidth=2, marker='o', markersize=4, label='Completions per resident' if per_capita else 'Completions (right axis)'))
fig.legend(handles=handles, loc='upper left', bbox_to_anchor=(.083, .85),
           frameon=False, ncols=2, fontsize=8 if long_view else 10)
ax.set_ylim(0, 1500000 if long_view else 2500000)
ax.set_yticks([0, .5e6, 1e6, 1.5e6] if long_view else [0, .5e6, 1e6, 1.5e6, 2e6, 2.5e6])
ax.yaxis.set_major_formatter(FuncFormatter(lambda x, _: '$0' if x == 0 else f'${x/1e6:g}M'))
ax.set_ylabel(('Benchmark' if long_view else 'Aggregate') + ' price · August 2026 dollars', fontsize=11, labelpad=12)
if indexed:
    ax.set_ylim(0, 225)
    ax.set_yticks([0, 50, 100, 150, 200, 225])
    ax.yaxis.set_major_formatter(FuncFormatter(lambda x, _: f'{x:g}'))
    ax.set_ylabel('Index · 2006 = 100' if per_capita else 'Inflation-adjusted index · October 2006 = 100', fontsize=10, labelpad=12)
    ax.axhline(100, color='#AAAAAA', linewidth=1, linestyle=':')
style(ax)
years = list(range(start_year, 2027))
half_dates, values = [], []
for year in (range(2004, 2026) if per_capita else years):
    for half, end_month in [(1, 6), (2, 12)]:
        if year == 2026 and half == 2:
            continue  # Only complete, observed half-years.
        half_dates.append(datetime(year, end_month, 30 if half == 1 else 31))
        values.append(total(year, 'completions', end_month) - (total(year, 'completions', 6) if half == 2 else 0))
# Sum adjacent half-years: trailing 12 months, sampled every six months.
# Use complete windows only; do not pad missing observations.
values = [previous + current for previous, current in zip(values, values[1:])]
half_dates = half_dates[1:]
for year in range(start_year, 2026):
    index = half_dates.index(datetime(year, 12, 31))
    assert values[index] == total(year, 'completions')
if per_capita:
    population = {r['year']: r['value'] for r in DATA['population']['observations']}
    # Use the annual population estimate for the endpoint year of each annual total.
    values = [v / population[dt.year] * 1000 for dt, v in zip(half_dates, values)]
# Equal-weight trailing mean of three annual totals, sampled six months apart.
values = [sum(values[i-2:i+1]) / 3 for i in range(2, len(values))]
half_dates = half_dates[2:]
if per_capita:
    baseline = values[half_dates.index(datetime(2006, 12, 31))]
    values = [100 * v / baseline for v in values]
    keep = [i for i, dt in enumerate(half_dates) if dt.year >= 2006]
    half_dates, values = [half_dates[i] for i in keep], [values[i] for i in keep]
    assert abs(values[half_dates.index(datetime(2006, 12, 31))] - 100) < 1e-9
    print(f'Completions per 1,000: smoothed 2006 baseline {baseline:.3f}; latest index {values[-1]:.1f}')
building.plot(half_dates, values, color=completion_color, linewidth=2, marker='o', markersize=3.5)
if not per_capita:
    building.set_ylim(0, 8000 if long_view else 10000)
    building.set_yticks([0, 2000, 4000, 6000, 8000] if long_view else [0, 2000, 4000, 6000, 8000, 10000])
    building.yaxis.set_major_formatter(FuncFormatter(lambda x, _: f'{x:,.0f}'))
    building.set_ylabel('Homes completed / year · smoothed', color=completion_color, fontsize=11, labelpad=12)
    building.tick_params(length=0, pad=9, colors=completion_color)
ax.set_xlim(datetime(start_year, 1, 1), datetime(2026, 10, 1))
tick_years = years[::2] if long_view else years
ax.set_xticks([datetime(y, 7, 1) for y in tick_years], [str(y) for y in tick_years], fontsize=10)
if per_capita:
    fig.text(.09, .175, 'Completions per resident: three-point trailing mean of annual rates, sampled every six months.', fontsize=6.8, color='#555555')
    fig.text(.09, .14, 'Completions baseline: December 2006 smoothed rate = 100. Ends 2025; population estimates only.', fontsize=6.8, color='#555555')
else:
    fig.text(.09, .175, 'Completions: three-point trailing average of 12-month totals, sampled every six months.', fontsize=6.8 if long_view else 8.5, color='#555555')
    fig.text(.09, .14, 'Equal weights for current, previous and second-previous points. Through June 2026; no projection.', fontsize=6.8 if long_view else 8.5, color='#555555')
if indexed:
    fig.text(.09, .105, 'Prices and rents: inflation-adjusted using Vancouver CPI, then indexed to October 2006 = 100.', fontsize=6.8, color='#555555')
    fig.text(.09, .07, 'Rents: annual October survey through 2025; includes existing tenants, not a market asking-rent series.', fontsize=6.8, color='#555555')
    fig.text(.09, .035, 'Sources: CREA MLS® HPI; CMHC; Statistics Canada CPI; BC Stats municipal population.' if per_capita else 'Sources: CREA MLS® HPI; CMHC rental and construction surveys; Statistics Canada CPI.', fontsize=6.8, color='#666666')
elif long_view:
    fig.text(.09, .105, 'Prices through August 2026, adjusted with monthly Vancouver all-items CPI. Axes start at zero.', fontsize=6.8 if long_view else 8.5, color='#555555')
    fig.text(.09, .07, 'Regional price comparison: different geography and measure from the Royal LePage city series.', fontsize=6.8 if long_view else 8.5, color='#555555')
    fig.text(.09, .035, 'Sources: CREA MLS® HPI (September 2026 history); CMHC; Statistics Canada 18-10-0004-01.', fontsize=6.8 if long_view else 8.5, color='#666666')
else:
    fig.text(.09, .105, 'Prices through Q2 2026: August 2026 dollars, using quarterly mean Vancouver CPI. Axes start at zero.', fontsize=6.8 if long_view else 8.5, color='#555555')
    fig.text(.09, .07, 'Prices as originally released; methodology changed Q2 2021. History is not harmonized for revisions.', fontsize=6.8 if long_view else 8.5, color='#555555')
    fig.text(.09, .035, 'Sources: Royal LePage House Price Survey; CMHC; Statistics Canada 18-10-0004-01.', fontsize=6.8 if long_view else 8.5, color='#666666')
save(fig, 'vancouver-election-2026-home-prices' + ('-per-capita' if per_capita else '-with-rents' if indexed else '-since-2006' if long_view else ''))
if long_view:
    sys.exit(0)

fig, axes = plt.subplots(1, 2, figsize=(12, 6.3), gridspec_kw={'width_ratios': [3.5, 1]}, sharey=True)
fig.subplots_adjust(left=.08, right=.98, top=.73, bottom=.19, wspace=.12)
fig.text(.08, .92, 'Homebuilding in the City of Vancouver', fontsize=23, weight='bold')
fig.text(.08, .86, 'New homes started and completed · All dwelling types', color='#666666')
for ax, years, through, title in [(axes[0], list(range(2016, 2026)), 12, 'Full calendar years'),
                                  (axes[1], [2025, 2026], 8, 'January–August only')]:
    for offset, metric, label, color in [(-.19, 'starts', 'Starts', PURPLE), (.19, 'completions', 'Completions', TEAL)]:
        bars = ax.bar([i+offset for i in range(len(years))], [total(y, metric, through) for y in years],
                     width=.36, color=color, label=label)
        if through == 8:
            ax.bar_label(bars, labels=[f'{total(y, metric, through):,}' for y in years], padding=5, fontsize=9)
    ax.set_xticks(range(len(years)), [str(y) for y in years], fontsize=10)
    ax.set_title(title, fontsize=12, loc='left', pad=18, color='#555555')
    ax.set_ylim(0, 10500)
    ax.yaxis.set_major_formatter(FuncFormatter(lambda x, _: f'{x:,.0f}'))
    style(ax)
axes[0].legend(loc='upper right', frameon=False, ncols=2, fontsize=11)
fig.text(.08, .075, 'Source: CMHC Starts and Completions Survey · Vancouver municipality (CSD 5915022)', fontsize=9, color='#666666')
fig.text(.08, .04, 'Through August 2026. Gross new units, not net additions after demolitions. Figures may be revised.', fontsize=9, color='#666666')
save(fig, 'vancouver-election-2026-homebuilding')
