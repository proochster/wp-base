<?php

/**
 * Result Count
 *
 * Shows text: Showing x - x of x results.
 *
 * @package     WooCommerce/Templates
 * @version     3.7.0
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<span class="level-item">
	<h4 class="title is-5">
		<?php
		if (1 === $total) {
			_e('Showing the single result', 'woocommerce');
		} elseif ($total <= $per_page || -1 === $per_page) {
			/* translators: %d: total results */
			printf(_n('Showing all %d result', 'Showing all %d results', $total, 'woocommerce'), $total);
		}
		?>
	</h4>
</span>