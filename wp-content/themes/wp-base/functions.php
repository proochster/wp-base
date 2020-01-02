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
 * Languages
 * 
 */

// function wpbase_load_theme_textdomain() {
//     load_theme_textdomain( 'wp-base', get_template_directory() . '/languages' );
// }
// add_action( 'after_setup_theme', 'wpbase_load_theme_textdomain' );

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
                // 'width'       => 200,
                // 'height'      => 80,
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
     * Preload cuctom logo tag
     */
    function wpbase_preload_custom_logo() {
       // Check if custom logo has been set and preload it
       $custom_logo_id = get_theme_mod( 'custom_logo' );
       
       if( $custom_logo_id ){

        $custom_logo_url = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        ?><link rel="preload" href="<?php echo esc_url( $custom_logo_url[0]);?>" as="image"><?php
       } else {
           return;
       }
    }

    add_action( 'wp_head', 'wpbase_preload_custom_logo' );

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
                'title'      => __( 'Fixed header bar', 'wp-base' ),
                'priority'   => 30,
            ) );           
            // $wp_customize->add_section( 'custom_section' , array(
            //     'title'      => __( 'Custom section', 'wp-base' ),
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
                //     'label'      => __( 'Header Color', 'wp-base' ),
                //     'description' => __( 'Control description.', 'wp-base' ),
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
                    'label'          => __( 'Fixed header', 'wp-base' ),
                    'section'        => 'fixed_header_section',
                    'settings'       => 'fixed_header_setting',
                    'type'           => 'radio',
                    'description' => __( 'This option will make the navigation bar stick to the top of the screen.', 'wp-base' ),
                    'choices'        => array(
                        'true'   => __( 'Yes', 'wp-base' ),
                        'false'  => __( 'No', 'wp-base' )
                ) ) ) );
                /**
                 * Input text
                 */
                // $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'your_setting_id', array(
                //     'label'          => __( 'Label text', 'wp-base' ),
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
            'header_menu_start' => __( 'Header menu start', 'wp-base' ),
            'header_menu_end' => __( 'Header menu end', 'wp-base' ),
            // 'footer_menu' => __( 'Footer menu', 'wp-base' ),
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
    //                 'name' => __('Work', 'wp-base'),
    //                 'singular_name' => __('Work', 'wp-base'),
    //                 'add_new' => __('Add new', 'wp-base'),
    //                 'add_new_item' => __('Add new work item', 'wp-base'),
    //                 'edit_item' => __('Edit work item', 'wp-base'),
    //                 'new_item' => __('New work item', 'wp-base'),
    //                 'view_item' => __('View work item', 'wp-base'),
    //                 'search_items' => __('Search work item', 'wp-base'),
    //                 'not_found' =>  __('Nothing found', 'wp-base'),
    //                 'not_found_in_trash' => __('Nothing found in Trash', 'wp-base'),
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
 * Update Login screen
 */

    // Load login.css file
    function custom_login_styles() {
        ?><?php if ( get_theme_mod( 'custom_logo' )) : ?>
        <?php $custom_logo_url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' );
            /**
             * @param Array
             * [0] - src
             * [1] - width
             * [2] - height
             */
            ?><style>.login h1 a{background-image: url("<?php echo esc_url( $custom_logo_url[0]);?>") !important; background-size: auto !important; width: auto !important;}</style><?php
         endif ?>
         <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/login.css"><?php
    }
    add_action( 'login_enqueue_scripts', 'custom_login_styles' );

    // Update the logo link to point back to the site rather than WP
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
            'before_title'  => '<h3 class="title is-5">',
            'after_title'   => '</h3>',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
        );

        register_sidebar( 
            array_merge(
                $shared_args,
                array(
                    'name'          => __( 'Footer #1', 'wp-base' ),
                    'id'            => 'footer-widgets-1',
                    'description'   => __( 'Appears in the footer of the page in the 1st section', 'wp-base' )
                )
            )    
         );
         register_sidebar( 
             array_merge(
                 $shared_args,
                 array(
                     'name'          => __( 'Footer #2', 'wp-base' ),
                     'id'            => 'footer-widgets-2',
                     'description'   => __( 'Appears in the footer of the page in the 2nd section', 'wp-base' )
                 )
             )    
          );
          register_sidebar( 
              array_merge(
                  $shared_args,
                  array(
                      'name'          => __( 'Footer #3', 'wp-base' ),
                      'id'            => 'footer-widgets-3',
                      'description'   => __( 'Appears in the footer of the page in the 3rd section', 'wp-base' )
                  )
              )    
           );
           register_sidebar( 
               array_merge(
                   $shared_args,
                   array(
                       'name'          => __( 'Sidebar', 'wp-base' ),
                       'id'            => 'sidebar-widgets',
                       'description'   => __( 'Sidebar template widgets', 'wp-base' )
                   )
               )    
            );
            register_sidebar( 
                array_merge(
                    $shared_args,
                    array(
                        'name'          => __( 'Contact', 'wp-base' ),
                        'id'            => 'contact-widgets',
                        'description'   => __( 'Contact us widgets', 'wp-base' )
                    )
                )    
             );
             register_sidebar( 
                 array_merge(
                     $shared_args,
                     array(
                         'name'          => __( 'Shop', 'wp-base' ),
                         'id'            => 'shop',
                         'description'   => __( 'Shop widgets', 'wp-base' )
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

    // LOAD MAIN SCRIPTS
    function wpbase_assets() {
        
        // Get Theme version to append it to the asset '?ver=$ver'
        $ver = wp_get_theme()->get( 'Version' );
        
        // App.js
        wp_enqueue_script( 'wpbase-app-script', get_stylesheet_directory_uri() . '/js/app-min.js', array(), $ver, true );
        
        // Theme stylesheet.
        wp_enqueue_style( 'wpbase-style', get_stylesheet_uri(), array(), $ver, 'all' );
    }
    add_action( 'wp_enqueue_scripts', 'wpbase_assets' );

    // SCRIPTS REQUIRED ON-LOAD
    function wpbase_priority_script() { 

        // Get Theme version to append it to the asset '?ver=$ver'
        $ver = wp_get_theme()->get( 'Version' );

        ?><script src="<?php echo get_stylesheet_directory_uri() . '/js/onload-min.js' . '?ver=' . $ver ?>"></script><?php
    }
    add_action( 'wp_footer', 'wpbase_priority_script' );

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

    /* Scripts ans styles */  
    function tidy_scripts() {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'contact-form-7' );
        wp_deregister_script('wp-embed');
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery');
    }
    // Load the script only when in Theme Customisation 
    if (!is_customize_preview()) add_action("wp_enqueue_scripts", "tidy_scripts", 11);

    // https://www.isitwp.com/remove-code-wordpress-header/
    // Get rid of the clutter
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator'); // WordPress version
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');

    /* Disable WP emojis */
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );


/**
 * Lazyloading filter
 */

    function wpbase_apply_lazyload_atts( $atts, $attachment ) {
            
        $lazySrc = $atts['src'];
        $lazyDataSrc = $atts['srcset'];
        
        $atts['class'] = 'lazy';
        $atts['src'] = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mO8Ww8AAj8BXkQ+xPEAAAAASUVORK5CYII=';
        $atts['srcset'] = $lazySrc;
        $atts['data-srcset'] = $lazyDataSrc;

        return $atts;
    }
    add_filter( 'wp_get_attachment_image_attributes', 'wpbase_apply_lazyload_atts', 10, 2 );


/**
 * -----------
 * WooCommerce
 */

    if ( class_exists( 'woocommerce' ) ) {
            
        // Register WooCommerce
        function wpchild_add_woocommerce_support() {
            add_theme_support( 'woocommerce' );
            // add_theme_support( 'woocommerce', array(
            //     'thumbnail_image_width' => 150,
            //     'single_image_width'    => 300,
        
            //     'product_grid'          => array(
            //         'default_rows'    => 3,
            //         'min_rows'        => 2,
            //         'max_rows'        => 8,
            //         'default_columns' => 4,
            //         'min_columns'     => 2,
            //         'max_columns'     => 5,
            //     ),
            // ) );
        }
        add_action( 'after_setup_theme', 'wpchild_add_woocommerce_support' );
        
        // Remove most of the WooCommerce styles withe the line below
        add_filter( 'woocommerce_enqueue_styles', '__return_false' );

        /* Tidy styles */  
        function wpbase_dequeue_woocommerce_styles() {
            wp_deregister_style( 'wc-block-style' );
            // You can unset the styles one by one too
            //     unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
            //     unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
            //     unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
            //     return $enqueue_styles;
        }
        add_action("wp_enqueue_scripts", "wpbase_dequeue_woocommerce_styles", 11);

        // Add custom WooCommerce styles
        // function wpchild_enqueue_woocommerce_styles(){
    
        //     $ver = wp_get_theme()->get( 'Version' );
            
        //     wp_register_style( 'wpbase-woocommerce', get_template_directory_uri() . '/css/woocommerce.css', array(), $ver );
            
        //     wp_enqueue_style( 'wpbase-woocommerce' );
        // }
        // add_action( 'wp_enqueue_scripts', 'wpchild_enqueue_woocommerce_styles' );

        
        // Address fields
        function wpbase_change_address_fields( $fields ) {
            
            $fields['first_name']['label_class'] = 'label';
            $fields['first_name']['input_class'] = array('input');
            $fields['first_name']['placeholder'] = __('First name');

            $fields['last_name']['label_class'] = 'label';
            $fields['last_name']['input_class'] = array('input');
            $fields['last_name']['placeholder'] = __('Last name');

            $fields['company']['label_class'] = 'label';
            $fields['company']['input_class'] = array('input');
            $fields['company']['placeholder'] = __('Company');

            $fields['country']['label_class'] = 'label';
            $fields['country']['input_class'] = array('input');

            return $fields;
            
        }
        add_filter( 'woocommerce_default_address_fields' , 'wpbase_change_address_fields' );

        // Shipping fields
        function wpbase_change_shipping_fields( $fields ) {
            
            $fields['shipping_address_1']['label_class'] = 'label';
            $fields['shipping_address_1']['input_class'] = array('input');
            
            $fields['shipping_address_2']['label_class'] = 'label';
            $fields['shipping_address_2']['input_class'] = array('input');
            
            $fields['shipping_city']['label_class'] = 'label';
            $fields['shipping_city']['input_class'] = array('input');
            $fields['shipping_city']['placeholder'] = __('City');

            $fields['shipping_state']['label_class'] = 'label';
            $fields['shipping_state']['input_class'] = array('input');

            $fields['shipping_postcode']['label_class'] = 'label';
            $fields['shipping_postcode']['input_class'] = array('input');

            return $fields;
            
        }
        add_filter( 'woocommerce_shipping_fields' , 'wpbase_change_shipping_fields' );

        // Billing fields
        function wpbase_change_billing_fields( $fields ) {
            
            $fields['billing_address_1']['label_class'] = 'label';
            $fields['billing_address_1']['input_class'] = array('input');
            
            $fields['billing_address_2']['label_class'] = 'label';
            $fields['billing_address_2']['input_class'] = array('input');
            
            $fields['billing_city']['label_class'] = 'label';
            $fields['billing_city']['input_class'] = array('input');
            $fields['billing_city']['placeholder'] = __('City');

            $fields['billing_state']['label_class'] = 'label';
            $fields['billing_state']['input_class'] = array('input');

            $fields['billing_postcode']['label_class'] = 'label';
            $fields['billing_postcode']['input_class'] = array('input');

            $fields['billing_phone']['label_class'] = 'label';
            $fields['billing_phone']['input_class'] = array('input');

            $fields['billing_email']['label_class'] = 'label';
            $fields['billing_email']['input_class'] = array('input');
            $fields['billing_email']['placeholder'] = __('example@email.com');

            return $fields;
            
        }
        add_filter( 'woocommerce_billing_fields' , 'wpbase_change_billing_fields' );

        /**
         * Modify elements' structure
         */

        // ----------------
        // PRODUCT ARCHIVE
        // ----------------

        // PRODUCT TITLE. Source: \plugins\woocommerce\includes\wc-template-functions.php

            function woocommerce_template_loop_product_title() {
                echo '<h2 class="title is-4">' . get_the_title() . '</h2>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }




        // UNHOOK ELEMENTS. 
        
            remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
            // remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
            // remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );




    }