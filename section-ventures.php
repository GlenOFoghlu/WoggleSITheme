<?php
/*
Template Name: Ventures
*/
?>
<?php get_header(); ?>
<div id="main-content">
<div id="page-content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
<?php endwhile; endif; ?>
</div>
<div id="main-sidebar">
<center><img src='<?php bloginfo('template_directory'); ?>/_/img/ventures.jpg' alt='Venture Section Logo'  /></center><br />
<div class='sidebar-box'>
<div class='sidebar-box-title'>
<?php the_title(); ?> Menu
</div>
<div class='sidebar-box-menu'>
			<?php wp_nav_menu(array('theme_location' => 'ventures_menu')); ?>
	</div>
    <br />
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>