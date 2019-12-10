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
            <h1 class="title is-1">404</h1>
            <h2 class="subtitle">Sorry, the page you are looking for could not be found.</h2>
            <a href="<?php bloginfo('url'); ?>" title="Back to home" class="button is-link">< Back to home</a>
        </div>
    </div>
</section>
<?php
get_footer();