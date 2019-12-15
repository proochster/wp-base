<?php
/**
 * WP Base Header
 *
 *
 * @package WordPress
 * @subpackage WP_Base
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php bloginfo('description'); ?>">
<style>
<?php include('inline.css');?>
</style>
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- <meta name="theme-color" content="<?php echo $primaryColour?>" /> -->
<!-- <meta name="msapplication-navbutton-color" content="<?php echo $primaryColour?>" />
<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo $primaryColour?>" /> -->
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.png" type="image/x-icon">
<meta property="og:title" content="<?php bloginfo('title'); ?>"/>
<meta property="og:site_name" content="<?php bloginfo('title'); ?>"/>
<meta property="og:url" content="<?php bloginfo('url'); ?>"/>
<meta property="og:description" content="<?php bloginfo('description'); ?>"/>
</head>
<body <?php body_class(); ?>>
<nav class="navbar has-shadow is-spaced" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">

            <?php if ( get_theme_mod( 'custom_logo' )) : ?>
                <?php $custom_logo_url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' );
                    /**
                     * @param Array
                     * [0] - src
                     * [1] - width
                     * [2] - height
                     */
                    ?>
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>">
                <img src="<?php echo esc_url( $custom_logo_url[0]);?>" alt="<?php bloginfo('title'); ?>" width="<?php echo $custom_logo_url[1];?>" height="<?php echo $custom_logo_url[2];?>" class="navbar-item"> 
            </a>
        
            <?php else : ?>
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title');?>" class="navbar-item">
                <?php bloginfo('title'); ?>
            </a>
            <?php endif ?>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-menu">
            <?php 
                wp_nav_menu( array(
                    'theme_location' => 'header_menu_start',
                    'fallback_cb' => 'false',
                    'container'       => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-start">%3$s</ul>',
                ));
            ?>
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'header_menu_end',
                    'fallback_cb' => 'false',
                    'container'       => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s navbar-end">%3$s</ul>',
                ));
            ?>
        </div>
    </div>
</nav>
<main id="site-content" role="main">