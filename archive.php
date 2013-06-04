<?php get_header(); ?>

<div id="main-content">
<div id="page-content">

		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<h1>Category: <?php single_cat_title(); ?></h1>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h1>Archive for <?php the_time('F jS, Y'); ?></h1>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h1>Archive for <?php the_time('F, Y'); ?></h1>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h1 class="pagetitle">Archive for <?php the_time('Y'); ?></h1>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h1 class="pagetitle">Author Archive</h1>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h1 class="pagetitle">Blog Archives</h1>
			
			<?php } ?>

			<?php include (TEMPLATEPATH . '/_/inc/nav.php' ); ?>

			<?php while (have_posts()) : the_post(); ?>
			
				<article <?php post_class() ?>>
				
						<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <?php 
                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                          $imgID = get_post_thumbnail_id( $post_id );
                          $image_attributes = wp_get_attachment_image_src( $imgID, 'large' ); // returns an array
                          echo '<img src="/wp-content/themes/scoutit/_/inc/timthumb.php?src='.$image_attributes[0].'&w=250&h=150" width="250" height="150" class="archiveImg" />';
                        } 
                        ?>
                        <h5 class="subheading">Posted on <?php the_time('F jS, Y') ?> by <?php the_author() ?></h5>
						<div class="entry">
							<?php the_content('',true); ?>
						<p>>> <a href="<?php the_permalink() ?>">Read "<?php the_title(); ?>"</a></p>
                        </div>
                        <br style="clear:right;" />
                        
				</article>
			<?php endwhile; ?>

			<?php include (TEMPLATEPATH . '/_/inc/nav.php' ); ?>
			
	<?php else : ?>

		<h2>Nothing found</h2>

	<?php endif; ?>

</div>
<div id="main-sidebar">

<?php get_sidebar(); ?>

</div>
</div>

<?php get_footer(); ?>
