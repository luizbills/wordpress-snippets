<?php
/** 
 * Change variable product price
 * 
 * @version 1.0.0
 */

add_filter( 'woocommerce_get_price_html', 'lpb_wc_variable_price_html', 10, 2 );
function lpb_wc_variable_price_html ( $price, $product ) {
	if ( ! $product->is_type( 'variable' ) || empty( $product->get_price() ) ) return $price;

	// The Prefix
	$prefix = __( 'A partir de', 'woocommerce' );

	$result = '';
	$prices = $product->get_variation_prices( true );

	if ( ! empty( $prices['price'] ) ) {
		$min_price = current( $prices['price'] );
		$max_price = end( $prices['price'] );

		if ( empty( $min_price ) || $min_price !== $max_price ) {
			$result .= '<span class="from">' . $prefix . ' </span>';
		}

		$result .= woocommerce_price( $min_price );
	}

	return $result;
}