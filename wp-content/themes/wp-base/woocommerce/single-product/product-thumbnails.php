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
	foreach ( $attachment_ids as $attachment_id ) {

		$thumbnailHtml = sprintf('<div class="gallery-thumbnail"><a href="%s" data-srcset="%s" data-large="%s" title="%s" class="thumbnail-link"><img src="%s" data-src="%s" width="100" height="100" class="lazy thumbnail-image" alt="%s"></a></div>',
			/* new src */ 		wp_get_attachment_image_src( $attachment_id, "medium_large")[0],
			/* new srcset */ 	wp_get_attachment_image_srcset( $attachment_id ),
			/* large */			wp_get_attachment_image_src( $attachment_id, "large")[0],
			/* title */ 		get_the_title( $attachment_id ),

			/* blank */			"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mO8Ww8AAj8BXkQ+xPEAAAAASUVORK5CYII=",
			/* data-src */ 		wp_get_attachment_image_src( $attachment_id,  array( 100, 100) )[0],
			/* alt */ 			get_post_meta($attachment_id, '_wp_attachment_image_alt', TRUE)
		);
		
		// <div data-thumb="//localhost:3000/wp-content/uploads/2019/12/IMG_8499-scaled-100x100.jpg" data-thumb-alt="Grey kitty" class="woocommerce-product-gallery__image">
		// 		<a href="//localhost:3000/wp-content/uploads/2019/12/IMG_8499-scaled.jpg">
					// <img width="100" height="100" src="//localhost:3000/wp-content/uploads/2019/12/IMG_8499-scaled.jpg" class="lazy active loaded" alt="Grey kitty" title="Grey kitty" data-caption="" data-src="" data-large_image="//localhost:3000/wp-content/uploads/2019/12/IMG_8499-scaled.jpg" data-large_image_width="2560" data-large_image_height="1707" srcset="//localhost:3000/wp-content/uploads/2019/12/IMG_8499-scaled-100x100.jpg 100w, //localhost:3000/wp-content/uploads/2019/12/IMG_8499-scaled-720x720.jpg 720w, //localhost:3000/wp-content/uploads/2019/12/IMG_8499-150x150.jpg 150w" sizes="(max-width: 100px) 100vw, 100px" data-srcset=""></a></div>

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $thumbnailHtml, $attachment_id); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
	}
}