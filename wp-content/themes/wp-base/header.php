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
<?php /* if ( get_header_image() ) : ?>
    <div id="site-header">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </a>
    </div>
<?php endif;*/ ?>

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

                // print_r(get_theme_mod( 'custom_logo' ));

                // $custom_logo_id = get_theme_mod( 'custom_logo' );
                // $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                // if ( has_custom_logo() ) {
                //         echo '<img src="' . esc_url( $logo&#91;0&#93; ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                // } else {
                //         echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
                // }
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
                $rightMenuParameters = array(
                    'theme_location' => 'header_menu_left',
                    'container'       => 'div',
                    'container_class' => 'navbar-start',
                    'echo' => '',
                    'items_wrap' => '%3$s',
                    'depth' => 0
                );
                echo strip_tags( wp_nav_menu( $rightMenuParameters ), '<div><a>' );
            ?>
            <?php
                $leftMenuParameters = array(
                    'theme_location' => 'header_menu_right',
                    'container'       => 'div',
                    'container_class' => 'navbar-end',
                    'echo' => '',
                    'items_wrap' => '%3$s',
                    'depth' => 0
                );
                echo strip_tags( wp_nav_menu( $leftMenuParameters ), '<div><a>' );
            ?>
        </div>
    </div>
</nav>

<?php
              
              wp_nav_menu( array(
                'theme_location' => 'header_menu_left',
                'container'       => 'div',
                'container_class' => 'navbar-start',
                // 'echo' => '',
                // 'items_wrap' => '%3$s',
                // 'depth' => 0
            ))

?>
<main id="site-content" role="main">