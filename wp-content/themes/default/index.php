<?php get_header(); ?>

	<?php if (have_posts()) : ?>
	
		<?php $post = $posts[0]; // Thanks Kubrick for this code ?>
		<?php $archives_mode = 0; ?>
		
		<?php if (is_category()) { ?>				
		<h2>$archives_mode = 1; ?> <?php echo single_cat_title(); ?> Archive</h2>
		
 	  	<?php } elseif (is_day()) { ?>
		<h2><?php _e('Archive for'); $archives_mode = 1; ?> <?php the_time('F j, Y'); ?></h2>
		
	 	<?php } elseif (is_month()) { ?>
		<h2><?php _e('Archive for'); $archives_mode = 1; ?> <?php the_time('F, Y'); ?></h2>

		<?php } elseif (is_year()) { ?>
		<h2><?php _e('Archive for'); $archives_mode = 1; ?> <?php the_time('Y'); ?></h2>

		<?php } elseif (is_author()) { ?>
		<h2><?php _e('Author Archive'); ?></h2>

		<?php } elseif (is_search()) { ?>
		<h2><?php _e('Search Results'); ?></h2>

		<?php } ?>
				
		<?php while (have_posts()) : the_post(); ?>
		
			<div class="post" id="post-<?php the_ID(); ?>">
	
				<div class='date-box'>
					<span class='date-minor'><?php the_time('F'); ?>
					<span class='date-major'><?php the_time('j'); ?></span>
					<?php the_time('Y'); ?></span>
				</div>

				<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
				<?php if (!$archives_mode) { ?>
				<div class="postentry">
					
					<?php if (is_search()) { ?>
						<?php the_excerpt() ?>
					<?php } else { ?>
						<?php the_content(__('Read the rest of this entry &raquo;')); ?>
					<?php } ?>
					</div>
				
					<?php $is_link = in_category(40); // #40 is a link. ?>
			
					<p class="postfeedback">
					<?php
						print (!$is_link ? '<b>' : '');
						print_at_comments_link(); 
						print (!$is_link ? '</b>' : '');
					?>
					&#183; 
					<?php the_tags('see also '); ?>
				
					&#183; 
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>" class="permalink"><?php _e('Permalink'); ?></a> 

					<?php edit_post_link(__('Edit'), ' &#183; ', ''); ?>
				<?php } //end if not archives mode ?>

			</p>
				
				<!--
				<?php trackback_rdf(); ?>
				-->
			
			</div>
				
			<hr class='post-division' />
		
		<?php endwhile; ?>

		<p><?php posts_nav_link('', __(''), __('&laquo; Previous entries')); ?>
		<?php posts_nav_link(' &#183; ', __(''), __('')); ?>
		<?php posts_nav_link('', __('Next entries &raquo;'), __('')); ?></p>
		
		<?php include(TEMPLATEPATH. '/more.php'); ?>
		
	<?php else : ?>

		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but no posts matched your criteria.'); ?></p>
		
		<h3><?php _e('Search'); ?></h3>
		
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	<?php get_sidebar(); ?>

	<?php get_footer(); ?>


