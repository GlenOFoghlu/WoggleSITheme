<?php get_header(); ?>  

<div id="main-content">
<div id="home-content">

    <script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#featured").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, false);
        jQuery("#featured").hover(
            function() {  
                jQuery("#featured").tabs("rotate", 0, false);
                  
            }, function() {  
                jQuery("#featured").tabs("rotate", 5000, false);  
            }  
        );
    });
    </script>
    
    <div id="featured" >
        <ul class="ui-tabs-nav">
            <?php
                $my_query = new WP_Query('category_name=featured&showposts=4');
                $k=1;
                while ($my_query->have_posts()) : $my_query->the_post();
                $do_not_duplicate = $post->ID; ?>
                <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?php echo $k; ?>">
                    <div id="button_content">
                        <a href="#fragment-<?php echo $k; ?>"><span><?php the_title(); ?></span></a>
                    </div>
                </li>
            <?php 
            $k++;
            endwhile; ?>
        </ul>
            <?php
            $my_query = new WP_Query('category_name=featured&showposts=4');
            $k=1;
            while ($my_query->have_posts()) : $my_query->the_post();
            $do_not_duplicate = $post->ID;
            ?>
            <div id="fragment-<?php echo $k; ?>" class="ui-tabs-panel">
            <?php
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
              $imgID = get_post_thumbnail_id( $post_id );
              $image_attributes = wp_get_attachment_image_src( $imgID, 'large' ); // returns an array
              echo '<img src="'.$image_attributes[0].'" width="453" height="250" alt="'.get_the_title().'" />'; 
              // echo '<img src="/wp-content/themes/WoggleSITheme/_/inc/timthumb.php?src='.$image_attributes[0].'&w=453&h=250" width="453" height="250" alt="'.get_the_title().'" />';
            } else {
              echo '<img src="/wp-content/themes/WoggleSITheme/_/img/no-image.gif" width="453" height="250" />';  
            }
            ?>
                <div class="info" >
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>"><strong>Read this post &raquo</strong></a></p>
                </div>
            </div>
            <?php 
            $k++;
            endwhile; ?>
    </div>

<?php 
// Shows homepage message if switched on in theme options
$options = get_option( 'WoggleSITheme_theme_options' );
if ($options['option_show_home_msg']) { 
    echo '<h1>'.$options['home_title'].'</h1>
    <p>'.$options['home_message'].'</p>';
}
?>

    <div id="columns">
        <div id="col1">

<?php
    if ($options['option_show_twitter']) {
?>
<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 4,
  interval: 30000,
  width: 'auto',
  height: 300,
  theme: {
    shell: {
      background: '#84246f',
      color: '#ffffff'
    },
    tweets: {
      background: '#84246f',
      color: '#ffffff',
      links: '#c487bb'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    behavior: 'all'
  }
}).render().setUser('<?php echo $options['twitter_username']; ?>').start();
</script>
      
<?php    
    } else {
        dynamic_sidebar('home-sidebar-1');
    }
?>
           
            
        </div>
        <div id="col2">
            <?php dynamic_sidebar( 'home-sidebar-2' ); ?> 
        </div>
    </div> 
             
</div>
<div id="main-sidebar">
<?php get_sidebar(); ?>
</div>
</div>

<?php get_footer(); ?>
