<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage WP_Base
 * @since 1.0.0
 */

$aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>

<form role="search" <?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="search-form">
		<span class="is-sr-only"><?php _e( 'Search for', 'wp-base' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></span>
		<div class="field has-addons">
			<div class="control is-expanded has-icons-left">
				<input type="text" id="search-form" class="input" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'wp-base' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
				<span class="icon is-small is-left">
					<span class="dashicons dashicons-search"></span>
				</span>
			</div>
			<div class="control">
				<input type="submit" class="button is-info" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wp-base' ); ?>" />
			</div>
		</div>
	</label>
</form>