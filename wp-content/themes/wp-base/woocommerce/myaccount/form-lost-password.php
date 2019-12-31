<?php
/**
 * Lost password form
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>
<div class="columns">
	<div class="column is-4-desktop">
		<form method="post" class="woocommerce-ResetPassword lost_reset_password">

			<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

			<div class="field">
				<label for="user_login" class="label"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
				<input class="input" type="text" name="user_login" id="user_login" autocomplete="username" />
			</div>

			<?php do_action( 'woocommerce_lostpassword_form' ); ?>

			<input type="hidden" name="wc_reset_password" value="true" />
			<button type="submit" class="button is-info is-outlined" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
		
			<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

		</form>
	</div>
</div>

<?php
do_action( 'woocommerce_after_lost_password_form' );
