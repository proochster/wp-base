<?php

/**
 * WP Base Search
 *
 *
 * @package WordPress
 * @subpackage WP_Base
 */

get_header();
?>

<?php if (is_search()) {
    global $wp_query;

    if ($wp_query->found_posts) {
        $search_result = sprintf(
            /* translators: %s: Number of search results */
            _n(
                'We found %s result for your search.',
                'We found %s results for your search.',
                $wp_query->found_posts,
                'wp-base'
            ),
            number_format_i18n($wp_query->found_posts)
        );
    } else {
        $search_result = __('We could not find any results for your search. You can give it another try through the search form below.', 'wp-base');
    } ?>

    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-6-desktop">
                        <h3 class="title is-4"><?php esc_attr_e($search_result); ?></h3>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-6-tablet is-4-desktop">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>


<section class="section">
    <div class="container">
        <div class="columns">

            <div class="column is-8-desktop is-6-fullhd">
                <?php
                // TO SHOW THE PAGE CONTENTS
                while (have_posts()) : the_post();
                    /* Because the_content() works only inside a WP Loop */
                    ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <h2 class="title is-5"><?php the_title(); ?></h2>
                        <p class="has-text-dark"><?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?></p>
                    </a>
                        <div class="level padding-top">
                            <div class="level-left">
                                <div class="level-item">
                                    <div class="tags">
                                        <?php $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            foreach( $categories as $category ){?>
                                            <span class="tag is-info is-light"><?php echo esc_html( $category->name ); ?></span>    
                                            <?php }
                                        }?>
                                    </div>
                                </div>
                            </div>
                            <div class="level-right">
                                <div class="level-item">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="button">
                                        <span><?php _e( 'Read more', 'wp-base' ); ?></span>
                                        <span class="icon is-small">
                                            <span class="dashicons dashicons-arrow-right-alt2"></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <hr>
                <?php
                endwhile; //resetting the page loop
                wp_reset_query(); //resetting the page query
                ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
