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

<?php if ( get_header_image() ) : ?>
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

        Index
        
        <h1 class="title is-1">title </h1>
        <h2 class="title is-2">title </h2>
        <h3>title </h3>
        <h4>title </h4>
        <h5>title </h5>
        <h6>title </h6>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit atque perferendis possimus cum illo maxime, eligendi voluptate quam adipisci repellat.</p>
        <ul>
            <li>Lorem, ipsum.</li>
            <li>Lorem, ipsum.</li>
            <li>Lorem, ipsum.</li>
            <li>Lorem, ipsum.</li>
            <li>Lorem, ipsum.</li>
            <li>Lorem, ipsum.</li>
        </ul>
    </div>
</div>
<?php
get_footer();