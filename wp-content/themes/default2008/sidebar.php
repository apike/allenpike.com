				</div>           
			</div>
	</div>

<div id='sidebar'>
	<div id='wrap-left'>
	    <div id='wrap-right'>
	        <div id='sidebar-head'><a href='/'>main</a> 
	            &#8226; <a href='/resume/'>resumé</a> 
	            &#8226; <a href='/archives/'>archives</a><hr />
            </div>
        </div>
	</div>
	<div id='sidebar-content'>
		

<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

	<li>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</li>
        <?php
        /*
	<li>
	        <a href='http://www.twitter.com/apike/'>Twitter</a>: Allen <?php aktt_latest_tweet(); ?>
        </li>
        */
        ?>
	
    <li><a href="/links/">Links Elsewhere</a></li>
	<li class='division'><a href='http://www.twitter.com/apike/'>Twitter Page</a></li>

    <li><a href='/me/'>About Allen</a></li>
	<li class='division'><a href='http://www.alteringtime.com/site/contact.php'>Contact</a></li>

	<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Posts RSS Feed'); ?>"><?php _e('Entries <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
	<li class='division'><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Comments RSS Feed'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>

	<li><a href="http://validator.w3.org/check/referer" title="Validate XHTML">Validate</a></li>
	</ul>

	<p>&copy; 2002-<?php print date("Y"); ?> Allen Pike</p>
	
<?php endif; ?>
	</div>
</div>