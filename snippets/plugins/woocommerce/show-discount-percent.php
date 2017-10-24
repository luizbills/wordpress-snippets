<?php
/** 
 * Show discount percent in sales badge
 * 
 * @version 1.0.0
 */

add_filter( 'woocommerce_sale_flash', 'lpb_sale_percent_badge', 10, 3 );
function lpb_sale_percent_badge ( $content, $post, $product ) {
	$sale_price = $product->get_sale_price();
	$has_discount = ! empty( $sale_price );
	if ( $has_discount ) {
		$regular_price = $product->get_regular_price();
		$percent = round( ( 1.0 - $sale_price / $regular_price ) * 100, 0 );
		$content = '<span class="onsale percent">-' . $percent . '%</span>';
	}
	return $content;
}
