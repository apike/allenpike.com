<?php include_once(dirname(__FILE__) . '/functions.php'); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<meta name="viewport" content="width=850, maximum-scale=1.0" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <?php rsd_link(); ?>
	<title><?php bloginfo('name'); ?>
	
	<?php

	if ( is_single() ) { 
	    $is_link = in_category(40); // #40 is a link.
		
		if ($is_link) {
	        print " - Link";
	    }
	}
	if ( is_home() ) { ?> - Notes on the craft of technology. <?php } ?>
	    <?php wp_title('-'); ?></title>
	
	
	<?php if (is_home()): ?>
		<meta content="Antipode is a blog about technology written by Allen Pike. Topics include web development, the Mac, and user interface design." name="description" /> 
	<?php endif; ?>

	<!--[if gte IE 7]><!-->
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	<!--<![endif]-->
</head>
<body>
<div id='page'>

    
    <!--[if lte IE 6]>
	<div id='iecomplaint_'><b>You are using an old, dangerous version of Internet Explorer. To see a styled version of this site, <a href='http://www.microsoft.com/windows/products/winfamily/ie/'>upgrade Explorer</a>, or download an alternative like <a href='http://www.getfirefox.com/'>Firefox</a> or <a href='http://www.apple.com/safari'>Safari</a>.</b></div>
    <![endif]-->



    <div id='header-outside'>
        <div id='header'>

        		<a href='/' id='logo'><h1>Antipode</h1></a>



        <ul>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>


                <?php
                /*
        	<li>
        	        <a href='http://www.twitter.com/apike/'>Twitter</a>: Allen <?php aktt_latest_tweet(); ?>
                </li>
                */
                ?>
            <li><a href='/' title='Blog front page'>log</a></li>
            <li class='division' title='Browse older blog entries'><a href='/archives/'>archives</a></li>


            <li><a href='/me/' title='About Allen Pike'>allen</a></li>
            <li class='division'><a  title='Contact Allen' href='/contact/'>contact</a></li>

            <li class='division'><a href="/links/"  title='Links to friends and projects'>elsewhere</a></li>


        	</ul>



        <?php endif; ?>


            </div>
        </div>
    	<div id='content-outside'>		
    
				<div id='content'>
