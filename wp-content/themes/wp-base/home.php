<?php
/**
 * WP Base Index
 *
 * Template Name: Blog index
 *
 * @package WordPress
 * @subpackage WP_Base
 */

get_header();
?>

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