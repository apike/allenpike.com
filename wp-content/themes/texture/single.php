<?php 

$show_adsense = 1;

get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class='date-box'>
				<span class='date-minor'><?php the_time('F'); ?>
				<?php the_time('j'); ?>
				<span class='date-major'><?php the_time('Y'); ?></span></span>
			</div>
	
			<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
			<div class="postentry">
			<?php the_content(__('Read the rest of this entry &raquo;')); ?>
			<?php wp_link_pages(); ?>
			</div>

			<p class="postfeedback">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>" class="permalink"><?php _e('Permalink'); ?></a> 
			<?php edit_post_link(__('Edit'), ' &#183; ', ''); ?>
			<?php print_at_comments_link(); ?>
			</p>
			
		</div>

    <div class='post page'>
    	<?php wp23_related_posts(); ?>

    	<p class="postmeta"> 
    		<?php the_tags('See also: '); ?>
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


