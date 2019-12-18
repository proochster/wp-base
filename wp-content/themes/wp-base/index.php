<?php
/**
 * WP Base Index
 *
 *
 * @package WordPress
 * @subpackage WP_Base
 */

get_header();
?>

<?php get_template_part( 'partials/header-image' ); ?>

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