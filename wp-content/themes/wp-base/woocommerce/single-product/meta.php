<?php
/**
 * Single Product Meta
 *
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
	
<?php do_action( 'woocommerce_product_meta_start' ); ?>
<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
<p>
	<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>
</p>
<?php endif; ?>
<p>
	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span>' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>
	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span>' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>
</p>
<?php do_action( 'woocommerce_product_meta_end' ); ?>