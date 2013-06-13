<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
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
	<meta name="keywords" content="some, keywords, here, for, meta, tag, helps, with, seo">
	<meta name="description" content="<?php bloginfo('site_description'); ?>">
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/_/img/apple-touch-icon.png">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    
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
        <div id="headerMenu"><?php wp_nav_menu(array('theme_location' => 'header_menu')); ?></div></br/>
        <div id="social">
            <?php $options = get_option( 'WoggleSITheme_theme_options' ); ?>
            <?php if ( $options['googleUrl'] != '' ) : ?>
                <div id="google"><h5><a href="<?php echo $options['googleUrl']; ?>" title="<?php bloginfo('name')?> <?php _e('on','photologger');?> <?php _e( 'Google', 'photologger' ); ?>" target="_blank"><span><?php _e( 'Google', 'photologger' ); ?></span></a></h5></div>
            <?php endif; ?>
            <?php if ( $options['youtubeUrl'] != '' ) : ?>
                <div id="youtube"><h5><a href="<?php echo $options['youtubeUrl']; ?>" title="<?php bloginfo('name')?> <?php _e('on','photologger');?> <?php _e( 'Youtube', 'photologger' ); ?>" target="_blank"><span><?php _e( 'Youtube', 'photologger' ); ?></span></a></h5></div>
            <?php endif; ?>
            <?php if ( $options['twitterUrl'] != '' ) : ?>
                <div id="twitter"><h5><a href="<?php echo $options['twitterUrl']; ?>" title="<?php bloginfo('name')?> <?php _e('on','photologger');?> <?php _e( 'Twitter', 'photologger' ); ?>" target="_blank"><span><?php _e( 'Twitter', 'photologger' ); ?></span></a></h5></div>
            <?php endif; ?>
            <?php if ( $options['facebookUrl'] != '' ) : ?>
             <div id="facebook"><h5><a href="<?php echo $options['facebookUrl']; ?>" title="<?php bloginfo('name')?> <?php _e('on','photologger');?> <?php _e( 'Facebook', 'photologger' ); ?>" target="_blank"><span><?php _e( 'Facebook', 'photologger' ); ?></span></a></h5></div>
            <?php endif; ?>  
         </div>
         <div id="logo">
                    <a href="/"><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
            </div>
                <div id="groupName"><a href="/">
                    <h1><a href="<?php echo site_Url()?>" title="<?php bloginfo('name')?>"><?php bloginfo('name')?></a></h1>
            </div> 
            <div id="SIBranding">
            <img src="http://localhost/wordpress/wp-content/themes/WoggleSITheme/_/img/SI_logoHeader.jpg" width="111px" height="150px"/>
        </div>
        <br /><br /><br />        
<!-- TO DO: finish Advertising widget
<div id="adheader">
<a href="#" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/_/img/banner.gif" width="468" height="60" border="0"  /></a>
</div>
-->
</div>
<div class="clear" style="padding-top:10px;"></div>
<div class="navigation">
<?php wp_nav_menu(array('theme_location' => 'custom_menu')); ?>
</div>
<div class="clear" style="padding-top:10px;"></div>
<div id='middle'>
<div id='join'><img src="<?php bloginfo('template_directory'); ?>/_/img/breadcrumb_jointheadventure.gif" width="125" height="30" alt="Join the adventure!" /></div>
<div id='search'><?php get_search_form(); ?></div>
</div>
<div class="clear" style="padding-top:10px;"></div>
