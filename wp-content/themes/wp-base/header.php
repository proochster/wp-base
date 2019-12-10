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
            <a class="navbar-item" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>">
                <?php
                 if ( get_theme_mod( 'custom_logo' ) ) {
                    the_custom_logo();
                } else {
                    bloginfo('title');
                }
                ?>
            </a>
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