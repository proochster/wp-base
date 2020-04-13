<?php
/**
 * WP Base Index
 * 
 * Template Name: Homepage template
 *
 * @package WordPress
 * @subpackage WP_Child
 */

get_header();
?>

<section class="hero is-light is-halfheight is-relative">
    <div class="hero-body">
        <?php if ( has_post_thumbnail() ) { ?>
            <picture class="image">
                <?php the_post_thumbnail('full'); ?>
            </picture>
        <?php } ?>
        <div class="container">
            <h1 class="title is-1">
                Neeloo
            </h1>
            <h2 class="subtitle">
                Naturally for fun
            </h2>
        </div>
    </div>
</section>

<?php // get_template_part( 'partials/header-image' ); ?>

<?php if ( class_exists( 'woocommerce' ) ) { ?>
<div class="section has-background-light">
    <div class="container">
        <h2 class="title">Our latest toys</h2>
        <ul class="columns is-multiline">
            <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3
                    );
                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ) {
                    while ( $loop->have_posts() ) : $loop->the_post();
                        wc_get_template_part( 'content', 'product' );
                    endwhile;
                } else {
                    echo __( 'No products found' );
                }
                wp_reset_postdata();
            ?>
        </ul><!--/.products-->
    </div>
</div>
<?php } ?>

<div class="section">
    <div class="container">
    <?php
    while ( have_posts() ) : the_post(); ?>
            <h1 class="title"><?php the_title(); ?></h1>
            <hr>
            <div class="container">
                <?php the_content(); ?>
            </div>
    <?php
    endwhile;
    wp_reset_query();
    ?>
    </div>
</div>

<?php
get_footer();
