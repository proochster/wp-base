<?php
/**
 * Lost password reset form.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_reset_password_form' );
?>

<div class="columns">
	<dic class="column is-4-desktop">

		<form method="post">

			<h3 class="title is-4">
				<?php echo apply_filters( 'woocommerce_reset_password_message', esc_html__( 'Enter a new password below.', 'woocommerce' ) ); ?><?php // @codingStandardsIgnoreLine ?>
			</h3>

			<div class="field">
				<label for="password_1" class="label"><?php esc_html_e( 'New password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="password" class="input" name="password_1" id="password_1" autocomplete="new-password" />
			</div>

			<div class="field">
				<label for="password_2" class="label"><?php esc_html_e( 'Re-enter new password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="password" class="input" name="password_2" id="password_2" autocomplete="new-password" />
			</div>

			<input type="hidden" name="reset_key" value="<?php echo esc_attr( $args['key'] ); ?>" />
			<input type="hidden" name="reset_login" value="<?php echo esc_attr( $args['login'] ); ?>" />

			<div class="clear"></div>

			<?php do_action( 'woocommerce_resetpassword_form' ); ?>

			<input type="hidden" name="wc_reset_password" value="true" />
			<button type="submit" class="button is-info is-outlined" value="<?php esc_attr_e( 'Save', 'woocommerce' ); ?>"><?php esc_html_e( 'Save', 'woocommerce' ); ?></button>

			<?php wp_nonce_field( 'reset_password', 'woocommerce-reset-password-nonce' ); ?>

		</form>
	
	</dic>
</div>
<?php
do_action( 'woocommerce_after_reset_password_form' );

