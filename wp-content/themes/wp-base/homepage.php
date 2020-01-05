<?php
/**
 * WP Base Index
 * 
 * Template Name: Homepage
 *
 * @package WordPress
 * @subpackage WP_Child
 */

get_header();
?>

<?php get_template_part( 'partials/header-image' ); ?>

<?php if ( has_post_thumbnail() ) { ?>
    <figure class="image">
        <?php the_post_thumbnail('full'); ?>
    </figure>
<?php } ?>

<div class="section">
    <div class="container">
    <?php
    while ( have_posts() ) : the_post(); ?>
            <h1 class="title"><?php the_title(); ?></h1>
            <hr>
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