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
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title');?>" class="navbar-item">
            <?php if ( get_theme_mod( 'custom_logo' )) : ?>

                <?php $custom_logo_url = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ) , 'full' );
                    /**
                     * @param Array
                     * [0] - src
                     * [1] - width
                     * [2] - height
                     */
                    ?>
                <img src="<?php echo esc_url( $custom_logo_url[0]);?>" alt="<?php bloginfo('title'); ?>" height="<?php echo $custom_logo_url[2];?>">
        
            <?php else : ?>
                
                <?php bloginfo('title'); ?>
            
            <?php endif ?>
            </a>
                
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>

            <?php if ( class_exists( 'woocommerce' ) ) { ?>
            <p class="control navbar-item is-hidden-desktop">
                <a class="button is-success" href="#">
                    <span class="icon">
                    <span class="dashicons dashicons-cart"></span>
                    </span>
                    <span class="icon">
                        <span class="tag is-rounded">0</span>
                    </span>
                </a>
            </p>
            <?php } ?>

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
        
        <?php if ( class_exists( 'woocommerce' ) ) { ?>
        <p class="control navbar-item is-hidden-touch">
            <a class="button is-success" href="#">
                <span class="icon">
                <span class="dashicons dashicons-cart"></span>
                </span>
                <span><?php _e('Basket', 'wp-base'); ?></span>
                <span class="icon">
                    <span class="tag is-rounded">0</span>
                </span>
            </a>
        </p>
        <?php } ?>

    </div>
</nav>