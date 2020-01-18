<?php
/**
 * Product Loop Start
 *
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php if(is_product()){ ?>
<ul class="columns is-mobile is-multiline">
<?php } else { ?>
<ul class="columns is-multiline">
<?php } ?>