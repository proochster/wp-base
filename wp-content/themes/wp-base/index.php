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
    while ( have_posts() ) : the_post(); ?>
            <h1 class="title"><?php the_title(); ?></h1>
            <div class="container">
                <?php the_content(); ?>
            </div>

    <?php
    endwhile;
    wp_reset_query();
    ?>
    </div>
</div>

<?php
get_footer();