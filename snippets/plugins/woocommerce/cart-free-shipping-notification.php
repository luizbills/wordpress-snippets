<?php
/** 
 * Show a "free shipping notification" (or something else) on cart
 * 
 * @version 1.0.0
 */

add_action( 'woocommerce_check_cart_items', 'lpb_cart_notice' );
function lpb_cart_notice() {
	if ( ! is_cart() ) return; 

	// free shipping required amount
	$free_shipping_amount = 100;

	// message
	$message = __( 'Compre mais %s para ter frete grátis!', 'woocommerce' );

	$cart_amount = WC()->cart->cart_contents_total;
	$diff = $free_shipping_amount - $cart_amount;
	if ( $diff > 0 ) {
		wc_print_notice( sprintf( $message, wc_price( $diff ) ), 'notice' );
	}
}
