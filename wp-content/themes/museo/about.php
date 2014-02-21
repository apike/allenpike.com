<?php
/*
Template Name: Linked List
*/
?>


<?php get_header(); ?>

    <div class="page post bookmarks">

        <h1>Links Elsewhere</h1>
    
        <p><a href='/me/'>Allen and his projects</a></p>
        
        <p></p>

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
    </div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
