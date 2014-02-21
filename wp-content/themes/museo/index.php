<?php get_header(); ?>

	<?php if (have_posts()) : ?>
	
		<?php $post = $posts[0]; // Thanks Kubrick for this code ?>
		<?php $archives_mode = 0; ?>
		
		<?php if (is_category()) { ?>				
		<h2><?php $archives_mode = 1; ?> <?php echo single_cat_title(); ?> Archive</h2>
		
 	  	<?php } elseif (is_day()) { ?>
		<h2><?php _e('Archive for'); $archives_mode = 1; ?> <?php the_time('F j, Y'); ?></h2>
		
 	  	<?php } elseif (is_tag()) { ?>
		<h2><?php $archives_mode = 1; ?> <?php echo single_tag_title(); ?> Archive </h2>
		
	 	<?php } elseif (is_month()) { ?>
		<h2><?php _e('Archive for'); $archives_mode = 1; ?> <?php the_time('F, Y'); ?></h2>

		<?php } elseif (is_year()) { ?>
		<h2><?php _e('Archive for'); $archives_mode = 1; ?> <?php the_time('Y'); ?></h2>

		<?php } elseif (is_author()) { ?>
		<h2><?php _e('Author Archive'); ?></h2>

		<?php } elseif (is_search()) { ?>
		<h2><?php _e('Search Results'); ?></h2>

		<?php } ?>
				
				
			<?php if (is_home()) { ?>
			    
			    <p class='leader'>I craft apps, from pixels to code. I run <a href='http://www.steamclock.com/'>Steamclock Software</a>, teach at <a href='http://www.sfu.ca/'>SFU</a>, and curate <a href="http://www.vanjs.com">VanJS</a>. I write here and on <a href='http://www.twitter.com/apike'>Twitter</a>.</p>
			    
			    <h2 class='leftcol'>Recently</h2>

        		<?php 
        		    $postcount = 0;
        		
        		    while (have_posts()) : the_post();
        		    
        		    if ($postcount++ > 10) {
        		        $last_year = get_the_time('Y');
        		        print "<span class='leftcol'>More articles</span>".
        		              "<span class='rightcol'><a href='/$last_year'/>Archive for $last_year</a></span>";
        		        break;
        		    }
        		?>
        		    
    		        <span class='leftcol'><?php the_time('F Y'); ?></span>
    		        <span class='rightcol'><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></span>

        		<?php endwhile; ?>
        		
        		<h2 class='leftcol'>What I do</h2>
        		
                        <span class='leftcol'><a href="http://www.steamclock.com/">Steamclock</a></span>
                        <span class='rightcol'>
                                Creating wonderful apps in Vancouver.
                        </span>

                        <span class='leftcol'><a href="http://www.steamclock.com/partymonster/">Party Monster</a></span>
                        <span class='rightcol'>
                                A beautifully simple DJ for iOS.
                        </span>

                        <span class='leftcol'><a title="Vancouver Javascript Developers Meetup" href="http://www.meetup.com/vancouver-javascript-developers/">VanJS</a>
                        </span>
                        <span class='rightcol'>The Vancouver Javascript Developers group.</span>
                    
                        <span class='leftcol'><a href="/resume/">Resume</a></span>
                        <span class='rightcol'>The executive summary.</span>

                        <span class='leftcol'><a href="http://www.dribbble.com/apike">Dribbble</a></span>
                        <span class='rightcol'>Snippets of design.</span>

                        <span class='leftcol'><a href="/projects/">All Projects</a></span>
                        <span class='rightcol'>The grand list.</span>

            <h2>Greatest Hits</h2>
            
                <span class='leftcol'>2012</span> 
                <span class='rightcol'>
                        <a href='/2012/speciation-in-computing/'>Speciation in computing</a><br>
                        <a href='/2012/anchoring-startups/'>Anchoring startups</a></li><br>
                </span>

                <span class='leftcol'>2011</span> 
                <span class='rightcol'>
                        <a href='/2011/design-your-way-out-of-that-paper-bag/'>Design your way out of that paper bag</a><br>
                        <a href='/2011/providing-joy-at-60-fps/'>Providing joy at 60 fps</a></li><br>
                </span>
                <span class='leftcol'>2010</span> 
                <span class='rightcol'>
                        <a href='/2010/choosing-a-viewport-for-ipad-sites/'>Choosing a viewport for iPad sites</a><br>
                        <a href='/2010/howto-start-a-technical-meetup/'>HOWTO start a technical meetup</a></li><br>
                </span>
                <span class='leftcol'>2009</span>
                <span class='rightcol'>
                       <a href='/2009/the-california-guys/'>The California Guys</a><br>
                       <a href='/2009/primary-sources/'>Stop the fire hose: Primary sources</a>
                </span> 
                
                <span class='leftcol'>2008</span>
                <span class='rightcol'>
                       <a href='/2008/your-browsers-command-line/'>Your browser’s command line</a><br>
                       <a href='/2008/cancelling-yes-or-no/'>Cancelling Yes or No</a></li> 
                </span>
                
                <span class='leftcol'>2007</span>
                <span class='rightcol'>
                       <a href='/2007/death-to-unlimited/'>Death to ‘unlimited’</a><br> 
                       <a href='/2007/wanna-buy-an-isp/'>Worst ISP acquisition ever</a></li> 
                </span> 
                
                <span class='leftcol'>2006</span>
                <span class='rightcol'>
                       <a href='/2006/fantasytech-3-goto-fun/'>FantasyTech 3: GOTO FUN</a><br>
                       <a href='/2006/getting-people-to-do-boring-things-for-fun-and-profit/'>Getting people to do boring things</a>
                </span>
            
		
			<?php } else if (!$archives_mode) { ?>

    		<?php while (have_posts()) : the_post(); ?>

    		<div class="post" id="post-<?php the_ID(); ?>">

    			<div class='date-box'>
    				<span class='date-minor'><?php the_time('F'); ?>
    				<span class='date-major'><?php the_time('j'); ?></span>
    				<?php the_time('Y'); ?></span>
    			</div>

    			<?php edit_post_link(__('Edit'), '<span style="float: right">', '</span>'); ?>
    			<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
        				
				<div class="postentry">
					
					<?php if (is_search()) { ?>
						<?php the_excerpt() ?>
					<?php } else { ?>
						<?php the_content(__('Read the rest of this entry &raquo;')); ?>
					<?php } ?>
					</div>
				
					<?php $is_link = in_category(40); // #40 is a link. ?>
			
					<p class="postfeedback">
					<?php if (!$is_link) { the_tags('see also<br>', '<br>'); } ?><br>
					<?php
						print (!$is_link ? '<b>' : '');
						print_at_comments_link(); 
						print (!$is_link ? '</b>' : '');
					?>

    			    </p>
    			</div>

    		<?php endwhile; ?>

			<?php } else { //end if not archives mode ?>

            <div class="post archive">

    		<?php while (have_posts()) : the_post(); ?>
    			<div>
    				<span class='leftcol'><?php the_time('F Y'); ?></span>
                    <span class='rightcol'><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></span>
    			</div>

    		<?php endwhile; ?>
            </div>
            

            <hr>
                <span class='leftcol'>
                    By year
                </span>
                <span class='rightcol'>
                    <ul id='year-archives'>
                    <?php wp_get_archives('type=yearly'); ?>
                    </ul>
                </span>
                
            <?php } //end if archives mode?>

				
				<!--
				<?php trackback_rdf(); ?>
				-->
			
				
	    <?php if (!is_home()) { ?>

        	<p id='pagination'><?php posts_nav_link(' &#183; ', __(''), __('')); ?></p>
		
		<?php } ?>
		
	<?php else : ?>

		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but no posts matched your criteria.'); ?></p>
		
		<h3><?php _e('Search'); ?></h3>
		
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	<?php get_footer(); ?>


