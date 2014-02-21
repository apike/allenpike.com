<?php
/*
Template Name: Antipode Archive
*/
?>


<?php get_header(); ?>

    <h1>Archival Footage</h1>
    
    <p>Browse the history of Antipode.</p>

	<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<h2>Post Types</h2>
	<ul>
	<li><a href='/type/article/'>Full articles</a></li>
	<li><a href='/type/link/'>Short links</a></li>
	<li><a href='/type/serious-news/'>Old Sarcastic News</a></li>
	</ul>

    <h2>Greatest Hits</h2>
    <ul>
        <li><strong>2008</strong>
            <ul>
            <li><a href='/2008/your-browsers-command-line/'>Your browser’s command line</a></li>
            <li><a href='/2008/seeing-red-css-sprite-borders/'>Seeing red: CSS sprite borders</a></li>
            <li><a href='/2008/one-week-of-safari/'>One week of Safari</a></li>
            </ul>
        </li>
        <li><strong>2007</strong>
            <ul>
            <li><a href='/2007/games-cores-and-functional-languages/'>Games, cores, and functional languages</a></li>
            <li><a href='/2007/death-to-unlimited/'>Death to ‘unlimited’</a></li>
            <li><a href='/2007/wanna-buy-an-isp/'>Worst ISP acquisition ever</a></li>
            </ul>
        </li>
        <li><strong>2006</strong>
            <ul>
            <li><a href='/2006/getting-people-to-do-boring-things-for-fun-and-profit/'>Getting people to do boring things for fun and profit</a></li>
            <li><a href='/2006/fantasytech-3-goto-fun/'>FantasyTech 3: GOTO FUN</a></li>
            <li><a href='/2006/vancouver-skytrain-anagram-map/'>Vancouver Skytrain anagram map</a></li>
            </ul>
        </li>
    </ul>

	<h2><?php _e('Time Warp'); ?></h2>
	<ul>
	<?php wp_get_archives('type=yearly'); ?>
	</ul>
    <h2><?php _e('Gratiutous Tag Cloud'); ?></h2>
    <?php wp_tag_cloud('smallest=10&largest=20&number=40'); ?>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
