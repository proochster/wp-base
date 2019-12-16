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

?>
</main>
<?php if ( $has_footer_1 || $has_footer_2 || $has_footer_3 || $has_footer_4 ) {?>
<div class="section has-background-white-ter">
  <div class="container">
    <div class="columns is-multiline">

      <?php if ( $has_footer_1 ) : ?>
        <div class="column is-6-tablet is-3-desktop is-one-third-fullhd">
        <?php dynamic_sidebar( 'footer-widgets-1' ); ?>
        </div>
      <?php endif ?>
      <?php if ( $has_footer_2 ) : ?>
        <div class="column is-6-tablet is-3-desktop is-one-third-fullhd">
        <?php dynamic_sidebar( 'footer-widgets-2' ); ?>
        </div>
      <?php endif ?>
      <?php if ( $has_footer_3 ) : ?>
        <div class="column is-12-tablet is-6-desktop is-one-third-fullhd">
        <?php dynamic_sidebar( 'footer-widgets-3' ); ?>
        </div>
      <?php endif ?>

    </div>
  </div>
</div>
  <?php } ?>
<footer class="footer has-background-grey-darker has-text-white">
  <div class="content has-text-centered">
    <?php bloginfo('title') ?> by <a href="https://thewebsitesguys.co.uk" title="The Websites Guys">The Websites Guys</a>. GitHub <a href="https://github.com/proochster/wp-base" title="GitHub repository">repository</a>.
    <?php
        get_template_part( 'partials/page-types' );
    ?>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
