<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="columns" id="customer_login">

	<div class="column is-half is-one-third-desktop">

		<h2 class="title is-4"><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

		<div class="notification">

			<form class="woocommerce-form woocommerce-form-login login" method="post">

				<?php do_action( 'woocommerce_login_form_start' ); ?>

				<div class="field">
					<label for="username" class="label"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<div class="control">
						<input class="input" type="text" placeholder="Username" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"><?php // @codingStandardsIgnoreLine ?>
					</div>
				</div>

				<div class="field">
					<label for="password" class="label"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<div class="control">
						<input class="input" type="password" placeholder="Password" name="password" id="password" autocomplete="current-password">
					</div>
				</div>

				<?php do_action( 'woocommerce_login_form' ); ?>

				<div class="field">
					<label class="checkbox is-block">
						<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
					</label>
					<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				</div>

				<div class="field">
					<button type="submit" class="button is-primary is-fullwidth" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
				</div>

				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>

				<?php do_action( 'woocommerce_login_form_end' ); ?>

			</form>
		
		</div>

	</div>
	
<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	<div class="column is-half is-one-third-desktop">

		<h2 class="title is-4"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>
		
		<div class="notification">

			<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

				<?php do_action( 'woocommerce_register_form_start' ); ?>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

					<div class="field">
						<label for="reg_username" class="label"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="input" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					</div>

				<?php endif; ?>

				<div class="field">
					<label for="reg_email" class="label"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="email" class="input" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</div>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

					<div class="field">
						<label for="reg_password" class="label"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						<input type="password" class="input" name="password" id="reg_password" autocomplete="new-password" />
					</div>

				<?php else : ?>

					<div class="field">
						<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>
					</div>

				<?php endif; ?>

				<div class="field is-size-7">
					<?php do_action( 'woocommerce_register_form' ); ?>
				</div>

				<div class="field">
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<button type="submit" class="button is-primary is-outlined is-fullwidth" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
				</div>

				<?php do_action( 'woocommerce_register_form_end' ); ?>

			</form>
	
		</div>

	</div>

	<?php endif; ?>

</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
