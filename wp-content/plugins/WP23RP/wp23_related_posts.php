<?php
/*
Plugin Name: WP 2.3 Related Posts
Version: 0.40
Plugin URI: http://fairyfish.net/2007/09/12/wordpress-23-related-posts-plugin/
Description: Generate a related posts list via tags of WorPdress 2.3
Author: Denis,PaoPao
Author URI: http://fairyfish.net/

Copyright (c) 2007
Released under the GPL license
http://www.gnu.org/licenses/gpl.txt

    This file is part of WordPress.
    WordPress is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

	INSTALL: 
	Just install the plugin in your blog and activate
*/

load_plugin_textdomain('wp23_related_posts',PLUGINDIR . '/' . dirname(plugin_basename (__FILE__)) );

function wp23_get_related_posts() {
	global $wpdb, $post;
	$now = current_time('mysql', 1);
	$tags = wp_get_post_tags($post->ID);

	//print_r($tags);

	$taglist = "'" . str_replace("'",'',str_replace('"','',urldecode($tags[0]->term_id))). "'";
	$tagcount = count($tags);
	if ($tagcount > 1) {
		for ($i = 1; $i <= $tagcount; $i++) {
			$taglist = $taglist . ", '" . str_replace("'",'',str_replace('"','',urldecode($tags[$i]->term_id))) . "'";
		}
	}
	
	$limit = get_option("wp23_RP_limit");
	
	if ($limit) $limitclause = "LIMIT $limit";
	$exclude = get_option("wp23_RP_exclude");
	if ( $exclude != '' ) {
	$excludeclause = "AND p.ID NOT IN (SELECT tr.object_id FROM $wpdb->term_relationships tr LEFT JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id WHERE tt.taxonomy = 'category' AND tt.term_id REGEXP '[$exclude]')";
	}
	
	$q = "SELECT DISTINCT p.*, count(t_r.object_id) as cnt FROM $wpdb->term_taxonomy t_t, $wpdb->term_relationships t_r, $wpdb->posts p WHERE t_t.taxonomy ='post_tag' AND t_t.term_taxonomy_id = t_r.term_taxonomy_id AND t_r.object_id  = p.ID AND (t_t.term_id IN ($taglist)) AND p.ID != $post->ID AND p.post_status = 'publish' AND p.post_date_gmt < '$now' $excludeclause GROUP BY t_r.object_id ORDER BY cnt DESC, p.post_date_gmt DESC $limitclause;";

	//echo $q;

	return $wpdb->get_results($q);
}

function wp23_related_posts(){

	$related_posts = wp23_get_related_posts() ;

	if ($related_posts){
		$wp23_RP_title = get_option("wp23_RP_title");
		if(!$wp23_RP_title) $wp23_RP_title= __("Related Post",'wp23_related_posts');
		echo '<h2>'.$wp23_RP_title.'</h2>';
		echo '<ul class="related_post">';
		foreach ($related_posts as $related_post ){
			$related_post_output = '';
			
			$related_post_output = $related_post_output . '<a href="'.get_permalink($related_post->ID).'" title="'.wptexturize($related_post->post_title).'">'.wptexturize($related_post->post_title).'</a>';
			
			$show_date = get_option("wp23_RP_Date");
			if ($show_date){
				$dateformat = 'F Y'; //Antipode custom
				$related_post_output = "<span class='leftcol'>". mysql2date($dateformat, $related_post->post_date) . "</span><span class='rightcol'>" . $related_post_output . "</span>";
			}
			
			$show_comments_count = get_option("wp23_RP_Comments");
			if ($show_comments_count){
				$related_post_output = $related_post_output . " (" . $related_post->comment_count . ")";
			}
			
			$related_post_output = "<li>" . $related_post_output . '</li>';
			
			echo $related_post_output;
		}
		echo '</ul>';
	} else {
		$wp23_no_RP_text = get_option("wp23_no_RP_text");
		if(!$wp23_no_RP_text) $wp23_RP_title= __("No Related Post",'wp23_related_posts');
		echo '<h3>'.$wp23_no_RP_text.'</h3>';
	}	
}

function wp23_related_posts_for_feed($content=""){
	$wp23_RP_RSS = (get_option("wp23_RP_RSS") == 'yes') ? 1 : 0;
	if ( (! is_feed()) || (! $wp23_RP_RSS)) return $content;

	$related_posts = wp23_get_related_posts() ;
	if($related_posts){
		$wp23_RP_title = get_option("wp23_RP_title");

		if(!$wp23_RP_title) $wp23_RP_title= __("Related Post",'wp23_related_posts');

		$content = $content . '<h3>'.$wp23_RP_title.'</h3><ul class="related_post">';

		foreach ($related_posts as $related_post ){
			$related_post_output = '<li>';
			
			$show_date = get_option("wp23_RP_Date");
			if ($show_date){
				$dateformat = get_option('date_format');
				$related_post_output = $related_post_output .  mysql2date($dateformat, $related_post->post_date) . " -- ";
			}
			
			$related_post_output = $related_post_output . '<a href="'.get_permalink($related_post->ID).'" title="'.wptexturize($related_post->post_title).'">'.wptexturize($related_post->post_title).'';
			
			$show_comments_count = get_option("wp23_RP_Comments");
			if ($show_comments_count){
				$related_post_output = $related_post_output . " (" . $related_post->comment_count . ")";
			}
			
			$related_post_output = $related_post_output . '</a></li>';
			
			$content = $content .  $related_post_output;
		}
		$content = $content . '</ul>';
	}
	
	return $content;
}

add_filter('the_content', 'wp23_related_posts_for_feed',99);

add_action('admin_menu', 'wp23_add_related_posts_options_page');

function wp23_add_related_posts_options_page() {
	if (function_exists('add_options_page')) {
		add_options_page( __('WP23 Related Posts','wp23_related_posts'), __('WP23 Related Posts','wp23_related_posts'), 8, basename(__FILE__), 'wp23_related_posts_options_subpanel');
	}
}

function wp23_related_posts_options_subpanel() {
	if ($_POST['wp23_RP_stage'] == 'process') {
       	update_option('wp23_RP_title', $_POST['wp23_RP_title_option']);
		update_option('wp23_no_RP_text', $_POST['wp23_no_RP_text_option']);
		update_option('wp23_RP_limit', $_POST['wp23_RP_limit_option']);
		update_option('wp23_RP_exclude', $_POST['wp23_RP_exclude_option']);
		update_option('wp23_RP_RSS', $_POST['wp23_RP_RSS_option']);
		update_option('wp23_RP_Comments', $_POST['wp23_RP_Comments_option']);
		update_option('wp23_RP_Date', $_POST['wp23_RP_Date_option']);
	}
?>
    <div class="wrap">
        <h2 id="write-post"><?php _e("Related Posts Options&hellip;",'wp23_related_posts');?></h2>
        <p><?php _e("WordPress 2.3 Related Posts Plugin will generate a related posts via WordPress 2.3 tags, and add the related posts to feed.",'wp23_related_posts');?></p>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php echo basename(__FILE__); ?>">
            <input type="hidden" name="wp23_RP_stage" value="process" />
            <fieldset class="options">
                <legend><?php _e("Related Posts Preference",'wp23_related_posts');?></legend>
                <table>
                    <tr>
                        <td valign="top" align="right"><?php _e("Related Posts Title:",'wp23_related_posts'); ?></td>
                        <td>
							<input type="text" name="wp23_RP_title_option" value="<?php echo get_option("wp23_RP_title"); ?>" />
						</td>
                    </tr>
                    <tr>
                        <td valign="top" align="right"><?php _e("No Related Posts Text:",'wp23_related_posts'); ?></td>
                        <td>
							<input type="text" name="wp23_no_RP_text_option" value="<?php echo get_option("wp23_no_RP_text"); ?>" />
						</td>
                    </tr>
                    <tr>
                        <td valign="top" align="right"><?php _e("Limit:",'wp23_related_posts');?></td>
                        <td>
							<input type="text" name="wp23_RP_limit_option" value="<?php echo get_option("wp23_RP_limit"); ?>" />
						</td>
                    </tr>
                    <tr>
                        <td valign="top" align="right"><?php _e("Exclude(category IDs):",'wp23_related_posts');?></td>
                        <td>
							<input type="text" name="wp23_RP_exclude_option" value="<?php echo get_option("wp23_RP_exclude"); ?>" />
						</td>
                    </tr>
					<tr>
						<td valign="top" align="right">
						<?php
							if ( get_option("wp23_RP_RSS") == 'yes' ) {
								echo '<input name="wp23_RP_RSS_option" type="checkbox" value="yes" checked>';
							} else {
								echo '<input name="wp23_RP_RSS_option" type="checkbox" value="yes">';
							}
						?>
						</td>
						<td>
                        <?php _e("Related Posts for RSS",'wp23_related_posts');?>
						</td>
					</tr>
					<tr>
						<td valign="top" align="right">
						<?php
							if ( get_option("wp23_RP_Comments") == 'yes' ) {
								echo '<input name="wp23_RP_Comments_option" type="checkbox" value="yes" checked>';
							} else {
								echo '<input name="wp23_RP_Comments_option" type="checkbox" value="yes">';
							}
						?>
						</td>
						<td>
                        <?php _e("Display Comments Count",'wp23_related_posts');?>
						</td>
					</tr>
					<tr>
						<td valign="top" align="right">
						<?php
							if ( get_option("wp23_RP_Date") == 'yes' ) {
								echo '<input name="wp23_RP_Date_option" type="checkbox" value="yes" checked>';
							} else {
								echo '<input name="wp23_RP_Date_option" type="checkbox" value="yes">';
							}
						?>
						</td>
						<td>
                        <?php _e("Display Post Date",'wp23_related_posts');?>
						</td>
					</tr>
				</table>
            </fieldset>
            <p class="submit"><input type="submit" value="<?php _e("Update Preferences &raquo;");?>" name="Submit" /></p>
        </form>
    </div>
<?php }?>