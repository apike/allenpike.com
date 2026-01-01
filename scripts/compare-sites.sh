#!/bin/bash

# Site Comparison Script
# Compares HTTP responses between old and new domains for all URLs in the sitemap

set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Default config file location (relative to script directory)
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
CONFIG_FILE="$SCRIPT_DIR/compare-config.json"

# Parse command line arguments
LIMIT_OVERRIDE=""
while [[ $# -gt 0 ]]; do
    case $1 in
        --config)
            CONFIG_FILE="$2"
            shift 2
            ;;
        --limit)
            LIMIT_OVERRIDE="$2"
            shift 2
            ;;
        --help)
            echo "Usage: $0 [OPTIONS]"
            echo ""
            echo "Options:"
            echo "  --config FILE    Use specified config file (default: scripts/compare-config.json)"
            echo "  --limit N        Override limit from config (0 for all URLs)"
            echo "  --help           Show this help message"
            exit 0
            ;;
        *)
            echo "Unknown option: $1"
            exit 1
            ;;
    esac
done

# Check for required tools
check_dependencies() {
    local missing=()
    for cmd in curl jq diff; do
        if ! command -v "$cmd" &> /dev/null; then
            missing+=("$cmd")
        fi
    done
    
    if [ ${#missing[@]} -ne 0 ]; then
        echo -e "${RED}Error: Missing required tools: ${missing[*]}${NC}"
        echo "Please install them and try again."
        exit 1
    fi
}

# Load configuration
load_config() {
    if [ ! -f "$CONFIG_FILE" ]; then
        echo -e "${RED}Error: Config file not found: $CONFIG_FILE${NC}"
        exit 1
    fi
    
    OLD_DOMAIN=$(jq -r '.old_domain' "$CONFIG_FILE")
    NEW_DOMAIN=$(jq -r '.new_domain' "$CONFIG_FILE")
    LIMIT=$(jq -r '.limit // 0' "$CONFIG_FILE")
    OUTPUT_DIR=$(jq -r '.output_dir // "comparison-output"' "$CONFIG_FILE")
    
    # Apply command line override for limit
    if [ -n "$LIMIT_OVERRIDE" ]; then
        LIMIT="$LIMIT_OVERRIDE"
    fi
    
    # Validate config
    if [ -z "$OLD_DOMAIN" ] || [ "$OLD_DOMAIN" = "null" ]; then
        echo -e "${RED}Error: old_domain not set in config${NC}"
        exit 1
    fi
    
    if [ -z "$NEW_DOMAIN" ] || [ "$NEW_DOMAIN" = "null" ]; then
        echo -e "${RED}Error: new_domain not set in config${NC}"
        exit 1
    fi
    
    echo -e "${BLUE}Configuration:${NC}"
    echo "  Old domain: $OLD_DOMAIN"
    echo "  New domain: $NEW_DOMAIN"
    echo "  Limit: ${LIMIT:-0} (0 = no limit)"
    echo "  Output dir: $OUTPUT_DIR"
    echo ""
}

# Fetch and parse sitemap
fetch_sitemap() {
    local sitemap_url="${OLD_DOMAIN}/sitemap.xml"
    echo -e "${BLUE}Fetching sitemap from: $sitemap_url${NC}"
    
    SITEMAP_CONTENT=$(curl -sL "$sitemap_url")
    
    if [ -z "$SITEMAP_CONTENT" ]; then
        echo -e "${RED}Error: Failed to fetch sitemap${NC}"
        exit 1
    fi
    
    # Extract URLs from sitemap (handles <loc> tags)
    URLS=$(echo "$SITEMAP_CONTENT" | sed -n 's/.*<loc>\([^<]*\)<\/loc>.*/\1/p' | sort)
    
    if [ -z "$URLS" ]; then
        echo -e "${RED}Error: No URLs found in sitemap${NC}"
        exit 1
    fi
    
    URL_COUNT=$(echo "$URLS" | wc -l | tr -d ' ')
    echo -e "${GREEN}Found $URL_COUNT URLs in sitemap${NC}"
    
    # Apply limit if set
    if [ "$LIMIT" -gt 0 ]; then
        URLS=$(echo "$URLS" | head -n "$LIMIT")
        echo -e "${YELLOW}Limited to first $LIMIT URLs${NC}"
    fi
    echo ""
}

# Extract path from full URL
get_path() {
    local full_url="$1"
    # Remove the domain part to get just the path
    echo "$full_url" | sed -E 's|https?://[^/]+||'
}

# Sanitize path for use as directory name
sanitize_path() {
    local path="$1"
    # Remove leading/trailing slashes and replace remaining slashes with underscores
    echo "$path" | sed 's|^/||' | sed 's|/$||' | sed 's|/|__|g'
}

# Fetch URL and save headers/body separately
fetch_url() {
    local url="$1"
    local output_prefix="$2"
    
    # Fetch with headers, following redirects, capturing response code
    local response
    response=$(curl -sL -D "${output_prefix}.headers" -o "${output_prefix}.body" -w "%{http_code}" "$url" 2>/dev/null) || true
    
    echo "$response"
}

# Compare a single URL
compare_url() {
    local path="$1"
    local tmp_dir="$2"
    local diff_log="$3"
    
    local old_url="${OLD_DOMAIN}${path}"
    local new_url="${NEW_DOMAIN}${path}"
    
    mkdir -p "$tmp_dir"
    
    # Fetch both versions
    local old_status
    local new_status
    old_status=$(fetch_url "$old_url" "$tmp_dir/old")
    new_status=$(fetch_url "$new_url" "$tmp_dir/new")
    
    local has_diff=0
    local diff_summary=""
    local diff_content=""
    
    # Compare HTTP status codes
    if [ "$old_status" != "$new_status" ]; then
        has_diff=1
        diff_summary+="Status: $old_status vs $new_status; "
        diff_content+="[Status Code Difference]\nOld: $old_status\nNew: $new_status\n\n"
    fi
    
    # Compare headers (excluding date-related headers that always differ)
    if [ -f "$tmp_dir/old.headers" ] && [ -f "$tmp_dir/new.headers" ]; then
        # Filter out headers that are expected to differ
        grep -viE '^(date:|server:|x-request-id:|x-runtime:|age:|via:|cf-|set-cookie:|expires:|last-modified:|cache-status:|etag:|strict-transport-security:|x-nf-|content-length:|x-robots-tag:)' "$tmp_dir/old.headers" > "$tmp_dir/old.headers.filtered" 2>/dev/null || true
        grep -viE '^(date:|server:|x-request-id:|x-runtime:|age:|via:|cf-|set-cookie:|expires:|last-modified:|cache-status:|etag:|strict-transport-security:|x-nf-|content-length:|x-robots-tag:)' "$tmp_dir/new.headers" > "$tmp_dir/new.headers.filtered" 2>/dev/null || true
        
        if ! diff -q "$tmp_dir/old.headers.filtered" "$tmp_dir/new.headers.filtered" > /dev/null 2>&1; then
            has_diff=1
            diff_summary+="Headers differ; "
            diff_content+="[Header Differences]\n"
            diff_content+="$(diff "$tmp_dir/old.headers.filtered" "$tmp_dir/new.headers.filtered" 2>/dev/null || true)\n\n"
        fi
        rm -f "$tmp_dir/old.headers.filtered" "$tmp_dir/new.headers.filtered"
    fi
    
    # Compare body content (ignore blank line changes with -B)
    if [ -f "$tmp_dir/old.body" ] && [ -f "$tmp_dir/new.body" ]; then
        if ! diff -q -B "$tmp_dir/old.body" "$tmp_dir/new.body" > /dev/null 2>&1; then
            has_diff=1
            local body_diff
            body_diff=$(diff -B "$tmp_dir/old.body" "$tmp_dir/new.body" 2>/dev/null || true)
            
            # Count lines of difference
            local diff_lines
            diff_lines=$(echo "$body_diff" | wc -l | tr -d ' ')
            diff_summary+="Body differs ($diff_lines lines); "
            diff_content+="[Body Differences]\n$body_diff\n"
        fi
    fi
    
    # Write to diff log if there were differences
    if [ $has_diff -eq 1 ]; then
        {
            echo "================================================================================"
            echo "PATH: $path"
            echo "Old: $old_url"
            echo "New: $new_url"
            echo "Summary: $diff_summary"
            echo "--------------------------------------------------------------------------------"
            echo -e "$diff_content"
        } >> "$diff_log"
        echo "DIFF|$path|$old_status|$new_status|$diff_summary"
    else
        echo "MATCH|$path|$old_status|$new_status|"
    fi
    
    # Clean up temp files
    rm -rf "$tmp_dir"
}

# Main comparison loop
run_comparison() {
    # Create output directory
    mkdir -p "$OUTPUT_DIR"
    
    local total=0
    local matches=0
    local diffs=0
    local errors=0
    
    # Initialize summary file
    local summary_file="$OUTPUT_DIR/summary.txt"
    echo "Site Comparison Summary" > "$summary_file"
    echo "=======================" >> "$summary_file"
    echo "Date: $(date)" >> "$summary_file"
    echo "Old domain: $OLD_DOMAIN" >> "$summary_file"
    echo "New domain: $NEW_DOMAIN" >> "$summary_file"
    echo "" >> "$summary_file"
    echo "Results:" >> "$summary_file"
    echo "--------" >> "$summary_file"
    
    # Initialize diff log file
    local diff_log="$OUTPUT_DIR/site-diffs.log"
    echo "Site Differences Log" > "$diff_log"
    echo "====================" >> "$diff_log"
    echo "Date: $(date)" >> "$diff_log"
    echo "Old domain: $OLD_DOMAIN" >> "$diff_log"
    echo "New domain: $NEW_DOMAIN" >> "$diff_log"
    echo "" >> "$diff_log"
    
    # Temp directory for intermediate files
    local tmp_dir="$OUTPUT_DIR/.tmp"
    
    while IFS= read -r full_url; do
        [ -z "$full_url" ] && continue
        
        total=$((total + 1))
        local path
        path=$(get_path "$full_url")
        
        # Use root path if empty
        if [ -z "$path" ]; then
            path="/"
        fi
        
        echo -ne "${BLUE}[$total] Testing: $path ... ${NC}"
        
        local result
        result=$(compare_url "$path" "$tmp_dir" "$diff_log")
        
        local status
        status=$(echo "$result" | cut -d'|' -f1)
        local old_code
        old_code=$(echo "$result" | cut -d'|' -f3)
        local new_code
        new_code=$(echo "$result" | cut -d'|' -f4)
        local details
        details=$(echo "$result" | cut -d'|' -f5)
        
        if [ "$status" = "MATCH" ]; then
            matches=$((matches + 1))
            echo -e "${GREEN}MATCH${NC} (${old_code})"
            echo "MATCH: $path ($old_code)" >> "$summary_file"
        elif [ "$status" = "DIFF" ]; then
            diffs=$((diffs + 1))
            echo -e "${YELLOW}DIFF${NC} - $details"
            echo "DIFF:  $path - $details" >> "$summary_file"
        else
            errors=$((errors + 1))
            echo -e "${RED}ERROR${NC}"
            echo "ERROR: $path" >> "$summary_file"
        fi
        
        # Rate limit: 10 pages per second = 0.1s delay
        sleep 0.1
        
    done <<< "$URLS"
    
    # Clean up temp directory
    rm -rf "$tmp_dir"
    
    # Print summary
    echo ""
    echo "========================================="
    echo -e "${BLUE}Summary:${NC}"
    echo "  Total URLs tested: $total"
    echo -e "  ${GREEN}Matches: $matches${NC}"
    echo -e "  ${YELLOW}Differences: $diffs${NC}"
    if [ $errors -gt 0 ]; then
        echo -e "  ${RED}Errors: $errors${NC}"
    fi
    echo ""
    
    # Append summary stats to file
    echo "" >> "$summary_file"
    echo "Summary Statistics:" >> "$summary_file"
    echo "  Total: $total" >> "$summary_file"
    echo "  Matches: $matches" >> "$summary_file"
    echo "  Differences: $diffs" >> "$summary_file"
    echo "  Errors: $errors" >> "$summary_file"
    
    if [ $diffs -gt 0 ]; then
        echo -e "Differences saved to: ${BLUE}$diff_log${NC}"
        echo ""
        echo "To review differences:"
        echo "  cat $diff_log"
    fi
    
    # Return non-zero if there were differences
    [ $diffs -eq 0 ] && [ $errors -eq 0 ]
}

# Main execution
main() {
    echo ""
    echo "================================"
    echo "  Site Comparison Tool"
    echo "================================"
    echo ""
    
    check_dependencies
    load_config
    fetch_sitemap
    run_comparison
}

main
