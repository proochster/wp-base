<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
		<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
			<div class="columns is-multiline">
				<div class="column is-8">
				
				<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				// do_action( 'woocommerce_before_single_product_summary' );

				woocommerce_show_product_images();
				?>

				</div>

				<div class="column is-4">
					<?php
					woocommerce_template_single_title();
					// woocommerce_template_single_rating();
					?>	
					<p>
					<?php
						woocommerce_show_product_sale_flash();
						woocommerce_template_single_price();
					?>
					</p>	
					<?php 
						woocommerce_template_single_excerpt();
						woocommerce_template_single_add_to_cart();
						woocommerce_template_single_meta();
						// woocommerce_template_single_sharing();
					?>
				</div>
				<div class="column is-8">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		
		<?php 	
		/**
		 *	Breaks the page template main Section and Container to allow Related Products to have full width background 
		 */
		?>
	</div> 
</div>

<div class="section has-background-primary">
	<div class="container">
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	// do_action( 'woocommerce_after_single_product_summary' );

	woocommerce_output_related_products();
	?>
	</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
