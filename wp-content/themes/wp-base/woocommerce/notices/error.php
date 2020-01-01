<?php
/**
 * Show error messages
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! $messages ) {
	return;
}

?>
<div class="padding-bottom">
	<div class="message is-danger">
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
