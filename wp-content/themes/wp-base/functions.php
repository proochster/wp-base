<?php

/**
 *
 *
 * @package WordPress
 * @subpackage WP_Base
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */



/**
 * ------------------
 * THEME CUSTOM SETUP
 */

function wpbase_theme_setup()
{

    /**
     * Feed links
     * @link https://codex.wordpress.org/Automatic_Feed_Links
     */
    // add_theme_support('automatic-feed-links');

    /**
     * Title tag support
     * @link https://codex.wordpress.org/Title_Tag
     */
    // add_theme_support('title-tag');

    /**
     * Custiomize refresh
     * @link https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * HTML5 support
     * @link https://codex.wordpress.org/Theme_Markup
     */
    add_theme_support(
        'html5',
        array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption'
        )
    );

    /**
     * Wide alignement
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/
     */
    // add_theme_support( 'align-wide' );

    /*
	* Custom background color.
    * @link https://codex.wordpress.org/Custom_Backgrounds
    */
    add_theme_support(
        'custom-background',
        array(
            'default-color'          => '',
            'default-image'          => '',
            'default-repeat'         => 'repeat',
            'default-position-x'     => 'left',
            'default-position-y'     => 'top',
            'default-size'           => 'auto',
            'default-attachment'     => 'scroll',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => '',
            'admin-preview-callback' => ''
        )
    );

    /**
     * Theme logo support
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            // 'height'      => 50,
            // 'width'       => 50,
            // 'flex-height' => true,
            // 'flex-width'  => true,
            'header-text' => array('site-title', 'site-description'),
        )
    );

    /**
     * Custon header support
     * @link https://codex.wordpress.org/Custom_Headers
     */
    add_theme_support(
        'custom-header',
        array(
            'default-image'          => '',
            'width'                  => 0,
            'height'                 => 0,
            'flex-height'            => false,
            'flex-width'             => false,
            'uploads'                => true,
            'random-default'         => false,
            'header-text'            => true,
            'default-text-color'     => '',
            'wp-head-callback'       => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
        )
    );

    /**
     * Enable support for Post Thumbnails on posts and pages.
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support(
        'post-thumbnails'
    );


    /**
     * Post formats
     * @link https://wordpress.org/support/article/post-formats/
     */
    // add_theme_support(
    //     'post-formats',
    //     array(
    //         'aside',
    //         'gallery',
    //         'link',
    //         'image',
    //         'quote',
    //         'ststus',
    //         'video',
    //         'audio',
    //         'chat',
    //     )
    // );

}

add_action('after_setup_theme', 'wpbase_theme_setup');

/**
 * END THEME CUSTOM SETUP
 * ----------------------
 */

/**
 * ------------------
 * CUSTOM POST TYPES
 */

// add_action('init', 'create_post_type');
// // REGITSTER NEW POST TYPES
// function create_post_type()
// {
//     // PROJECTS / WORK
//     register_post_type(
//         'work_post', // Post Type cannot be named the same as the page
//         array(
//             'labels' => array(
//                 'name' => __('Work'),
//                 'singular_name' => __('Work'),
//                 'add_new' => __('Add new'),
//                 'add_new_item' => __('Add new work item'),
//                 'edit_item' => __('Edit work item'),
//                 'new_item' => __('New work item'),
//                 'view_item' => __('View work item'),
//                 'search_items' => __('Search work item'),
//                 'not_found' =>  __('Nothing found'),
//                 'not_found_in_trash' => __('Nothing found in Trash'),
//                 'parent_item_colon' => ''
//             ),
//             'public' => true,
//             'exclude_from_search' => false,
//             'has_archive' => false,
//             'publicly_queryable' => true,
//             'hierarchical' => true,
//             'menu_icon' => 'dashicons-hammer',
//             'supports' => array(
//                 'title',
//                 'editor',
//                 'revisions',
//                 'author',
//             ),
//             'taxonomies' => array(
//                 'post_tag',
//                 'work'
//             ),
//             'rewrite' => array('slug' => 'my-work')
//         )
//     );
// }



/**
 * -------------------
 * WIDGET PLACEHOLDERS
 */

add_action( 'widgets_init', 'wpbase_widgets_init' );
// // REGITER SIDEBARS
function wpbase_widgets_init() {

  	register_sidebar( array(
  		'name'          => __( 'Footer', 'wpbase' ),
  		'id'            => 'footer__widgets',
  		'description'   => __( 'Appears in the footer of the page in the 1st section', 'wpbase' ),
  		'before_widget' => '<section id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</section>',
  		'before_title'  => '<h3 class="widget-title">',
  		'after_title'   => '</h3>',
  	) );
  }


/**
 * ---------------
 * ENQUEUE SCRIPTS
 */

// add_action( 'wp_enqueue_scripts', 'wp2018_scripts' );
//  // LOAD SCRIPTS
//  function wp2018_scripts() {

//     // Owl carousel
//     // wp_enqueue_script( 'wp2018-owl-script', '//cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js', array('jquery'), '', false );
//     // Plugins
//   	// wp_enqueue_script( 'wp2018-plugins-script', get_template_directory_uri() . '/js/jquery.matchHeight.min.js', array('jquery'), '', true );
//     // App.js
//     wp_enqueue_script( 'wp2018-app-script', get_template_directory_uri() . '/js/app-min.js', array('jquery'), '', true );

//     // Theme stylesheet.
//     wp_enqueue_style( 'wp2018-style', get_stylesheet_uri() );
//     // Add Wordpress dashicons to the theme
//     wp_enqueue_style( 'dashicons' );
//  }


//   // Defer scripts
//   // add_filter( 'clean_url', function( $url )
//   // {
//   //     if ( FALSE === strpos( $url, '.js' ) )
//   //     { // not our file
//   //         return $url;
//   //     }
//   //     // Must be a ', not "!
//   //     return "$url' defer='defer";
//   // }, 11, 1 );


/* Scripts*/
if (!is_admin()) add_action("wp_enqueue_scripts", "tidy_scripts", 11);
function tidy_scripts() {
    wp_dequeue_style( 'wp-block-library' );
    wp_deregister_script('wp-embed');
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery');
}

// https://www.isitwp.com/remove-code-wordpress-header/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator'); // WordPress version
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

/* Disable WP emojis */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
