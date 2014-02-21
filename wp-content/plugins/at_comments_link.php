<?php
/*
Plugin Name: Print AT Comments Links
*/ 
include_once("$_SERVER[DOCUMENT_ROOT]/includes/atdb.php");

function print_at_comments_link()
	{
	global $id;
	$query = "SELECT topic_id, topic_replies
					FROM phpbb_topics
					WHERE topic_blogid = $id";
	$result = atdb_query($query);
	if (mysql_num_rows($result))
		{
		$thread = atdb_next($result);
		$s = sify($thread[topic_replies]);
		print "<a href='http://www.alteringtime.com/forum/viewtopic.php?t={$thread[topic_id]}'> $thread[topic_replies] comment$s in the Altering Time Forum</a>.";
		}
	else
		comments_popup_link(__('Comment!'), __('1 Comment'), __('% Comments'));
	}
?>
