<?php
/**
 * Single Product Price
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<span class="has-text-danger"><?php echo $product->get_price_html(); ?></span>
