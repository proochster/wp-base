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
        add_theme_support('title-tag');

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

        /**
        * Custom background color.
        * @link https://codex.wordpress.org/Custom_Backgrounds
        */
        add_theme_support(
            'custom-background',
            array(
                // 'default-color'          => '',
                // 'default-image'          => '',
                // 'default-repeat'         => 'repeat',
                // 'default-position-x'     => 'left',
                // 'default-position-y'     => 'top',
                // 'default-size'           => 'auto',
                // 'default-attachment'     => 'scroll',
                // 'wp-head-callback'       => '_custom_background_cb',
                // 'admin-head-callback'    => '',
                // 'admin-preview-callback' => ''
            )
        );

        /**
         * Theme logo support
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'width'       => 200,
                'height'      => 80,
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
                // 'default-image'          => '',
                // 'width'                  => 0,
                // 'height'                 => 0,
                // 'flex-height'            => true,
                // 'flex-width'             => true,
                // 'uploads'                => true,
                // 'random-default'         => false,
                // 'header-text'            => true,
                // 'default-text-color'     => '',
                // 'wp-head-callback'       => '',
                // 'admin-head-callback'    => '',
                // 'admin-preview-callback' => '',
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
     * Register custom settings
     * @link https://codex.wordpress.org/Theme_Customization_API
     * @link https://developer.wordpress.org/themes/customize-api/
     * @link https://premium.wpmudev.org/blog/wordpress-theme-customizer-guide/
     */
    function wpbase_customize_register( $wp_customize ) {

        /**
         * New setting for controls
         * @ Replace id_ref withe something ralateable. You will need to reference it (settings) when adding a new control.
         */
            // $wp_customize->add_setting( 'id_ref' , array(
            //     'default'   => '#000000',
            //     // 'transport' => 'refresh',
            // ) );
            $wp_customize->add_setting( 'fixed_header_setting' , array(
                'default'   => 'false',
                // 'transport' => 'refresh',
            ) );
            // $wp_customize->add_setting( 'text_setting' , array(
            //     'default'   => 'Test',
            //     // 'transport' => 'refresh',
            // ) );

        /**
         * New section
         * 
         * Use the built in sections or replace the 'mytheme_new_section_name' to create a new one.
         * title_tagline - Site Title & Tagline (and Site Icon in WP 4.3+)
         * colors - Colors
         * header_image - Header Image
         * background_image - Background Image
         * nav - Navigation
         * static_front_page - Static Front Page
         */
            $wp_customize->add_section( 'fixed_header_section' , array(
                'title'      => __( 'Fixed header bar', 'wpabse' ),
                'priority'   => 30,
            ) );           
            // $wp_customize->add_section( 'custom_section' , array(
            //     'title'      => __( 'Custom section', 'wpabse' ),
            //     'priority'   => 30,
            // ) );

        /**
         * New control
         * @link https://codex.wordpress.org/Class_Reference%5CWP_Customize_Manager%5Cadd_control
         */
            /**
             * Color picker. Instance of WP_Customize_Color_Control()
             */            
                // $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
                //     'label'      => __( 'Header Color', 'wpbase' ),
                //     'description' => __( 'Control description.', 'wpbase' ),
                //     'section'    => 'colors', // colors|header_image|background_image|nav|static_front_page
                //     'settings'   => 'id_ref',
                // ) ) );   
            /**
             * Form elements. Instance of WP_Customize_Control()
             * Supported types: text (default), checkbox, textarea, radio, select, dropdown-pages, email, url, number, hidden and date.
             */
                /**
                 * Radio button
                 */
                $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fixed_header_id', array(
                    'label'          => __( 'Fixed header', 'wpbase' ),
                    'section'        => 'fixed_header_section',
                    'settings'       => 'fixed_header_setting',
                    'type'           => 'radio',
                    'description' => __( 'This option will make the navigation bar stick to the top of the screen.', 'twentyfifteen' ),
                    'choices'        => array(
                        'true'   => __( 'Yes' ),
                        'false'  => __( 'No' )
                ) ) ) );
                /**
                 * Input text
                 */
                // $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'your_setting_id', array(
                //     'label'          => __( 'Label text', 'wpbase' ),
                //     'section'        => 'custom_section',
                //     'settings'       => 'text_setting',
                //     'type'           => 'text',
                // ) ) );
            /**
             * Other control Classes
             * WP_Customize_Upload_Control()
             * WP_Customize_Image_Control()
             */

     }
     add_action( 'customize_register', 'wpbase_customize_register' );

/**
 * END THEME CUSTOM SETUP
 * ----------------------
 */

/**
 * ---------------
 * MENUS
 */

    /**
     * Register theme menus
     * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
     */
    add_action( 'after_setup_theme', 'register_theme_menus' );
    
    function register_theme_menus() {
        register_nav_menus( array(
            'header_menu_start' => __( 'Header menu start', 'wpbase' ),
            'header_menu_end' => __( 'Header menu end', 'wpbase' ),
            // 'footer_menu' => __( 'Footer menu', 'wpbase' ),
        ) );
    }

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
 * Update Login screen
 */

// Load login.css file
function custom_login_styles() { ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/login.css">
<?php }
add_action( 'login_enqueue_scripts', 'custom_login_styles' );

// Update the logo link to point back to the site rather tahn WP
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// Update the logo text
function my_login_logo_url_title() {
    return 'Back to the homepage';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


/**
 * -------------------
 * WIDGET PLACEHOLDERS
 */

    function wpbase_widgets_init() {

        // Arguments used in all register_sidebar() calls.
        $shared_args = array(
            'before_title'  => '<h3 class="title is-4">',
            'after_title'   => '</h3>',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
        );

        register_sidebar( 
            array_merge(
                $shared_args,
                array(
                    'name'          => __( 'Footer #1', 'wpbase' ),
                    'id'            => 'footer-widgets-1',
                    'description'   => __( 'Appears in the footer of the page in the 1st section', 'wpbase' )
                )
            )    
         );
         register_sidebar( 
             array_merge(
                 $shared_args,
                 array(
                     'name'          => __( 'Footer #2', 'wpbase' ),
                     'id'            => 'footer-widgets-2',
                     'description'   => __( 'Appears in the footer of the page in the 2nd section', 'wpbase' )
                 )
             )    
          );
          register_sidebar( 
              array_merge(
                  $shared_args,
                  array(
                      'name'          => __( 'Footer #3', 'wpbase' ),
                      'id'            => 'footer-widgets-3',
                      'description'   => __( 'Appears in the footer of the page in the 3rd section', 'wpbase' )
                  )
              )    
           );
    }

    // REGITER SIDEBARS
    add_action( 'widgets_init', 'wpbase_widgets_init' );

/**
 * ---------------
 * ENQUEUE SCRIPTS
 */

//  // LOAD SCRIPTS
function wpbase_scripts() {
    
    // Get Theme version to append it to the asset '?ver=$ver'
    // $ver = wp_get_theme()->get( 'Version' );
    $ver = '';
    
    // App.js
    wp_enqueue_script( 'wpbase-app-script', get_template_directory_uri() . '/js/app-min.js', array(), $ver, true );
    
    // // Theme stylesheet.
    // wp_enqueue_style( 'wpbase-style', get_stylesheet_uri() );
    // Add Wordpress dashicons to the theme
    wp_enqueue_style( 'dashicons' );

}
add_action( 'wp_enqueue_scripts', 'wpbase_scripts' );


    //   Async scripts
    add_filter( 'clean_url', function( $url )
    {
        if ( FALSE === strpos( $url, 'app-min.js' ) )
        { // not our file
            return $url;
        }
        // Must be a ', not "!
        return "$url' async='async";
    }, 11, 1 );

    /* Scripts*/  
    function tidy_scripts() {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'contact-form-7' );
        wp_deregister_script('wp-embed');
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery');
    }
    // Load the script when in Theme Customisation 
    if (!is_customize_preview()) add_action("wp_enqueue_scripts", "tidy_scripts", 11);

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