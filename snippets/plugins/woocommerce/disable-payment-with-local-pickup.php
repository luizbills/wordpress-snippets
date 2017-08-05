<?php
/** 
 * Disable payment if 'local pickup' is selected.
 * 
 * @version 1.0.0
 */

add_filter( 'woocommerce_available_payment_gateways', 'lpb_remove_other_payment_options_for_local_pickup' );
function lpb_remove_other_payment_options_for_local_pickup ( $gateways ) {
	$chosen_shipping_rates = WC()->session->get( 'chosen_shipping_methods' );

	if ( ! empty( $chosen_shipping_rates ) && strpos( $chosen_shipping_rates[0], 'local_pickup' ) !== false ) {

		// remove all payment gateways
		add_filter( 'woocommerce_cart_needs_payment', '__return_false' );

		return [];
	}

	return $gateways;
}

add_action( 'woocommerce_checkout_process', 'lpb_disable_payment_for_local_pickup' );
function lpb_disable_payment_for_local_pickup () {
	$chosen_shipping_rates = WC()->session->get( 'chosen_shipping_methods' );

	if ( ! empty( $chosen_shipping_rates ) && strpos( $chosen_shipping_rates[0], 'local_pickup' ) !== false ) {
		// disable payment
		add_filter( 'woocommerce_cart_needs_payment', '__return_false' );
	}
}
