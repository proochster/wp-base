<?php
/**
 * WP Base Header
 *
 *
 * @package WordPress
 * @subpackage WP_Base
 */

 // Custom setting for fixed header
$heeader_fixed = get_theme_mod( 'fixed_header_setting' );
if($heeader_fixed && $heeader_fixed == 'true') {
    $body_class .= "has-navbar-fixed-top";
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php bloginfo('description'); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- <meta name="theme-color" content="<?php echo $primaryColour?>" /> -->
<!-- <meta name="msapplication-navbutton-color" content="<?php echo $primaryColour?>" />
<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo $primaryColour?>" /> -->
<meta property="og:title" content="<?php bloginfo('title'); ?>"/>
<meta property="og:site_name" content="<?php bloginfo('title'); ?>"/>
<meta property="og:url" content="<?php bloginfo('url'); ?>"/>
<meta property="og:description" content="<?php bloginfo('description'); ?>"/>
</head>
<body <?php body_class($body_class); ?>>
<?php get_template_part( 'partials/navigation-basket' ); ?>
<main id="site-content" role="main">