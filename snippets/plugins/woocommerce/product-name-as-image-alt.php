<?php
/** 
 * Use product name as image "alt" attribute.
 * Note: you can use in any other custom post types.
 * 
 * @version 1.0.0
 */

add_filter('wp_get_attachment_image_attributes', 'lpb_product_image_alt_attribute', 20, 2);
function lpb_product_image_alt_attribute ( $attr, $attachment ) {
	// Get post parent
	$parent = get_post( $attachment->post_parent );

	// Get post type to check if it's product
	if( ! empty( $parent ) && $parent->post_type === 'product' ) {
		// change the alt and name attributes
		$attr['alt'] = $parent->post_title;
		$attr['title'] = $parent->post_title;
	}

	return $attr;
}