<?php
/**
 * WP Base Index
 *
 * Template Name: Contact page
 *
 * @package WordPress
 * @subpackage WP_Base
 */

 
$has_contact_widgets = is_active_sidebar( 'contact-widgets' );

get_header();
?>

<div class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-half">
                <?php while ( have_posts() ) : the_post(); ?>
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="container">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>
            <div class="column is-half">
                <?php if ( $has_contact_widgets ) : ?>
                    <?php dynamic_sidebar( 'contact-widgets' ); ?>
                <?php endif ?>
            </div>
        </div>

    </div>
</div>

<?php
get_footer();