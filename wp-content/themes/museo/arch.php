<?php
/*
Template Name: Antipode Archive
*/
?>


<?php get_header(); ?>

    <div class='post page arch'>

    	<span id='search'><?php include (TEMPLATEPATH . '/searchform.php'); ?></span>

        <h1>Archives</h1>
    
        <br><br> <!-- So sue me. -->

        <h2>Greatest Hits</h2>
        <ul>
            <li><strong>2010</strong>
                <ul>
                    <li><a href='/2010/choosing-a-viewport-for-ipad-sites/'>Choosing a viewport for iPad sites</a></li>
                    <li><a href='/2010/howto-start-a-technical-meetup/'>HOWTO start a technical meetup</a></li>
                    <li><a href='/2010/more-jslint-less-jswtf/'>More JSLint, less JSWTF</a></li>
                </ul>
            </lu>
            <li><strong>2009</strong>
                <ul>
                   <li><a href='/2009/the-california-guys/'>The California Guys</a></li>
                   <li><a href='/2009/primary-sources/'>Stop the fire hose: Primary sources</a></li>
                   <li><a href='/2009/themes-sproutcore-vs-cappuccino/'>Web app theme showdown</a></li>
                </ul>
            </li>
            <li><strong>2008</strong>
                <ul>
                   <li><a href='/2008/your-browsers-command-line/'>Your browser’s command line</a></li>
                   <li><a href='/2008/seeing-red-css-sprite-borders/'>Seeing red: CSS sprite borders</a></li>
                   <li><a href='/2008/cancelling-yes-or-no/'>Cancelling Yes or No</a></li>
                </ul>
            </li>
            <li><strong>2007</strong>
                <ul>
                   <li><a href='/2007/eas-ui-design-sucks-wont-let-you-play-hockey/'>EA won't let you play hockey</a></li>
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
        
        <h2>Post Types</h2>
    	<ul>
    	<li><a href='/type/article/'>Full articles</a></li>
    	<li><a href='/type/link/'>Short links</a></li>
    	<li><a href='/type/serious-news/'>Old Sarcastic News</a></li>
    	</ul>

    	<h2><?php _e('Time Warp'); ?></h2>
    	<ul>
    	<?php wp_get_archives('type=yearly'); ?>
    	</ul>
        <h2><?php _e('Gratiutous<br>Tag Cloud'); ?></h2>
        <?php wp_tag_cloud('smallest=10&largest=20&number=40'); ?>

    </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
