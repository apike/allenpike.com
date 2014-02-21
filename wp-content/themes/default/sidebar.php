				</div>           
			</div>
	</div>

<div id='sidebar'>

	<div id='sidebar-content'>
	    
	    
		<a href='/' id='logo'><h1>Antipode</h1></a>
		


<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>


        <?php
        /*
	<li>
	        <a href='http://www.twitter.com/apike/'>Twitter</a>: Allen <?php aktt_latest_tweet(); ?>
        </li>
        */
        ?>
    <li><a href='/' title='Blog front page'>log</a></li>
    <li class='division' title='Browse older blog entries'><a href='/archives/'>archives</a></li>


    <li><a href='/me/' title='About Allen Pike'>allen</a></li>
    <li><a href='/resume/'title="Allen's programming Resumé">resumé</a></li>
    <li class='division'><a  title='Contact Allen' href='http://www.alteringtime.com/site/contact.php'>contact</a></li>

    <li><a  title="Allen's Twitter page" href='http://www.twitter.com/apike/'>twitter</a></li>
    <li class='division'><a href="/links/"  title='Links to friends and projects'>elsewhere</a></li>

	<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Posts RSS Feed'); ?>"><?php _e('feed'); ?></a></li>
	<li class='division'><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Comments RSS Feed'); ?>"><?php _e('comments'); ?></a></li>

	</ul>

	
	
<?php endif; ?>
	</div>

	<div id='wrap-left'>
	    <div id='wrap-right'>
	        <div id='sidebar-foot'>

            	<p>&copy; 2002-<?php print date("Y"); ?> Allen Pike</p>
            </div>
        </div>
	</div>

</div>