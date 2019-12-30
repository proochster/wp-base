<?php
/**
 * Edit account form
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>


<div class="columns">
	<div class="column is-6-desktop">
		<form action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

			<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

			<div class="field">
				<label for="account_first_name" class="label"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="input" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" placeholder="<?php esc_html_e( 'First name', 'woocommerce' ); ?>"/>
			</div>
			<div class="field">
				<label for="account_last_name" class="label"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="input" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" placeholder="<?php esc_html_e( 'Last name', 'woocommerce' ); ?>"/>
			</div>
			<div class="field">
				<label for="account_display_name" class="label"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="input" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" placeholder="<?php esc_html_e( 'Display name', 'woocommerce' ); ?>"/> 
			</div>
			<div class="field"><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></div>
			<div class="field">
				<label for="account_email" class="label"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="email" class="input" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" placeholder="<?php esc_html_e( 'example@email.com', 'woocommerce' ); ?>"/>
			</div>

			<hr>

			<h3 class="title is-6"><?php esc_html_e( 'Password change', 'woocommerce' ); ?></h3>

			<div class="field">
				<label for="password_current" class="label"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
				<input type="password" class="input" name="password_current" id="password_current" autocomplete="off" />
			</div>
			<div class="field">
				<label for="password_1" class="label"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label>
				<input type="password" class="input" name="password_1" id="password_1" autocomplete="off" />
			</div>
			<div class="field">
				<label for="password_2" class="label"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
				<input type="password" class="input" name="password_2" id="password_2" autocomplete="off" />
			</div>

			<?php do_action( 'woocommerce_edit_account_form' ); ?>

				<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
				<button type="submit" class="button is-info is-outlined" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
				<input type="hidden" name="action" value="save_account_details" />

			<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
		</form>
	</div>
</div>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
