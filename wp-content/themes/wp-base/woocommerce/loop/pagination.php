<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}
?>
<nav class="pagination" role="navigation" aria-label="pagination">
	<?php

		$navArgs = array( // WPCS: XSS ok.
			'base'         => $base,
			'format'       => $format,
			'add_args'     => false,
			'current'      => max( 1, $current ),
			'total'        => $total,
			'prev_text'    => '<span class="dashicons dashicons-arrow-left-alt2"></span>',
			'next_text'    => '<span class="dashicons dashicons-arrow-right-alt2"></span>',
			'prev_next'	   => true,
			'type'         => 'plain',
			'end_size'     => 3,
			'mid_size'     => 3,
			'before_page_number' => '<span class="pagination-link">',
			'after_page_number' => '</span>',
		);

		echo paginate_links( apply_filters( 'woocommerce_pagination_args', $navArgs ) ) ;

	?>
</nav>