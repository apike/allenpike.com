<?php include_once(dirname(__FILE__) . '/functions.php'); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<meta name="viewport" content="width=620, maximum-scale=1.0" />
	<link rel="author" href="https://plus.google.com/115189793104525758622" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <?php rsd_link(); ?>
	<title>
	
	<?php
	if ( is_single() ) { 
	    $is_link = in_category(40); // #40 is a link.
	}
	
	if ( is_home() ) { 
	    print "Allen Pike, crafter of fine software products.";
    } else {
	    wp_title('');
	    print " - Allen Pike";
	}
	?>
	    
	</title>
	
	
	<?php if (is_home()): ?>
		<meta content="Allen writes a technology blog about Vancouver, iOS, user interface design, games, and whatever else strikes his fancy." name="description" /> 
	<?php endif; ?>

	<!--[if gte IE 7]><!-->
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>
	<!--<![endif]-->

    <script type="text/javascript" src="http://use.typekit.com/txt1pli.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
<body>
<div id='page'>

    
    <!--[if lte IE 6]>
	<div id='iecomplaint_'><b>You are using an old, dangerous version of Internet Explorer. To see a styled version of this site, <a href='http://www.microsoft.com/windows/products/winfamily/ie/'>upgrade Explorer</a>, or download an alternative like <a href='http://www.getfirefox.com/'>Firefox</a> or <a href='http://www.apple.com/safari'>Safari</a>.</b></div>
    <![endif]-->



    <div id='header-outside'>
        <div id='header'>
                <?php if (!is_home()) { ?><div id="homelink"><a href='/'>Home</a></div><?php } ?>
        		<h2>Allen Pike</h2>
        	    <a href="http://www.steamclock.com/">steamclock.com</a><br><a href="mailto:ap@allenpike.com">ap@allenpike.com</a>


            <hr>
        </div>
    	<div id='content-outside'>		
    
				<div id='content'>
