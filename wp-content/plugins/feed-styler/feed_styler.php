<?php
/*
Plugin Name: Feed Styler
Plugin URI: http://www.devlounge.net/extras/feed-styler
Description: Creates inline styles for feeds.
Version: 1.07
Author: Ronalfy (a.k.a. Ronald Huereca)
Author URI: http://ronalfy.com

Installation:  Put the Feed Styler directory in your plugins directory
and activate through the administration panel.

Plugin Function:  Adds inline styles in HTML tags based on the tag name, class name, or ID name. 
This plugin enables styles for all feed readers that support inline styles.

  Copyright 2007  Ronald Huereca  (email : ron alfy [a t ] g m ail DOT com)

    This program is free software; you can redistribute it and/or modify
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
*/

$feedstyler_options = "";
$style_applied = "";

$feedstyler_options_loaded = false;

include ("includes/htmlparser.inc.php"); //File that parses the html

//Class to store the information for each HTML tag
	class wp_devlounge_feedstyler_tag {
		var $tagname = "";
		var $idname = "";
		var $classname = "";
		var $attributes = "";
		var $value = "";
		var $nodetype = "0";
		var $parents = "";
		var $hspace = '';
		var $vspace = '';
		var $align = '';
		var $border = 0;
	
} //End class wp_devlounge_feedstyler_tag

//Generates the admin page
function wp_devlounge_feedstyler_page() {
global $regex, $feedstyler_options, $style_applied;

//Load in the options
if (!$feedstyler_options_loaded) { 
	$feedstyler_options = get_option("feedstyler_options");
	$feedstyler_options_loaded = true;
	
	$style_applied = get_option("feedstyler_style_applied");

	if ($style_applied != "true" && $style_applied != "false") { $style_applied = "true"; };
}

$styles = '';
if (isset($_POST['add_style'])) {
    ?><div class="updated"><p><strong><?php 
		$styles = $_POST['styles'];
		$style_applied = $_POST['style_applied'];
		_e("Feed Styles Updated", "feedstyler");
		
		//Add in the styles
		$styles = wp_devlounge_feedStyler_add($styles);
		
		?></strong></p></div><?php
	} else {
		$styles = wp_devlounge_feedstyler_textarea($feedstyler_options);
	}?>
<div class=wrap>
  <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
    <h2>Feed Styler</h2>
		<!-- selection area -->
		<ul><li>All CSS spanning multiple lines will be converted to one line.</li><li>All erroneous CSS declarations will be stripped out.</li>		<li>Keep the CSS simple.  No comments and no hacks.</li><li>Make sure all styles are enclosed in curly braces (i.e., <code>img { style code }</code>).</li><li>Pseudo-classes such as a:hover do not work.</li>
		</ul>
		
		<textarea name="styles" style="width: 80%; height: 400px;"><?php _e($styles, 'feedstyler') ?></textarea>
		<ul>
		<li><label for="style_feed"><input type="radio" id="style_feed" name="style_applied" value="true" <?php if ($style_applied == "true") { _e('checked="checked"', "feedstyler"); }?> />Apply styles to feed.</label></li>
		<li><label for="style_content"><input type="radio" id="style_content" name="style_applied" value="false" <?php if ($style_applied == "false") { _e('checked="checked"', "feedstyler"); }?>/>Apply styles to post content (testing only).</label></li>
		</ul>
<div class="submit">
  <input type="submit" name="add_style" value="<?php _e('Update Feed Styles', 'feedstyler') ?>" /></div>
  </form>
 </div><?php
}

//Adds in the styles
function wp_devlounge_feedStyler_add($styles) {
global $feedstyler_options, $style_applied;

//Clear the feed styler options
$feedstyler_options = "";

//Strip out the whitespace
$styles = preg_replace('/(\s+)/', ' ', $styles);

//Format the styles and spit out the erroneous ones
$stylesArray = preg_split('/(?<=})[^}]/i', $styles);

foreach ($stylesArray as $style) {
	if (preg_match( '/((#|\.)?[A-Za-z]( |[-_A-Za-z0-9]+)?\s?{[^}]*})/i', $style)) {
		$feedstyler_options .= "|" . $style;
	}
}

//Strip out double quotes and change them to single quotes
$feedstyler_options = str_replace('\"', "'", $feedstyler_options);

//Add in the options
update_option("feedstyler_options", $feedstyler_options);
update_option("feedstyler_style_applied", $style_applied);

//Format for text area
return wp_devlounge_feedstyler_textarea($feedstyler_options);
}

//Formats the styles for display in the textarea box
function wp_devlounge_feedstyler_textarea($styles) { 
	$styles = preg_replace('/[\\\]+(\\\'|\")/i', '\'', $styles); //Get rid of slashes added in by WordPress
	$styles = str_replace('|', '', $styles);
	$styles = preg_replace('/((#|\.)?[A-Za-z]( |[-_A-Za-z0-9]+)?\s?{[^}]*})/i', '$1 &#10;', $styles); //Put everything on one line seperated by line breaks
	$styless = preg_replace('/ ?((#|\.)?[A-Za-z]( |[-_A-Za-z0-9]+)?\s?{)/i', '$1', $styles); //Get rid of extra whitespace
	return $styles;
}

//Formats the feed content to include the added styles
function wp_devlounge_feedstyler( $content ) {
	global $post, $id, $wp_devlounge_feedStyler;
	
	$feedstyler_options = "";
	$style_applied = "";
	
	//Load in the options
	if (!$feedstyler_options_loaded) { 
		$style_applied = get_option("feedstyler_style_applied");

		if ($style_applied != "true" && $style_applied != "false") { $style_applied = "true"; };
		
		if (is_feed() && $style_applied == "true") {
		} elseif (!is_feed() && $style_applied == "false" ) {
		} else { return $content; }
							
		$feedstyler_options = get_option("feedstyler_options");
		$feedstyler_options_loaded = true;
	}
	
	//Strip out comment tags - If a comment breaks valid html, the plugin won't work.
	//Not totally necessary since comments don't typically work in WordPress unless you have the <!--more--> tag and this tag doesn't break the plugin
	//$content = preg_replace('/<!--((.|\s)*)(\&\#8211;|--)>/i', '', $content);
	
	//Parse the content with the added styles
	return wp_devlounge_feedstyler_parse($feedstyler_options, $content);
}

function wp_devlounge_feedstyler_parse($styles, $content) {
	$tagArray = array();
	$tagParents = array();
	$tagParentsCount = 0;

 	//Begin parsing the HTML content into objects
  $parser = new HtmlParser ($content);
  while ($parser->parse()) {
		
		//Skip "Start", "Comments", and "Done"
		if ($parser->iNodeType == 0  || $parser->iNodeType == 4 || $parser->iNodeType == 5) { continue; }
	
		$tag = new wp_devlounge_feedstyler_tag;
		$tag->nodetype = $parser->iNodeType;
		
		//Subtract from the count of the array to show a decrease in tag level
		if ($tag->nodetype == 2 && $tagParentsCount >= 3) { $tagParentsCount -= 3; }
		$tag->tagname = $parser->iNodeName; 
		$tagParents[$tagParentsCount] = "tag=" . $parser->iNodeName;
		$tagParentsCount += 1;
		
		//Add in the tag's ID if any
		if (array_key_exists('id', $parser->iNodeAttributes)) { 
			$tag->idname = $parser->iNodeAttributes['id'];
			$tagParents[$tagParentsCount] = "id=" . $tag->idname;
		} else { $tagParents[$tagParentsCount] = "id="; }
		$tagParentsCount += 1;
		
		//Add in the class if any
		if (array_key_exists('class', $parser->iNodeAttributes)) { 
			$tag->classname = $parser->iNodeAttributes['class'];
			$tagParents[$tagParentsCount] = "class=" . $tag->classname;
		} else { $tagParents[$tagParentsCount] = "class="; }
		$tagParentsCount += 1;
			
		if ($tag->nodetype == 2 || $tag->nodetype == 3) { $tagParentsCount -= 3; }
		
		//Add in the attributes
		$tag->attributes = wp_devlounge_feedstyler_attributes($parser->iNodeAttributes, $tag);
		$tag->value = $parser->iNodeValue;
		
		//Go through each item in the array and add a CSV list to each tag
		$parents = "";
		
		for ($i = 0; $i < $tagParentsCount; $i++) {
			$parents .= trim($tagParents[$i]);	
			if ($i + 1 == $tagParentsCount) { continue; } else { $parents .= ","; }
		}
		$tag->parents = $parents;
		//If the tag does not have a closing tag, subtract the count
		if (!wp_devlounge_feedstyler_closing_tag($tag->tagname)) { $tagParentsCount -= 3; }

		//Add in the tag to the tag array
		$tagArray[count($tagArray)] = $tag;
		
	} //End while
	
	//Split the styles into an array	
	$styles = strip_tags($styles);
	$styles = preg_replace('/[\\\]+(\\\'|\")/i', '\'', $styles); //Get rid of slashes added in by WordPress
	$styles = split('\|', $styles);
	
	for($t = 0; $t<sizeof($tagArray); $t++) {
		 $tag = $tagArray[$t];
		//Get the CSV tag parents
		if ($tag->nodetype == 2 || $tag->nodetype == 3) { continue; }

		$tagParents = split(",", $tag->parents);

		foreach ($styles as $style) {
			$styleName = "";
			$styleCode = "";
			if (preg_match('/((#|\.)?[A-Za-z][^{]*)/i', $style, $match)) { //Get the name of the style (div, #id, .class)
				$styleName = $match[0];
			} else { continue; }
			if (preg_match('/(?<={)([^}]*)}/', $style, $match)) { //Get the code for the style
				$styleCode = $match[1];
			} else { continue; 		}
			
			//Split the style into matches and strip the empty ones from the array
			$matches = preg_split('/(?=#|[ ]+(?=(#|\.|[a-zA-Z]))|\.)/i', $styleName);
			$matches2 = array();
			foreach ($matches as $m) {
				$m = trim($m);
				if ($m != "") { $matches2[sizeof($matches2)] = $m; }
			}
			$matches = $matches2;
				
			if (sizeof($matches) < 0) { continue; }
			//Make sure the last matching style tag is a match in the tag parents 
			$matchParent = wp_devlounge_feedstyler_matchstyles($matches[sizeof($matches)-1]);
				
			if ((!wp_devlounge_feedstyler_multipleclasses($matchParent, $tagParents[sizeof($tagParents)-1])) && ($matchParent != $tagParents[sizeof($tagParents)-2]) && ($matchParent != $tagParents[sizeof($tagParents)-3])) { continue; }
						
			//Iterate through each match and see if the parent node/id/class matches
			$matchesCount = sizeof($matches)-1;
			for ($i = sizeof($tagParents)-1; $i >= 0; $i-=3) {
				
				if (wp_devlounge_feedstyler_multipleclasses(wp_devlounge_feedstyler_matchstyles($matches[$matchesCount]), $tagParents[$i])) { //Class
					$matchesCount -= 1;
				}
				
				if ($tagParents[$i-1] == wp_devlounge_feedstyler_matchstyles($matches[$matchesCount])) { //ID
					$matchesCount -= 1;
				} 
				if ($tagParents[$i-2] == wp_devlounge_feedstyler_matchstyles($matches[$matchesCount])) {	//Tag
					$matchesCount -= 1;
				} 
			}
			
			//Style the tag
			if ($matchesCount < 0) { 
				$tagArray[$t]->attributes .= ' style="' . str_replace('"', "'", $styleCode) .'"'; 
				
				//Strip extra style tags
				$imgStyles = '';
				if (preg_match_all('/style[ ]*=[ ]*\"([^\"]*)[\"]/i', $tagArray[$t]->attributes, $styleMatches)) {
					$styleMatches = implode("," ,$styleMatches[1]);
					$styleMatches = explode(",", $styleMatches);
					$matchingStyles = ' style="';
					foreach($styleMatches as $sm) {
						$sm = trim($sm);
						if (!($tagArray[$t]->tagname == "img")) {
							$matchingStyles .= $sm;	
						}
						$matchingStyles .= $sm;
						$imgStyles .= $sm;
					}
					$matchingStyles .= '"';
					$tagArray[$t]->attributes = preg_replace('/(style[ ]*=[ ]*\"[^\"]*[\"])/i', '', $tagArray[$t]->attributes);
					$tagArray[$t]->attributes .= $matchingStyles;
				}
				//Add in hspace, vspace, align, and border elements for images so that images can be styled in feeds that strip styles
				if ($tagArray[$t]->tagname == 'img') {
					$vspace = ""; $hspace = ""; $border = "0"; $align = "";
					$imgStyles = split(';', $imgStyles);
					foreach ($imgStyles as $imgStyle) {
						$imgStyle = trim($imgStyle);
						
						//See if we can find any margins
						if (preg_match('/^margin\-?(t|b|l|r)?[^:]*:[ ]*(.*)$/i', $imgStyle, $imgMatch)) {
							$imgMargin = trim(preg_replace('/(px|%)/', '', $imgMatch[2]));
							$imgMargin = split(' ', $imgMargin);
							//Find out if the margins read margin-top, bottom, left, right, or just margin
							if (sizeof($imgMargin) == 1) {
								if ($imgMatch[1] == 't' || $imgMatch[1] == 'b') {
									$vspace = $imgMargin[0];
								} elseif($imgMatch[1] == 'l' || $imgMatch[1] == 'r') {
									$hspace = $imgMargin[0];
								} else {
									$vspace = $imgMargin[0];
									$hspace = $vspace;
								}
							} elseif (sizeof($imgMargin) == 2) { //margin: 0 2px;
								$vspace = $imgMargin[0];
								$hspace = $imgMargin[1];
							} elseif (sizeof($imgMargin) == 3) { //margin: 0 2px 0;
								$vspace = $imgMargin[2];
								$hspace = $imgMargin[1];
							} elseif (sizeof($imgMargin) == 4) { //margin: 0 2px 3px 4px;
								$vspace = $imgMargin[2];
								$hspace = $imgMargin[3];
							}
							if ($vspace != "") { $tagArray[$t]->vspace = $vspace; }
							if ($hspace != "") { $tagArray[$t]->hspace = $hspace; }
						} //End find margins
						
						//Find borders now
						if (preg_match('/^border\-?(?:t|b|l|r)?[^:]*:[ ]*(\d\d?\d?)px/i', $imgStyle, $imgMatch)) {
							$border = $imgMatch[1];
							$tagArray[$t]->border = $border;
						}
											
						//Find alignment
						if (preg_match('/^float[^:]*:[ ]*([a-zA-Z]+)/i', $imgStyle, $imgMatch)) {
							$align = $imgMatch[1];
							$tagArray[$t]->align = $align;
						}
					} //End foreach image style
				} //End searching for image styles
			}
			
			
		} //End ForEach Style
	} //End ForEach TagArray
	
	//Now let's return the styled content
	$content = "";
	foreach ($tagArray as $tag) {
		switch($tag->nodetype) { 
			case 1:
				$content .= "<" . $tag->tagname;
				if ($tag->tagname == 'img') {
					if ($tag->hspace != '') { $content .= ' hspace="' . $tag->hspace . '" '; }
					if ($tag->vspace != '') { $content .= ' vspace="' . $tag->vspace . '" '; }
					if ($tag->align != '') { $content .= ' align="' . $tag->align . '" '; }
					if ($tag->border != '') { $content .= ' border="' . $tag->border . '" '; }
				} 
				$content .= $tag->attributes;
				if (wp_devlounge_feedstyler_closing_tag($tag->tagname)) {$content .= ">"; } else { $content .= "/>"; }
				break;
			case 2:
				$content .= "</" . $tag->tagname . ">";
				break;
			case 3:
				$content .= $tag->value;
				break;				
		}
	}
	return ($content);
} //End wp_devlounge_feedstyler_parse

//Allows support for multiple classes per tag
//$class = The class you're hoping matches the $classes string
//$classes = The string with multiple classes
//Returns true if there is a class match
function wp_devlounge_feedstyler_multipleclasses($class, $classes) { 
	$classes = str_replace('class=', '', $classes);
	$classes = preg_split('/\s/i', $classes);
	foreach ($classes as $c) {
			$c = "class=" . trim($c);
			if ($c == $class) {
				return true;
			}
	}
	return false;
}
//Returns a match string that says "class=blah, id=blah, or tag=blah"
function wp_devlounge_feedstyler_matchstyles($style) {
				$matchString = "";
				$style = trim($style);
				if (preg_match('/^#[A-Za-z]/i', $style)) { //ID 
					$matchString = "id=";
				} elseif (preg_match('/^\.[A-Za-z]/i',$style)) { //Class
					$matchString = "class=";
				} elseif (preg_match('/^[A-Za-z]/i', $style)) { //Tag
					$matchString = "tag=";
				} else { return ''; }
				$matchString .= preg_replace('/(\.|#|\s)/i', '', $style);
				return $matchString;
}
//Returns a string of attributes.  Takes in an associative array of attributes
function wp_devlounge_feedstyler_attributes($attributes, &$tag) {
	$tagattributes = "";
	foreach($attributes as $key => $value) {
		//Add in the deprecated attributes into the tag if it is an image
		if ($tag->tagname == 'img') { 
			switch($key) {
				case 'hspace':
				$tag->hspace = $value;
				break;
				case 'vspace':
				$tag->vspace = $value;
				break;
				case 'align':
				$tag->align = $value;
				break;
				case 'border':
				$tag->border = $value;
				break;
				//case 'src':
				//$tagattributes .= ' ' . $key . '="' . bloginfo('wpurl') . $value . '" ';
				//break;
				default:
				$tagattributes .= ' ' . $key . '="' . $value . '" ';
			}
		} else {
			$tagattributes .= ' ' . $key . '="' . $value . '" ';
		}
		
	}
	return $tagattributes;
}

//Returns true if the tag has a closing tag
//Returns false if the tag has no closing tag
function wp_devlounge_feedstyler_closing_tag($tagname) { 
	switch($tagname) {
		case ($tagname === "input") || ($tagname === "hr") || ($tagname === "br") || ($tagname === "img") || ($tagname === "param")  :
			return false;
		default: 
			return true;
	}
}


add_filter('the_content', 'wp_devlounge_feedstyler', 100);
add_action('admin_menu', 'wp_devlounge_feedstyler_admin');
function wp_devlounge_feedstyler_admin() {
    if (function_exists('add_options_page')) {
add_options_page('Feed Styler', 'Feed Styler', 8, basename(__FILE__), 'wp_devlounge_feedstyler_page');
    }
}


?>
