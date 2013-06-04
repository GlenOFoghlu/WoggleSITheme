<?php get_header(); ?>

<div id="main-content">
<div id="page-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article class="post" id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<div class="entry">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
			</div>
		</article>
	<?php endwhile; endif; ?>
<br /><br />
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  

</div>
<div id="main-sidebar">

<?php get_sidebar(); ?>

</div>
</div>

<?php get_footer(); ?>
