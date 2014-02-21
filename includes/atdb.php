<?php

/*
Altering Time Database Utilities Version 4 - August 2004

This could/would/should be an object of some sort when PHP 5 comes out.

Essentials:
atdb_connect() - Connects
atdb_result($query) - Returns MySQL result set
atdb_next($result) - Pulls the next row from the result set
atdb_num($result) - Returns how many rows in result

Useful:
atdb_onerow($query) - Returns first row as array
atdb_value($query, $column) - Returns column specified in the first row
atdb_count($query) - Returns number of rows query matches
atdb_escape($arg) - Escapes something so it can be safely inserted
*/

include_once('utils.php');

function atdb_connect($datab = 'atdb')
{
$query_start = getMicroTime();
//die("atdb_connect");

if ($datab == 'atdb')
	{
	global $offline_testing;
	
	if (!$offline_testing)
		{
		$use = "atadmin";
		$word = "f33lgr8t";
		$serv = "mysql.alttim.com";
		}
	else
		{
		$use = "root";
		$word = "";
		$serv = "localhost";
		}
	}
else
	{
	die("no such database in this atdb file.");
	}
	
$site = "Altering Time";
$admin = "webmaster@alteringtime.com";

$returner = 0;
$tries = 0;

$returner = mysql_pconnect($serv, $use, $word);

//Try to connect 5 times.
while ($tries < 5 && !$returner)
	{
	$returner = @mysql_pconnect($serv, $use, $word);
	
	usleep(10000 * $tries); //100th of a second per try
	$tries++;
	}

if ($returner)
	mysql_select_db($datab);
else
	print "<i>Database temporarily unavailable.</i>";

global $db_time;
$db_time += (getMicroTime() - $query_start);
return $returner; //will == 0 if failed*/
}

function atdb_num($result)
	{
	return mysql_num_rows($result);
	}

function atdb_changed()
	{
	return mysql_affected_rows();
	}
	
function atdb_inserted()
	{
	return mysql_insert_id();
	}

function atdb_query($query, $email_error = 0)
{ //Gets a MySQL result set. Optional parameter for automated scripts to email admin on error.
$query_start = getMicroTime();

if (is_array($query))
	{
	foreach($query as $one_q)
		$result = atdb_query($one_q);
	}
else
	{
	if (!$result = mysql_query($query))
		{
		print	"<div class='error'>
					Database error: ". mysql_error() 
					."\n<!-- Query causing error: $query -->
					</div>";
		
		global $email_database_errors;
		if ($email_error)
			$email_database_errors = 'Default';
			
		if ($email_database_errors)
		 {
		 mail($admin, "[Auto SQL Error] - $email_database_errors", 
			"Automated mySQL error with Altering Time at ". date("m d, g:i a") .".\n\nThe call:\n" . mysql_escape_string($query) .
			"\n\nThe error:\n" . mysql_escape_string(mysql_error()),
		  "From: Altering Time <webmaster@alteringtime.com>\r\n"
		 ."Reply-To: webmaster@alteringtime.com\r\n"
		 ."X-Mailer: PHP/" . phpversion());
		 }   
		$result = NULL;
		}
	else //success
		{
		global $db_time;
		global $db_queries;
		$db_queries++;
		$query_time = (getMicroTime() - $query_start);
		$db_time += $query_time; //add to time for DB access
	
		global $database_print_mode;
		global $is_admin;
		global $userdata;
		
		if ($database_print_mode || ($is_admin && $query_time > 0.05) && isset($userdata))
			{
			$query_style = '';
			if ($query_time > 0.1)
				$query_style .= "font-weight: bold;";
			if ($query_time > 0.5)
				$query_style .= "color: #AA0000;";
			
			$search = array('"',"'", "\r\n", "\n", "\r");
			$replace = array('\"','\"' ,'<br>', '<br>', '<br>');
			
			$escaped_query = str_replace($search, $replace, htmlspecialchars($query));
			
			//print "<div class='db_query' style='$query_style'>$query [".round($query_time, 3)."]</div>";
			print "<span class='query_tip' style='$query_style'>(q".round($query_time, 2)."s <span class='query_text'> - $escaped_query</span>)</span>";
			}
		}
	}
	return $result;
}

function atdb_onerow($query, $email_error = 0)
{ //gets just the first row returned by that query as an array.
   if ($result = atdb_query($query, $email_error))
	{
	   if (!$result = mysql_fetch_array($result))
		 print "(No array to fetch.)";
	}
   return $result;
}

function atdb_next($result_set)
{ //gets the next array in the result set, if there is one.
	if ($array = mysql_fetch_array($result_set, MYSQL_ASSOC))
		return $array;
	else
		return 0;
}

function atdb_value($query, $column = 'value', $email_error = 0)
{ //gets the specified data from the first row returned by that query.
   $result = atdb_onerow($query, $email_error);
   if (!isset($result[$column]))
	 return "(No such column as $column. <!-- Error from $query -->)";
   else
     return $result[$column];
}

function atdb_count($query, $email_error = 0)
{ //gets the number of rows returned by that query.
   $result = atdb_query($query, $email_error);
   
   return mysql_num_rows($result);
}

function atdb_affect($query)
{
	atdb_query($query);
	return mysql_affected_rows();
}

function atdb_escape($arg)
{
	return trim(mysql_escape_string($arg));
}

?>