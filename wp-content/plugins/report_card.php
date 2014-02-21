<?php
/*
Plugin Name: Blogger Report Card
Description: How are you doing?
Author: Allen Pike
Version: 0.1
Author URI: http://antipode.ca/
*/ 

function print_card() {
	global $wpdb;
	
	$seconds_in_day = 60*60*24;
	
	$ago = strtotime("1 year ago");
	$year_posts = $wpdb->get_var("SELECT COUNT(*) FROM wp_posts WHERE post_status = 'publish' AND post_date > FROM_UNIXTIME($ago) AND post_type = 'post'");
	$year_freq =  round(((time() - $ago) / $seconds_in_day) / $year_posts, 1);

	$ago = strtotime("2 months ago");
	$twomo_posts = $wpdb->get_var("SELECT COUNT(*) FROM wp_posts WHERE post_status = 'publish' AND post_date > FROM_UNIXTIME($ago) AND post_type = 'post'");
	$twomo_freq =  round(((time() - $ago) / $seconds_in_day) / $twomo_posts, 1);
	
	$last_post = $wpdb->get_var("SELECT UNIX_TIMESTAMP(MAX(post_date)) FROM wp_posts WHERE post_status = 'publish' AND post_type = 'post'");
	$days_ago = round((time() - $last_post) / $seconds_in_day, 1);
	
	echo "<p id='report_card'><b>$year_freq</b> days/post in the last year and <b>$twomo_freq</b> days/post in the last 2 months. Last post <b>$days_ago</b> days ago.</p>";
}

function dash_card() {
	global $wpdb;
	
	$query = "SET @tot := NOW()";
	$wpdb->query($query);
	
	$gaps_query = "SELECT gap, post_date FROM (SELECT ID, 
					post_date,
					(UNIX_TIMESTAMP(post_date) - UNIX_TIMESTAMP(@tot)) / (3600 * 24) AS gap,
					@tot := post_date
				FROM wp_posts
				WHERE post_status = 'publish' 
				    AND post_type = 'post'
				ORDER BY post_date) AS gaps
				WHERE post_date > NOW() - INTERVAL 1 YEAR
				ORDER BY post_date";
	$result = $wpdb->get_results($gaps_query);
	
	$query = "SELECT STD(gap) AS stddev, AVG(gap) AS average, MAX(gap) AS maximum FROM ($gaps_query) as recent_gaps";
	$stats = $wpdb->get_row($query);
	
	print "<h3>Posting Report Card</h3>
		<ul>
		    <li>Year's standard deviation: <b>".round($stats->stddev, 1)."</b>d</li>
		    <li>Year's average: <b>".round($stats->average, 1)."</b>d.</li>
		    <li>Year's maximum: <b>".round($stats->maximum, 1)."</b>d.</li>
		</ul>";

	foreach ($result as $post) {
		print round($post->gap,1).", ";
	}
}

add_action('activity_box_end', 'dash_card');

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_notices', 'print_card');

// We need some CSS to position the paragraph
function card_css() {
	echo "
	<style type='text/css'>
	#report_card {
		border: 1px dotted #AAEEAA;
		padding: 0.5em;
		margin: 1em 5%;
		background-color: #FAFFFA;
	}
	</style>
	";
}

add_action('admin_head', 'card_css');

?>