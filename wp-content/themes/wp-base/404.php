<?php
/**
 * WP Base 404
 *
 *
 * @package WordPress
 * @subpackage WP_Base
 */

get_header();
?>

<section class="hero is-warning is-bold is-medium">
    <div class="hero-body">
        <div class="container">
            <h1 class="title is-1"><?php _e('404', 'wp-base'); ?></h1>
            <h2 class="subtitle"><?php _e('Sorry, the page you are looking for could not be found.', 'wp-base'); ?></h2>
            <a href="<?php bloginfo('url'); ?>" title="<?php _e('< Back to home', 'wp-base'); ?>" class="button is-link"><?php _e('< Back to home', 'wp-base'); ?></a>
        </div>
    </div>
</section>
<?php
get_footer();