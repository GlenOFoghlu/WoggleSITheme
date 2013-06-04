<?php


add_action( 'after_setup_theme', 'scoutit_setup' );

if ( ! function_exists( 'scoutit_setup' ) ):

function scoutit_setup() {
    
    // Register Theme Options page
    require_once ( get_template_directory() . '/theme-options.php' );
    
    
    // Add default posts and comments RSS feed links to <head>.
    add_theme_support( 'automatic-feed-links' );

    // Enable admin to set custom background images in 'appearance > background'
    add_custom_background();
    
    // Register new custom menus for header bar and each section
    add_action( 'init', 'register_my_menus' );
    function register_my_menus() {
        register_nav_menus(
            array(
                'custom_menu' => __( 'Main Menu' ),
                'header_menu' => __( 'Menu in header Area' ),
                'beavers_menu' => __( 'Menu on Beavers pages' ),
                'cubs_menu' => __( 'Menu on Cubs pages' ),
                'scouts_menu' => __( 'Menu on Scouts pages' ),
                'rovers_menu' => __( 'Menu on Rovers pages' ),
                'ventures_menu' => __( 'Menu on Ventures pages' ),
                'footer_menu' => __( '"Scout Sections" menu in footer' ),
                '404_menu' => __( 'Menu on 404 page' )
            )
        );
    }
    
    // Register support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );
    
    // Register support for custom header images
    define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyeleven_header_image_width', 111 ) );
    define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyeleven_header_image_height', 150 ) );
    define( 'HEADER_TEXTCOLOR', 'ffffff' );
    define( 'HEADER_IMAGE', '%s/_/img/SI_logoHeader.jpg' ); // %s is the template dir uri 
    add_custom_image_header( 'twentyeleven_header_style', 'twentyeleven_admin_header_style', 'twentyeleven_admin_header_image' );
    
    
    
    // Create 'Featured' category for posts that will appear in homepage slideshow
    wp_insert_term(
        'Featured',
        'category',
        array(
            'description'=> 'Posts selected will appear in homepage slideshow.',
            'slug' => 'featured'
        )
    );
    
    // Will be used when I add support for events... 
    #add_action( 'init', 'create_post_type' );
    #function create_post_type() {
    #    register_post_type( 'events',
    #        array(
    #            'labels' => array(
    #                'name' => __( 'Events' ),
    #                'singular_name' => __( 'Event' )
    #            ),
    #        'public' => true,
    #        'has_archive' => true,
    #        )
    #    );
    #}
    
    // This theme styles the visual editor with editor-style.css to match the theme style.
    #add_editor_style();
    
       
}

endif; // scoutit_setup 
$options = get_option('scout_theme_options');

// Get category ID from name
function get_category_id($cat_name){
    $term = get_term_by('name', $cat_name, 'category');
    return $term->term_id;
}

// Register sidebars
function scoutit_widgets_init() {
    
    register_sidebar(array(
        'name' => __('Purple Sidebar Widgets','scoutit' ),
        'id'   => 'purple-sidebar',
        'description'   => __( '','scoutit' ),
        'before_widget' => '<div class="widget-box w-purple">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-box-title">',
        'after_title'   => '</div>'
    ));
    
    register_sidebar(array(
        'name' => __('Orange Sidebar Widgets','scoutit' ),
        'id'   => 'orange-sidebar',
        'description'   => __( '','scoutit' ),
        'before_widget' => '<div class="widget-box w-orange">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-box-title">',
        'after_title'   => '</div>'
    ));
    
    register_sidebar(array( 
        'name' => __('Green Sidebar Widgets','scoutit' ),
        'id'   => 'green-sidebar',
        'description'   => __( '','scoutit' ),
        'before_widget' => '<div class="widget-box w-green">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-box-title">',
        'after_title'   => '</div>'
    ));
    
    register_sidebar(array(
        'name' => __('Homepage Sidebar 1','scoutit' ),
        'id'   => 'home-sidebar-1',
        'description'   => __( 'If you use Twitter, this box will be replaced with the Twitter widget.','scoutit' ),
        'before_widget' => '<div class="sidebar-box">',
        'after_widget'  => '</div></div><div class="clear" style="padding-top:10px;"></div>',
        'before_title'  => '<div class="sidebar-purple-box-title">',
        'after_title'   => '</div><div class="sidebar-purple-box-content">'
    ));
    
    register_sidebar(array(
        'name' => __('Homepage Sidebar 2','scoutit' ),
        'id'   => 'home-sidebar-2',
        'description'   => __( 'If you are connected to OSM, leave this box empty to show a list of future events.','scoutit' ),
        'before_widget' => '<div class="sidebar-box">',
        'after_widget'  => '</div></div><div class="clear" style="padding-top:10px;"></div>',
        'before_title'  => '<div class="sidebar-orange-box-title">',
        'after_title'   => '</div><div class="sidebar-orange-box-content">'
    ));
    
}
add_action( 'widgets_init', 'scoutit_widgets_init' );

if ( ! function_exists( 'twentyeleven_header_style' ) ) :
function twentyeleven_header_style() {

    // If no custom options for text are set, let's bail
    // get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
    if ( HEADER_TEXTCOLOR == get_header_textcolor() )
        return;
    // If we get this far, we have custom styles. Let's do this.
    ?>
    <style type="text/css">
    <?php
        // Has the text been hidden?
        if ( 'blank' == get_header_textcolor() ) :
    ?>
        #site-title,
        #site-description {
            position: absolute !important;
            clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
            clip: rect(1px, 1px, 1px, 1px);
        }
    <?php
        // If the user has set a custom color for the text use that
        else :
    ?>
        #site-title a,
        #site-description {
            color: #<?php echo get_header_textcolor(); ?> !important;
        }
    <?php endif; ?>
    </style>
    <?php
}
endif; // twentyeleven_header_style

if ( ! function_exists( 'twentyeleven_admin_header_style' ) ) :
function twentyeleven_admin_header_style() {
?>
    <style type="text/css">
    .appearance_page_custom-header #headimg {
        border: none;
    }
    #headimg h1,
    #desc {
        font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
    }
    #headimg h1 {
        margin: 0;
    }
    #headimg h1 a {
        font-size: 32px;
        line-height: 36px;
        text-decoration: none;
    }
    #desc {
        font-size: 14px;
        line-height: 23px;
        padding: 0 0 3em;
    }
    <?php
        // If the user has set a custom color for the text use that
        if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
    ?>
        #site-title a,
        #site-description {
            color: #<?php echo get_header_textcolor(); ?>;
        }
    <?php endif; ?>
    }
    </style>
<?php
}
endif; // twentyeleven_admin_header_style

if ( ! function_exists( 'twentyeleven_admin_header_image' ) ) :
function twentyeleven_admin_header_image() { ?>
    <div id="headimg">
        <?php
        if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
            $style = ' style="display:none;"';
        else
            $style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
        ?>
        <?php $header_image = get_header_image();
        if ( ! empty( $header_image ) ) : ?>
            <img src="<?php echo esc_url( $header_image ); ?>" alt="" />
        <?php endif; ?>
    </div>
<?php }
endif; // twentyeleven_admin_header_image

// Do the jQuery stuff
function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
    wp_enqueue_script( 'jquery' );
    wp_deregister_script( 'jquery-ui-core' );
    wp_register_script( 'jquery-ui-core', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
    wp_enqueue_script( 'jquery-ui-core' );
    
    // TO DO: find out why this frig fixes the order that the homepage slider goes in.
    wp_deregister_script( 'combined' );
    wp_register_script( 'combined', get_bloginfo('template_directory').'/_/js/combined.js');
    wp_enqueue_script( 'combined' );
}    
add_action('wp_enqueue_scripts', 'my_scripts_method');

// TO DO: Check what this is and when it should be loaded.
// Clean up the <head>
#function removeHeadLinks() {
#    remove_action('wp_head', 'rsd_link');
#    remove_action('wp_head', 'wlwmanifest_link');
#}
#add_action('init', 'removeHeadLinks');
#remove_action('wp_head', 'wp_generator');





// Custom widgets for rest of document

// Custom Recent Posts Widget
class scoutIT_Widget_Recent_Posts extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'scoutit_widget_recent_entries', 'description' => __( "Nice tidy way of adding recent posts to your sidebar (purple one is best).") );
        parent::__construct('scoutit-recent-posts', __('SCOUT Recent Posts'), $widget_ops);
        $this->alt_option_name = 'scoutit_widget_recent_entries';

        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
        if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
             $number = 10;

        $r = new WP_Query(array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true, 'post_type' => array( 'post', 'featured' )));
        if ($r->have_posts()) :
        ?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul class="scout-widget-news">
        <?php  while ($r->have_posts()) : $r->the_post(); ?>
        <li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a><br />
        <span>- <?php the_time('F jS, Y') ?> | <?php the_category(', ') ?></span></li>
        <?php endwhile; ?>
        </ul>
        <?php echo $after_widget; ?>
        <?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }

    function form( $instance ) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
    ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <?php
        }
}

 register_widget('scoutIT_Widget_Recent_Posts');    
