<?php get_header(); ?>

<div id="main-content">
<div id="home-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<h1 class="entry-title"><?php the_title(); ?></h1>
            <h5 class="subheading">Posted on <?php the_time('F jS, Y') ?> by <?php the_author() ?></h5>
            <?php 
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
              $imgID = get_post_thumbnail_id( $post_id );
              $image_attributes = wp_get_attachment_image_src( $imgID, 'large' ); // returns an array
              echo '<img src="/wp-content/themes/scoutit/_/inc/timthumb.php?src='.$image_attributes[0].'&w=684&h=220" width="684" height="220" class="singleImg" alt="<?php the_title(); ?>" />';
            } 
            ?>
			<div class="entry-content">
				
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
				<?php the_tags( 'Tags: ', ', ', ''); ?>
			
				<?php include (TEMPLATEPATH . '/_/inc/meta.php' ); ?>

			</div>
			
			<?php #edit_post_link('Edit this entry','','.'); ?>
			
		</article>

    	<?php 
        // Hides comments template if switched off in options
        if (!$options['no_comment']) { 
           comments_template();
        }
        ?> 

	<?php endwhile; endif; ?>

</div>
<div id="main-sidebar">
	
<?php get_sidebar(); ?>

</div>
</div>

<?php get_footer(); ?>