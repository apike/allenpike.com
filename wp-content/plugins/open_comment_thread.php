<?php
/*
Plugin Name: Open phpBB Comment Thread
*/ 

include_once("$_SERVER[DOCUMENT_ROOT]/includes/atdb.php");
atdb_connect();

function open_thread($post_ID) {
   $postdata = get_postdata($post_ID);
   $content = apply_filters ('the_content', $postdata['Content']);

	$comments_forum = 15;
	$comments_title = "Comments: $postdata[Title]";

	$query = "INSERT INTO phpbb_topics
					SET forum_id = $comments_forum,
						topic_title = \"$comments_title\",
						topic_poster = 2,
						topic_time = ".time().",
						topic_blogid = $post_ID";
	atdb_query($query);
	
	$tid = mysql_insert_id();
						
	$query = "INSERT INTO phpbb_posts
					SET topic_id = $tid,
						forum_id = $comments_forum,
						poster_id = 2,
						post_time = ".time().",
						post_username = 'Allen'";
	atdb_query($query);

	$pid = mysql_insert_id();
	
	$opening_post = "This topic is for comments about the Altering Log blog post <a href='http://www.alteringtime.com/log/archives/$post_ID'>$postdata[Title]</a>. What do you think?";

	$query = "INSERT INTO phpbb_posts_text
					SET post_id = $pid,
						post_subject = \"$comments_title\",
						post_text = \"$opening_post\"";
	atdb_query($query);

   return $post_ID;
}

add_action('publish_post', 'open_thread');

?>