<?php
/**
 * My Account navigation
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>
<article class="panel is-sticky">
<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
	<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="panel-block <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>" title="<?php echo esc_html( $label ); ?>"><?php echo esc_html( $label ); ?></a>
<?php endforeach; ?>
</article>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
