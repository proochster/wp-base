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

<!-- <section class="hero is-warning is-bold is-medium">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">Primary title</h1>
            <h2 class="subtitle">Primary subtitle</h2>
        </div>
    </div>
</section> -->

<div class="section">
    <div class="container">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
        <h1 class="title"><?php the_title(); ?></h1>
        <?php
        // print_r(get_post());
         ?>

<?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
            <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>
    </div>
</div>
<?php
get_footer();