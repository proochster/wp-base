<?php
/**
 * WP Base Index
 *
 * Template Name: Default
 *
 * @package WordPress
 * @subpackage WP_Base
 */

get_header();
?>

<?php // Only display the custom header imege on the front page.
if ( get_header_image() && is_front_page() ) : ?>

    <figure class="image">
        <img alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" src="<?php echo get_header_image(); ?>">
    </figure>

<?php endif ?>

<div class="section">
    <div class="container">
    <?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post();
    /* Because the_content() works only inside a WP Loop */ ?>
            <h1 class="title"><?php the_title(); ?></h1>
            <div class="container">
                <?php the_content(); ?> <!-- Page Content -->
            </div>

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>
    </div>
</div>

<?php
get_footer();