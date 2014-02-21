<?php

if ( function_exists('register_sidebar') )
    register_sidebar();

include(dirname(__FILE__).'/themetoolkit.php');

themetoolkit(
	'almostspring',
	array(    
	'sidebar' => 'Sidebar Location {radio|left|Left|right|Right}',
	),
	__FILE__
);
	
function almostspring_sidebar() {
	global $almostspring;
	if ($almostspring->option['sidebar'] == "left") { 
	  echo '#content { float: right; margin: 0 20px 0 0; }
			#sidebar { float: right; }';
	} 
}

if (!$almostspring->is_installed()) { 
	$set_defaults['sidebar'] = 'right'; 
	$result = $almostspring->store_options($set_defaults); 
} 

?>