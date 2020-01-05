<?php
/**
 * WP Base Index
 *
 * Template Name: Contact page template
 *
 * @package WordPress
 * @subpackage WP_Base
 */

 
$has_contact_widgets = is_active_sidebar( 'contact-widgets' );

get_header();
?>

<div class="section">
    <div class="container">
        <h1 class="title"><?php the_title(); ?></h1>
        <hr>
        <div class="columns">
            <div class="column is-half is-one-third-desktop">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="container">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>
            <?php if ( $has_contact_widgets ) : ?>
                <div class="column is-half is-one-third-desktop">
                    <?php dynamic_sidebar( 'contact-widgets' ); ?>
                </div>
            <?php endif ?>
        </div>

    </div>
</div>

<?php
get_footer();