<?php
/*
Template Name: Linked List
*/
?>


<?php get_header(); ?>

    <h1>Links Elsewhere</h1>
    
    <p>Here are some links that I like and/or are relevant to Antipode.</p>

    <ul>

	<?php wp_list_bookmarks(); ?>	
	
	<li id="meta">
		<h2>Credits</h2>
		<ul>
			<li><a href="http://wordpress.org">Software by WordPress</a></li>
			<li><a href="http://www.dreamhost.com/r.cgi?apike">Hosting by Dreamhost</a></li>
			<li><a href="/resume/">Web design by myself</a></li>
			<?php wp_meta(); ?>
		</ul>
	</li>
    </ul>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
