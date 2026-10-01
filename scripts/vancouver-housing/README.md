---
eleventyExcludeFromCollections: true
permalink: false
---

# Vancouver election housing charts

Frozen source data retrieved September 23, 2026. Run `python3 render.py`
with matplotlib installed to regenerate PNG and SVG figures in `images/2026`.
`data.json` contains monthly observations, January 2016–August 2026.

## Prices

The current chart uses `local_prices`, extracted from the [GVR monthly comparison
tables](https://legacy.gvrealtors.ca/market-watch/MLS-HPI-home-price-comparison.hpi.all.all.all.2026-8-1.html).
The date selector's URL format is `...hpi.all.all.all.YYYY-M-1.html`.
All 128 months contain Greater Vancouver, Vancouver East and Vancouver West,
with Detached, Townhouse and Apartment benchmark dollar values for each.
All three geographies use GVR directly. Only the East/West average is now plotted;
the regional data are retained for the comparison below.
The original CREA `prices` observations below remain in the JSON for provenance,
but are no longer plotted.

The line labelled Apartment condos uses GVR's Apartment category: purchase prices
of individual apartment units, not rental prices or whole apartment buildings.
[GVR's property-type definitions](https://economics.gvrealtors.ca/res_chartbook_mobile_ojs.html)
describe common ownership such as strata as typical, not universal. “Condos” is
a reader-friendly shorthand, not a verified filter excluding every other tenure.

The solid price lines are `(East benchmark + West benchmark) / 2`. These are not
official municipality-wide HPI benchmarks or average transaction prices.
Vancouver West's subarea list includes University VW, so this geography also
extends beyond the municipality. Do not confuse Vancouver West with the
separate municipality of West Vancouver.

### What averaging changes

August 2026, nominal CAD:

| Type | East | West | 50/50 average | Greater Vancouver | Difference |
| --- | ---: | ---: | ---: | ---: | ---: |
| Detached | 1,621,400 | 2,932,700 | 2,277,050 | 1,799,400 | +26.5% |
| Townhouse | 985,400 | 1,334,900 | 1,160,150 | 1,028,800 | +12.8% |
| Apartment | 628,600 | 774,900 | 701,750 | 686,200 | +2.3% |

The difference from Greater Vancouver is not estimation error: these represent
different geographies. No defensible expected error versus a true city-wide
benchmark can be calculated without a reference series and an aggregation method.
Each local benchmark describes its own typical home; weighting their dollar
prices does not automatically reproduce an official aggregate HPI benchmark.

For a hypothetical linear aggregate with East weight `w`, the equal-weight
average's error is `(0.5 - w) * (East - West)`. A 60/40 or 40/60 split changes
the 50/50 result by ±$131,130 (5.76%) for detached, ±$34,950 (3.01%) for townhomes,
and ±$14,630 (2.08%) for apartments. These are sensitivity scenarios, not
confidence intervals or estimates of the actual weights. Typical-home and
boundary differences are additional sources of mismatch.

### Original regional download

- [CREA MLS HPI tool](https://www.crea.ca/housing-market-stats/mls-home-price-index/hpi-tool)
- [September 2026 historical data ZIP](https://www.crea.ca/files/mls-hpi-data/MLS_HPI_Sept_2026.zip)
- Workbook: `Not Seasonally Adjusted (M).xlsx`; sheet: `GREATER_VANCOUVER`.
- `detached`: `Single_Family_Benchmark`; `apartment`: `Apartment_Benchmark`.
- Nominal Canadian dollars, benchmark prices rather than average sale prices.
- Geography is the Greater Vancouver real estate market area, not Vancouver
  municipality or necessarily the same boundary as the Metro Vancouver regional
  district.
- Use one release for all history because benchmarks can be revised.
- Source discrepancy to retain when writing: CREA's August 2026 single-family
  benchmark is $1,804,900, whereas [GVR's August release](https://gvrealtors.ca/news/home-sales-continue-downward-trend-to-close-the-summer)
  reports a detached benchmark of $1,799,400. Apartments agree at $686,200.
  The reason for the difference has not been established. The updated chart uses
  GVR's tables for all price lines; the old CREA series remains as source history.

## Construction

- [CMHC Vancouver historical starts](https://www03.cmhc-schl.gc.ca/hmip-pimh/en/TableMapChart/TableMatchingCriteria?CategoryLevel1=New%20Housing%20Construction&CategoryLevel2=Starts%20%28Actual%29&ColumnField=1&GeographyId=5915022&GeographyType=CensusSubDivision&RowField=TIMESERIES)
- [CMHC Vancouver historical completions](https://www03.cmhc-schl.gc.ca/hmip-pimh/en/TableMapChart/TableMatchingCriteria?CategoryLevel1=New%20Housing%20Construction&CategoryLevel2=Completions&ColumnField=1&GeographyId=5915022&GeographyType=CensusSubDivision&RowField=TIMESERIES)
- Vancouver (CY), census subdivision 5915022; all intended markets and dwelling
  types. Monthly actual counts from the `All` column, summed for annual totals.
- These are new units started/completed, not permits, approvals, or net stock
  additions. Starts and completions in a year are not necessarily the same homes.
- The standalone starts/completions chart retains full years 2016–2025 and a
  separate January–August 2025/2026 comparison.
- The combined price/completions chart uses full years 2016–2025 and the user's
  requested 2026 scenario: `6,864 * (5,025 / 3,860) = 8,935.6477`, displayed as
  8,936. This assumes the +30.1813% January–August year-over-year growth persists
  throughout 2026 (equivalently scaling September–December 2025 by that ratio).
  It is not an official CMHC forecast; no uncertainty interval is estimated.

## Validation

- 128 months in each series; starts and completions have matching month keys.
- GVR local/regional price months match the original CREA month keys. All 1,152
  price observations are populated. No adjacent monthly change exceeds 15%.
- August 2026 local and regional values agree with the GVR market report's
  benchmark tables. Prices and completions now share one panel, with separate dollar and dwelling
  count axes that both start at zero. Six-month completion totals (January–June, July–December) are placed at
  period end. The last segment to H2 2026 is dashed and labelled projected.
  Crossings and relative slopes depend on the two axis scales.
- Each monthly construction total equals its single, semi-detached, row and
  apartment components.
- Annual 2016–2025 starts agree with [BC Stats housing starts](https://catalogue.data.gov.bc.ca/dataset/housing-starts-urban-areas-and-communities),
  `VANCOUVER CY`, SGC 5915022.
- Annual 2016–2024 completions agree with table 2.7 of the [Metro Vancouver
  Housing Data Book 2025](https://metrovancouver.org/services/regional-planning/Documents/metro-vancouver-housing-data-book-2025.pdf).

## CPI adjustment and six-month update

Prices are expressed in August 2026 Canadian dollars using Statistics Canada
[table 18-10-0004-01](https://www150.statcan.gc.ca/t1/tbl1/en/tv.action?pid=1810000401),
Vancouver, British Columbia, All-items, monthly, not seasonally adjusted,
vector v41692930. The 128 observations are saved in `data.json` under `cpi`.
Source download: https://www150.statcan.gc.ca/n1/tbl/csv/18100004-eng.zip
Vancouver CPI describes the broader metropolitan geography, not the municipality.
Formula: nominal price in month t × CPI(August 2026) / CPI(t).
CPI is 122.7 in January 2016 and 167.0 in August 2026. CPI adjusts prices only;
physical housing completion counts are unchanged.

Completions now sum actual monthly observations into non-overlapping calendar
half-years. H1 2026 is 3,560. The projected H2 is 8,935.6477 − 3,560 = 5,375.6477,
displayed as 5,376. This retains the previously requested full-year projection,
including observed July/August within H2; it does not treat July/August alone as
a complete half-year. H1 + H2 matches each annual actual total for 2016–2025.
Prices end in August; the projected completion point is placed at December 31.
The chart width was reduced from 12 to 10 inches with height held at 7.5 inches.

## Current smoothing and possible combined price series

The price ceiling is restored to $3.5M. Completions now show trailing 12-month
**totals**, sampled at June 30 and December 31. Each point sums the current and
previous half-year. This has exactly the same shape as the equal-weight rolling
average of two half-years, but is labelled in homes per trailing year instead of
average homes per half-year. The first complete window is December 2016; no 2015
observations have been assumed. December 2026 remains projected at 8,936.
The earlier six-month chart description above is retained as change history.

A combined price series would use six fixed weights, one for each combination
of East/West and detached/townhouse/apartment-condo. Formula:
`sum(unit_count[g,t] * benchmark[g,t,month]) / sum(unit_count[g,t])`, then CPI-adjust.
Fixed weights isolate changes in benchmark prices from changes in the housing
mix. This would be a custom benchmark basket, not an official aggregate HPI or
an average of actual transaction prices. Suitable matching stock counts have
not yet been established, so the three price lines remain and no weights have
been invented. Counts should cover condominium units including rented condos,
exclude purpose-built rental apartments from the condo category, and match the
GVR area boundaries (including University VW). Census structural categories and
real-estate categories need reconciliation, including houses with suites.

CREA's official aggregation uses sales-based weights, which would answer a
different question from weighting by housing stock:
https://www.crea.ca/files/HPI_Methodology-July-2023-rev-ENG.pdf


## Current chart: Royal LePage city aggregate

This replaces the GVR lines described above; those descriptions and data remain
as research history. `royal_lepage.observations` contains 42 quarterly Vancouver
city aggregate prices, Q1 2016–Q2 2026, with a source URL for each observation.
The aggregate combines median values across housing types using weights; it is
not the same measure as an MLS HPI benchmark or an average transaction price.

Source archive: https://www.royallepage.ca/en/real-estate-market/housing-price-reports/

These are contemporaneous release values, **not a harmonized revised history**.
Royal LePage changed methodology, geographical boundaries and housing types in
Q2 2021. The chart marks that point while connecting the price line across it. Subsequent reports can
also revise earlier values; a cross-period change cannot be attributed entirely
to market movement. Methodology-change announcement:
https://www.royallepage.ca/en/realestate/news/canadian-home-price-forecast-revised-upward-to-16-as-roaring-spring-market-eases-into-summer/

Inflation adjustment: quarterly nominal aggregate × CPI(August 2026) ÷ mean CPI
for the quarter's three months. The base CPI is 167.0. Prices are placed at
quarter end; the last nominal price is $1,340,800 (Q2 2026). Q1 2016's table has
reverse column order; its current-quarter aggregate is $1,271,374. Q4 2016's
$1,506,498 comes from the release text. Source tables and releases were checked
for city rather than Greater Vancouver rows.

The price ceiling is $2.5M, with zero-based dual axes. Trailing-year completions
end at the observed June 2026 point; the December 2026 projection is removed. No housing-type weights or
interpolation have been invented to construct this aggregate.


## Separate 2006–2026 preview

Run `python3 render.py --since-2006` to create `home-prices-since-2006` PNG/SVG
files (with the same `vancouver-election-2026-` prefix). This does not replace
the Royal LePage chart embedded in the draft. Royal LePage introduced its
aggregate measure in 2015, so the preview uses the Greater Vancouver MLS HPI
composite benchmark for the entire period, not a splice onto the city series.
Launch announcement:
https://www.royallepage.ca/en/realestate/news/launch-of-royal-lepage-canadian-real-estate-market-composite-brings-enhanced-research-and-analytics-to-companys-quarterly-house-price-survey/

`regional_composite` stores monthly nominal benchmarks from the September 2026
CREA workbook, GREATER_VANCOUVER sheet, Composite_Benchmark column. Adjusted by
monthly Vancouver CPI into August 2026 dollars. Different geography and measure
from Royal LePage's city aggregate; comparisons should acknowledge both.
Construction and CPI now cover January 2006–August 2026 (248 months each).
Existing 2016–2026 observations were checked for exact agreement. Completion
half-year pairs are validated against full calendar-year totals, 2006–2025.
No projections; last trailing-year completions point is June 2026. Price scale
remains $0–$2.5M and completions $0–10,000, with two-year x-axis labels.


## Three-point completion smoothing (both price charts)

Each displayed completion value is now `(T[t] + T[t-1] + T[t-2]) / 3`, where T
is the trailing 12-month total sampled every six months. Equal weights, trailing
rather than centred, no forecasts or partial windows. This adds smoothing to the
existing annual totals: the underlying monthly coverage spans 24 months, with
half-year weights proportional to 1, 2, 2, 1. Units remain homes per year.
The first displayed point is December 2007 in the long preview and December 2017
in the shorter chart; the endpoint remains June 2026. The extra trailing average
adds six months of lag relative to the unsmoothed annual-total line. Standalone
starts/completions bars are unchanged.


The 2006–2026 preview now uses an 8-inch width (20% narrower), retaining its
7.5-inch height, with price maximum $1.5M and completions maximum 8,000.
The shorter Royal LePage version retains its previous dimensions and scales
because its price observations exceed $1.5M.


## Rent comparison preview

Run `python3 render.py --with-rents` for the separate `home-prices-with-rents`
PNG/SVG. Includes annual October CMHC Vancouver city two-bedroom average rents
from 2006 through 2025, frozen under `rents` with source URL. Validated 20
observations, including $1,243 in 2006 and $2,638 in 2025. These are primary
rental market averages including existing tenants, not asking rents or a
quality-adjusted same-sample index. Changes in the building mix can affect them.

Both prices and rents are divided by their corresponding month's Vancouver CPI
and rebased to October 2006 = 100, aligning their reference month. Rent points
are placed in October with straight connecting segments (no monthly estimates).
Regional purchase prices remain monthly through August 2026. City completions
retain the three-point smoothing, right axis maximum 8,000 and June 2026 endpoint.
The indexed left axis is 0–225, replacing the dollar scale for this preview only.
Earlier chart versions and the draft's current embedded image are retained.


## Per-capita completion index preview

Run `python3 render.py --per-capita` to render `home-prices-per-capita` PNG/SVG.
All three lines use one 0–225 index axis. Prices/rents retain October 2006 = 100.
For completions, divide each trailing-year total by the BC Stats Vancouver city
population estimate for the endpoint year, then average three successive rates
sampled six months apart. Rebase to the smoothed December 2006 rate = 100.
The baseline is 7.013 completions per 1,000 residents per year; December 2025's
index is 114.8. Population adjusts completions only, not purchase prices or rents.

BC Stats annual municipal estimates are frozen in `population`, with a source
URL. These are population estimates, not unadjusted census counts. Only records
with Type=Estimate and Gender=T for Vancouver are used. 2026 is labelled
Projection in the source and is excluded, so this completion line ends in 2025.
Use of annual population for June/December endpoints is an approximation.
CMHC construction data were extended to 2004 to supply complete smoothing
windows in 2006; no invented or partial initial windows. Construction counts
remain gross completions, not net stock growth or completions per new resident.
