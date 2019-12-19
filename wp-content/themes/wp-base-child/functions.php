<?php

/**
 *
 *
 * @package WordPress
 * @subpackage WP_Base_Child
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


/**
 * ---------------
 * ENQUEUE SCRIPTS
 */

// LOAD SCRIPTS
function wpchild_assets() {
    
    // Get Theme version to append it to the asset '?ver=$ver'
    $ver = wp_get_theme()->get( 'Version' );
    
    // App.js
    wp_enqueue_script( 'wpbase-app-script', get_stylesheet_directory_uri() . '/js/app-min.js', array(), $ver, true );

}
add_action( 'wp_enqueue_scripts', 'wpchild_assets' );