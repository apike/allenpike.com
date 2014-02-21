<?php
//Allen's PHP Utilities, Version 7, Feb 2005

include_once('karmacalc.php');

function getRedGreen($value, $min, $max, $max_col = 127, $default_gray = 0)
	{
	//convert a value to red or green, given 
   $red = 0;
	$green = 0;

	$zero_value = $max + $min; //the middle value between max and min
	//$value -= $zero_value; //adjust $value so that the middle between max and min will now be zero

	
	if ($value <= 0)
	   {
		$shift = $max_col / $min;
	   $red = $value * $shift;
	   if ($red > $max_col)
	 	   $red = $max_col;
	   }	
	else 
	   {
		$shift = $max_col / $max;
		//print "[$value: ($shift = $min / -$max_col)]";
	   $green = $value * $shift;
	   //print "[$green = $value * $shift;]";
		if ($green > $max_col)
			 $green = $max_col;
	   }
		
	if ($default_gray == 1)
		{
		if ($green)
			{
			$color = sprintf("#%02X%02X%02X",($max_col - $green),$max_col,($max_col - $green));
			}
		else
			{
			$color = sprintf("#%02X%02X%02X",$max_col,($max_col - $red),($max_col - $red));
			}
		}
	else
		$color = sprintf("#%02X%02X%02X",$red,$green,0);
		
	return $color;
	}



function selectify($contents, $name = 'no_name_box', $active_option = '', $style = '')
	{
	if ($style)	
		$extra = " style='$style'";
	
		$select_box = "<select name='$name' id='$name' $extra>";
	if ($contents)
		{
		foreach($contents as $key => $value)
			{
			$is_equal = ($active_option ? $key == $active_option : $key === $active_option);
			$selected = $is_equal ? 'selected' : '';
			$select_box .= "
			<option value='$key' $selected>$value</option>";
			}
		}
	else
		{
		$select_box .= "<option>No options.</option>";
		}
	$select_box .= "</select>";
		
	return $select_box;
	}

function power($base, $exponent)
	{
	//stupid workaround for PHP4 not accepting negative bases for pow
	if ($base > 0)
		{
		return pow($base, $exponent);
		}
	else
		{
		return pow($base * -1, $exponent) * -1;
		}
	}

function getMicroTime()
	{
	$micro = explode(" ", microtime());
	$usec = $micro[0];
	$sec = $micro[1];
	return ((float)$usec + (float)$sec); //time such as 1.438 in seconds
	}
	
function swapRow($row_class)
	{//dead simple, takes a row class and gives a swapped class:
	if ($row_class == 'darkRow')
		return 'lightRow';
	else
		return 'darkRow';
	}

function gapHelper($units, $value, $short)
	{
	if ($short)
		return "$value".$units[0]; //just first letter
	else
		return "$value $units". ($value == 1 ? '' : 's'); //whole word
	}
		
function getGap($time1, $time2, $short = 0)
{
	$seconds = abs($time1 - $time2);
	
	if ($seconds > 120)
		{
		$minutes = round($seconds / 60);
		if ($minutes > 120)
			{
			$hours = round($minutes / 60);
			if ($hours > 48)
				{
				$days = round($hours / 24);
				if ($days > 14)
					{
					$weeks = round($days / 7);
					if ($weeks > 8)
						{
						$months = round($weeks / 4.3);
						$answer = gapHelper('month', $months, $short);
						}
					else
						{
						$answer = gapHelper('week', $weeks, $short);
						}
					}
				else
					{
					$answer = gapHelper('day', $days, $short);
					}
				}
			else
				{
				$answer = gapHelper('hour', $hours, $short);
				}
			}
		else
			{
			$answer = gapHelper('minute', $minutes, $short);
			}
		}
	else
		{
		$answer = gapHelper('second', $seconds, $short);
		}
		
	return $answer;

}

function timeAgo($ago, $short=0)
	{
	return getGap($ago, strtotime("now"), $short) . " ago";
	}

function intify($value)
	{
	return (int)$value;
	}
	
function hsbToRgb ($H, $S, $V)
	{
	if ($H > 1 || $S > 1 || $V > 1)
		die("<p class='error'>H, S, and V need to be less than 1.</p>");
		
	//from http://www.easyrgb.com/math.php?MATH=M21#text21
		if ( $S == 0 )                       //HSV values = From 0 to 1
		{
			$R = $V * 255;                      //RGB results = From 0 to 255
			$G = $V * 255;
			$B = $V * 255;
		}
		else
		{
			$var_h = $H * 6;
			$var_i = floor( $var_h );             //Or ... var_i = floor( var_h )
			$var_1 = $V * ( 1 - $S );
			$var_2 = $V * ( 1 - $S * ( $var_h - $var_i ) );
			$var_3 = $V * ( 1 - $S * ( 1 - ( $var_h - $var_i ) ) );
		
			if      ( $var_i == 0 ) { $var_r = $V     ; $var_g = $var_3 ; $var_b = $var_1; }
			else if ( $var_i == 1 ) { $var_r = $var_2 ; $var_g = $V     ; $var_b = $var_1; }
			else if ( $var_i == 2 ) { $var_r = $var_1 ; $var_g = $V     ; $var_b = $var_3; }
			else if ( $var_i == 3 ) { $var_r = $var_1 ; $var_g = $var_2 ; $var_b = $V ;    }
			else if ( $var_i == 4 ) { $var_r = $var_3 ; $var_g = $var_1 ; $var_b = $V;     }
			else                   { $var_r = $V     ; $var_g = $var_1 ; $var_b = $var_2; }
		
			$R = $var_r * 255;              //RGB results = From 0 to 255
			$G = $var_g * 255;
			$B = $var_b * 255;
		}
		
	return sprintf("%02X%02X%02X",$R,$G,$B); //htmlcolor
	}
	
function sify($value)
	{
	if ($value == 1)
		return '';
	else
		return 's';
	}
	
function printResult($result)
		{
		print "<table class='faithTable'>";
		
		while ($row = atdb_next($result))
			{
			if (!$headered)
				{
				print "<tr class='headerRow'>";
				
				foreach ($row as $key => $val)
					print "<td>$key</td>";
					
				print "</tr>";
				
				$headered = 1;
				}
				
			$class = swapRow($class);
			
			print "<tr class='$class'>";
			
			foreach ($row as $val)
				print "<td>$val</td>";
			
			print " </tr>";
			}
			
		print "</table>";
		
		}

function pra($array)
	{
	print "<pre>";
	print_r($array);
	print "</pre>";
	}

function goEmail($email_to, $email_from, $email_subject, $email_text)
	{
	$email_headers =
			"From: $email_from\r\n".
			"Cc: $email_from\r\n".
			"Reply-To: $email_from\r\n".
			"Organization: Altering Time\r\n".
			"X-Mailer: PHP/". phpversion() . "\r\n".
			"X-AntiAbuse: Servername - {$_SERVER['SERVER_NAME']}\r\n".
			"MIME-Version: 1.0\r\n".
			"Content-type: text/plain; charset=iso-8859-1\r\n".
			"Message-ID: <".md5(uniqid(time()))."@{$_SERVER['SERVER_NAME']}>\r\n";

	mail($email_to, $email_subject, $email_text, $email_headers, "-f$email_from");
	
	}


function formatOrdinal($input)
{
	//Get st, nd, rd, or th (i.e. 1st)
	
	$number = $input % 100;
	
	if ($number > 10 && $number < 19) //all th
	  $ordinal = "th";
	else if ($number % 10 == 1)
	  $ordinal = "st";
	else if ($number % 10 == 2)
	  $ordinal = "nd";
	else if ($number % 10 == 3)
	  $ordinal = "rd";
	else
	  $ordinal = "th"; //usual
	
	return "$input<sup>$ordinal</sup>";
}


function bound($lower, $value, $upper)
	{
	if ($lower > $upper)
		{
		print "<p class='error'>Bound error.</p>";
		return 0;
		}
	else
		return max(min($value, $upper), $lower);
	}

function logscale($value, $scale, $base = M_E)
	{
	//returns a value from 0.0 to 1.0 based on a scale and an exponent base.
	$bounded_value = bound(1,$value + 1,pow($base,$scale));
	$returner = log($bounded_value, $base) / $scale;
	return $returner;
	}
	

function logScaleTest($scale, $base = M_E)
	{
	//run through different outputs of a logscale from 0 to 1.
	print "<h3>LogScale Test for Scale = $scale and Base = $base</h3> <table>";
	$increment = -8;
	$tries = 0;
	while (($output = logscale($value = pow(2,$increment), $scale, $base)) < 0.99)
		{
		if ($value >= 1)
			$value = formatNumber($value);
			
		print "<tr><td>$value</td><td>></td><td>".round($output,3)."</td></tr>";
		$increment++;
		$tries++;
		}
	print "</table>";
	}

function ellipsify($value, $max = 30)
	{
	if (strlen($value) > $max)
		return substr($value, 0, ($max - 3)) . "...";
	else
		return $value;
	}


function formatNumber($number)
	{
	return number_format($number);
	}
	
function unformatNumber($number)
	{
	$separators = array(',', ' ');
	return str_replace($separators, '', $number);
	}

function interpretTrackerStatus($status)
		{
		$closed_color = "883333";
		$attention_color = "338833";
		$normal_color = "333388";

		$status = strtoupper($status);

		$statuses['CANTREP'] = array('title' => "Can't Repro", 'color' => $closed_color);
		$statuses['NOTBUG'] = array('title' => "Not a bug", 'color' => $closed_color);
		$statuses['DUP'] = array('title' => "Duplicate", 'color' => $closed_color);
		$statuses['WILL'] = array('title' => "Will Do", 'color' => $attention_color);
		$statuses['WONT'] = array('title' => "Can't Do", 'color' => $closed_color);
		$statuses['INTEST'] = array('title' => "In Testing", 'color' => $normal_color);
		$statuses['DONE'] = array('title' => "Done", 'color' => $normal_color);
		$statuses['REOP'] = array('title' => "Reopened", 'color' => $attention_color);
		$statuses['NEW'] = array('title' => "<b>New</b>", 'color' => $attention_color);
		$statuses['INVEST'] = array('title' => "Research", 'color' => $attention_color);
		$statuses['NEEDINFO'] = array('title' => "NeedInfo", 'color' => $normal_color);

		$status_info = $statuses[$status];

		$status = "<span style='color: #$status_info[color]'>$status_info[title]</span>";

		return $status;
		}

?>