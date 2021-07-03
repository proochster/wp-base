<?php // Only display the custom header imege on the front page.
if ( get_header_image() && is_front_page() ) : ?>

    <figure class="image">
        <img alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" src="<?php echo get_header_image(); ?>" class="lazy">
    </figure>

<?php endif ?>

