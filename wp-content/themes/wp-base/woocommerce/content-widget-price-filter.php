<?php

/**
 * The template for displaying product price filter widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-price-filter.php
 *
 * @package WooCommerce/Templates
 * @version 3.7.1
 */

defined('ABSPATH') || exit;

?>
<?php //do_action('woocommerce_widget_price_filter_start', $args); ?>

<form method="get" action="<?php echo esc_url($form_action); ?>">
	<div class="field has-addons has-addons-centered">
		<p class="control">
			<span class="button is-static">£</span>
        </p>
		<p class="control">
			<input type="text" id="min_price" class="input" name="min_price" value="<?php echo esc_attr($current_min_price); ?>" data-min="<?php echo esc_attr($min_price); ?>" placeholder="<?php echo esc_attr__('Min price', 'woocommerce'); ?>" />
		</p>
		<p class="control">
			<input type="text" id="max_price" class="input" name="max_price" value="<?php echo esc_attr($current_max_price); ?>" data-max="<?php echo esc_attr($max_price); ?>" placeholder="<?php echo esc_attr__('Max price', 'woocommerce'); ?>" />
		</p>
		<p class="control">
			<button type="submit" class="button is-link is-outlined"><?php echo esc_html__('Filter', 'woocommerce'); ?></button>
		</p>
	</div>
	<?php echo wc_query_string_form_fields(null, array('min_price', 'max_price', 'paged'), '', true); ?>
</form>

<?php do_action('woocommerce_widget_price_filter_end', $args); ?>