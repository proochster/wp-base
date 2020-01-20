<?php
/**
 * Single Product Thumbnails
 *
 * @package     WooCommerce/Templates
 * @version     3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();

// Include the main image in the thumbnails
array_unshift($attachment_ids, $product->image_id);


if ( $attachment_ids && $product->get_image_id() ) {

	echo '<div class="gallery-scroll"><div class="gallery-images is-flex-mobile">';

	foreach ( $attachment_ids as $key=>$attachment_id ) {

		$thumbnailHtml = sprintf('<div class="gallery-item" data-item-index="%s"><a href="%s" data-srcset="%s" data-large="%s" title="%s" class="gallery-link"><img src="%s" data-src="%s" class="lazy gallery-image" alt="%s" data-srcset="%s" sizes="%s"><span class="gallery-large-selector"></span></a></div>',
			/* index */			$key,
			/* new src */ 		wp_get_attachment_image_src( $attachment_id, "medium_large")[0],
			/* new srcset */ 	wp_get_attachment_image_srcset( $attachment_id ),
			/* large */			wp_get_attachment_image_src( $attachment_id, "large")[0],
			/* title */ 		get_the_title( $attachment_id ),

			/* blank */			"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mO8Ww8AAj8BXkQ+xPEAAAAASUVORK5CYII=",
			/* data-src */ 		wp_get_attachment_image_src( $attachment_id,  array( 100, 100) )[0],
			/* alt */ 			get_post_meta($attachment_id, '_wp_attachment_image_alt', TRUE),
			/* data-srcset */	wp_get_attachment_image_srcset( $attachment_id, "thumbnail" ),
			/* sizes */ 	wp_get_attachment_image_sizes( $attachment_id, "thumbnail" )
		);

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $thumbnailHtml, $attachment_id); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
	}
	
	echo '</div></div>';
	echo '<div class="gallery-nav">';

	foreach ( $attachment_ids as $attachment_id ) {
		$thumbnailNav = '<span class="gallery-nav-dot"></span>';
		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $thumbnailNav, $attachment_id); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
	}

	echo '</div>';
}