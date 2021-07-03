<?php
/**
 * Lost password confirmation text.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;
?>
<article class="message is-info">
	<div class="message-body">
        <?php wc_print_notice( esc_html__( 'Password reset email has been sent.', 'woocommerce' ) ); ?>
    </div>
</article>

<article class="message is-info">
	<div class="message-body">
        <?php echo esc_html( apply_filters( 'woocommerce_lost_password_confirmation_message', esc_html__( 'A password reset email has been sent to the email address on file for your account, but may take several minutes to show up in your inbox. Please wait at least 10 minutes before attempting another reset.', 'woocommerce' ) ) ); ?>
    </div>
</article>
