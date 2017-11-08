<?php
/** 
 * Change variable product price
 * 
 * @version 1.0.0
 */

// "A partir de {price}"
add_filter( 'woocommerce_format_price_range', 'lpb_custom_range_price', 10, 3 );
function lpb_custom_range_price ( $price, $from, $to ) {
	return sprintf( 'A partir de %s', is_numeric( $from) ? wc_price( $from ) : $from );
}
