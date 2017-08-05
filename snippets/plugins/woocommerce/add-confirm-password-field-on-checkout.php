<?php
/** 
 * Add a "confirm password" field on checkout
 * 
 * @version 1.0.0
 */

add_filter( 'woocommerce_checkout_fields', 'lpb_wc_add_confirm_password_checkout' );
function lpb_wc_add_confirm_password_checkout ( $checkout_fields ) {
	if ( get_option( 'woocommerce_registration_generate_password' ) === 'no' ) {
		$checkout_fields['account']['account_password-2'] = array(
			'type'              => 'password',
			'label'             => __( 'Confirm password', 'woocommerce' ),
			'required'          => true,
			'placeholder'       => _x( 'Confirm Password', 'placeholder', 'woocommerce' ),
			'class'             => array()
		);
	}

	return $checkout_fields;
}

add_action( 'woocommerce_checkout_process', 'lpb_wc_check_confirm_password_matches_checkout' );
function lpb_wc_check_confirm_password_matches_checkout () {
	$checkout = WC()->checkout;
	if ( ! is_user_logged_in() && ( $checkout->must_create_account || ! empty( $_POST['createaccount'] ) ) ) {
		if ( strcmp( $_POST['account_password'], $_POST['account_password-2'] ) !== 0 ) {
			wc_add_notice( __( 'Passwords do not match.', 'woocommerce' ), 'error' );
		}
	}
}