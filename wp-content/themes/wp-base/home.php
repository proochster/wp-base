<?php
/**
 * WP Base Index
 *
 * Template Name: Blog home
 *
 * @package WordPress
 * @subpackage WP_Base
 */

get_header();
?>

<?php // Only display the custom header imege on the front page.
if ( get_header_image() && is_front_page() ) : ?>

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

      <div class="tile is-ancestor">

      <?php while ( have_posts() ) : the_post(); ?> 

        <div class="tile is-4 is-vertical is-parent">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="tile is-child box">
              <?php if ( has_post_thumbnail() ) the_post_thumbnail('medium_large'); ?>
              <h2 class="title"><?php the_title(); ?></h2>
              <?php the_excerpt(); ?>
          </a>
        </div>

      <?php endwhile;
      wp_reset_query(); ?>

      </div>
  </div>
</div>
<?php
get_footer();