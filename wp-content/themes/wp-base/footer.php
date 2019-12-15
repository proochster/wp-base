<?php
/**
 * WP Base Footer
 *
 *
 * @package WordPress
 * @subpackage WP_Base
 */

$has_footer_1 = is_active_sidebar( 'footer-widgets-1' );
$has_footer_2 = is_active_sidebar( 'footer-widgets-2' );
$has_footer_3 = is_active_sidebar( 'footer-widgets-3' );
$has_footer_4 = is_active_sidebar( 'footer-widgets-3' );

?>
</main>
<?php if ($has_footer_1 || $has_footer_2 || $has_footer_3 ) {?>
<div class="section has-background-grey-lighter">
  <div class="container">
    <div class="columns">
      <?php if ( $has_footer_1 ) : ?>
        <div class="column">
        <?php dynamic_sidebar( 'footer-widgets-1' ); ?>
        </div>
      <?php endif ?>
      <?php if ( $has_footer_2 ) : ?>
        <div class="column">
        <?php dynamic_sidebar( 'footer-widgets-2' ); ?>
        </div>
      <?php endif ?>
      <?php if ( $has_footer_3 ) : ?>
        <div class="column">
        <?php dynamic_sidebar( 'footer-widgets-3' ); ?>
        </div>
      <?php endif ?>
      <?php if ( $has_footer_4 ) : ?>
        <div class="column">
        <?php dynamic_sidebar( 'footer-widgets-4' ); ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>
  <?php } ?>
<footer class="footer">
  <div class="content has-text-centered">
    <p>
      <strong><?php bloginfo('title') ?></strong> by <a href="https://jgthms.com">Jakub Prochniak</a>. GitHub <a href="https://github.com/proochster/wp-base" title="GitHub repository">repository</a>.
    </p>
    <?php 
        echo get_bloginfo('description');
        get_template_part( 'partials/page-types' );
    ?>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
