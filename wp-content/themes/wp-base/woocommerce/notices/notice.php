<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/notice.php.
 * 
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! $messages ) {
	return;
}

?>
<div class="padding-bottom">
	<div class="message is-info">
		<ul class="message-body" role="alert">
		<?php foreach ( $messages as $message ) : ?>
			<li>
				<?php
					echo wc_kses_notice( $message );
				?>
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
</div>
