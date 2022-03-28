<?php
/** 
 * Change the product price when add on cart
 *
 * Example: Apply 20% OFF in all products in cart
 *
 * @version 1.0.0
 */
add_action( 'woocommerce_before_calculate_totals', 'lpb_apply_20_off_discount', 10 );
function lpb_apply_20_off_discount ( $cart ) {
	$cart_items = $cart->get_cart();
	$discount = 20;
	foreach ( $cart_items as $item ) {
		$product = $item['data'];
		$price = $product->get_price();
		$product->set_price( $price * ( 100 - $discount ) / 100 );
	}
}
