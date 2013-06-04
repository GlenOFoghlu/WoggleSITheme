<?php get_header(); ?>

<div id="main-content">
<div id="home-content">

	<?php if (have_posts()) : ?>

		<h1>Search Results</h1>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><?php the_title(); ?></h2>

				<?php include (TEMPLATEPATH . '/_/inc/meta.php' ); ?>

				<div class="entry">

					<?php the_excerpt(); ?>

				</div>

			</article>

		<?php endwhile; ?>

	<?php else : ?>

		<h2>No posts found.</h2>

	<?php endif; ?>

</div>
<div id="main-sidebar">

<?php get_sidebar(); ?>

</div>
</div>

<?php get_footer(); ?>
