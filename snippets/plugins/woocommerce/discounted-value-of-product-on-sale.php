<?php
/** 
 * Show discounted value of product on sale
 * 
 * @version 1.0.0
 */

add_filter( 'woocommerce_get_price_html', 'lpb_wc_add_sale_discount', 99, 2 );
function lpb_wc_add_sale_discount ( $price, $product ) {

	if ( ( ! $product->is_type( 'variable' ) && is_single( $product->get_id() ) ) 
		|| ( $product->is_type( 'variation' ) && is_single( $product->get_parent_id() ) ) )
	{
		if ( $product->is_on_sale() ) {
			$message = __( 'economize %s', 'lpb-sale-discount' );
			$amount = wc_price( $product->get_regular_price() - $product->get_sale_price() );
			$price .= '&nbsp;<small class="sale-discount">' . sprintf( $message, $amount ) . '</small>';
		}
	}
	return $price;
}