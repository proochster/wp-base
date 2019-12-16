<?php
/**
 * Default navigation
 * Brand placeholder, mobile, hamburger menu, left and right custom menus
 */

// Custom setting for fixed header
$heeader_fixed = get_theme_mod( 'fixed_header_setting' );
if($heeader_fixed && $heeader_fixed == 'true') {
    $nav_class .= "is-fixed-top";
}

?><nav class="navbar has-shadow <?php echo $nav_class?>" role="navigation" aria-label="main navigation">
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

