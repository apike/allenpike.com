<?php include_once(dirname(__FILE__) . '/functions.php'); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <?php rsd_link(); ?>
	<title><?php bloginfo('name'); ?>
	
	<?php

	if ( is_single() ) { 
	    $is_link = in_category(40); // #40 is a link.
		
		if ($is_link) {
	        print " - Link";
	    } else {
	        print " - Article";
	    }
	}
	if ( is_home() ) { ?> - Details on the craft of technology. <?php } ?>
	    <?php wp_title('-'); ?></title>

	<!--[if gte IE 7]><!-->
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	<!--<![endif]-->
</head>
<body>
<div id='page'>
	<div id='header'>
		<div id='header-wrap'>
    		<div id='header-content'>
    		    <h1>Antipode</h1>
    			<a href='/'><img alt='Antipode logo.' id='logo' src='<?php bloginfo('stylesheet_directory'); ?>/images/antipode-logo.png' /></a> <span id='slogan'>details on the craft of technology.</span>
    		</div>
        </div>
	</div>
    
    <!--[if lte IE 6]>
	<div id='iecomplaint_'><b>You are using an old, dangerous version of Internet Explorer. To see a styled version of this site, <a href='http://www.microsoft.com/windows/products/winfamily/ie/'>upgrade Explorer</a>, or download an alternative like <a href='http://www.getfirefox.com/'>Firefox</a> or <a href='http://www.apple.com/safari'>Safari</a>.</b></div>
    <![endif]-->

	<div id='outside'>		
			<div id='inside'>
				<div id='content'>
