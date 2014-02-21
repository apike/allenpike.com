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
				
		
			<?php if (!$archives_mode) { ?>

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
    			<div class='date-box'>
    				<span class='date-minor'><?php the_time('F'); ?>
    				<span class='date-major'><?php the_time('j'); ?></span>
    				<?php the_time('Y'); ?></span>
    			</div>

                <h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>

    		<?php endwhile; ?>
            </div>
                
            <?php } //end if archives mode?>

				
				<!--
				<?php trackback_rdf(); ?>
				-->
			
				

		<p id='pagination'><?php posts_nav_link(' &#183; ', __(''), __('')); ?></p>


		
		<?php include(TEMPLATEPATH. '/more.php'); ?>
		
	<?php else : ?>

		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but no posts matched your criteria.'); ?></p>
		
		<h3><?php _e('Search'); ?></h3>
		
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	<?php get_footer(); ?>


