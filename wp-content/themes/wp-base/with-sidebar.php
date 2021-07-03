<?php
/**
 * WP Base Index
 *
 * Template Name: Page with sidebar template
 *
 * @package WordPress
 * @subpackage WP_Base
 */

$has_sidebar = is_active_sidebar( 'sidebar-widgets' );

get_header();
?>

<?php get_template_part( 'partials/header-image' ); ?>

<div class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-7-tablet is-8-desktop">

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
                
            <?php if ( $has_sidebar ) : ?>
                <div class="column is-5-tablet is-4-desktop">
                    <div class="is-sticky">
                        <?php dynamic_sidebar( 'sidebar-widgets' ); ?>
                    </div>
                </div>
            <?php endif ?>

        </div>
    </div>
</div>

<?php
get_footer();