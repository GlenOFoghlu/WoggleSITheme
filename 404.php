<!DOCTYPE html>
<head>
	
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );

    // Add the blog name.
    bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'pilcrow' ), max( $paged, $page ) );

    ?></title>

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/404.css">
    <link href='http://fonts.googleapis.com/css?family=Podkova:700' rel='stylesheet' type='text/css'>
    <style>
        h1 { font-family: 'Podkova', cursive; }
        h2 { font-family: 'Podkova', cursive; }
    </style>

	<?php wp_head(); ?>
</head> 

<body <?php body_class(); ?>>

<div id="main-wrapper">
<div id="header">
    	<div id="logo">
        </div>
	</div>
  <div class="clear" style="padding-top:10px;"></div>

<div id="error-content">

        <h2>Select a Page</h2>
    	<?php wp_nav_menu(array('theme_location' => '404_menu')); ?>


</div>
</div>