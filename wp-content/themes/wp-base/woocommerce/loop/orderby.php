<?php

/**
 * Show options for ordering
 *
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH')) {
	exit;
}

?>
<span class="level-item">
	<form method="get" class="orderby-form">
		<div class="select">
			<select name="orderby" class="orderby-select" aria-label="<?php esc_attr_e('Shop order', 'woocommerce'); ?>">
				<?php foreach ($catalog_orderby_options as $id => $name) : ?>
					<option value="<?php echo esc_attr($id); ?>" <?php selected($orderby, $id); ?>><?php echo esc_html($name); ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<input type="hidden" name="paged" value="1" />
		<?php wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); ?>
	</form>
</span>