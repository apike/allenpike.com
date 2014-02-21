<?php 

$show_adsense = 1;

get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class='post-nav'>
			    <span class='next'><?php next_post_link('%link', 'Newer'); ?>&nbsp;</span>
			    <span class='prev'>&nbsp;<?php previous_post_link('%link', 'Older', true, 40); ?></span>
				<span class='date-minor'><?php the_time('F'); ?>
    				<?php the_time('j'); ?>
    				<span class='date-major'><?php the_time('Y'); ?></span>
				</span>

			</div>
	
			<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
			<div class="postentry">
			<?php the_content(__('Read the rest of this entry &raquo;')); ?>
			<?php wp_link_pages(); ?>
			</div>

			<?php edit_post_link(__('Edit'), ' &#183; ', ''); ?>
			
		</div>

    <div class='post page'>
    	<?php wp23_related_posts(); ?>

    	<p class="postmeta"> 
    		<?php the_tags('<span class="leftcol">See also</span> <span class="rightcol">'); ?></span>
    	</p>

    	<?php comments_template(); ?>
    </div>
				
	<?php endwhile; else : ?>

		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but the page you requested cannot be found.'); ?></p>
		
		<h3><?php _e('Search'); ?></h3>
		
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>


<?php get_footer(); ?>


