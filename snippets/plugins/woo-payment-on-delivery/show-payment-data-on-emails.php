<?php
/** 
 * Tested with Woo Payment On Delivery version 1.1.3
 * 
 * @version 1.0.0
 */

add_filter( 'woocommerce_get_order_item_totals', 'lpb_change_order_payment_method_text', 10, 2 );
function lpb_change_order_payment_method_text ( $rows, $order ) {

	$order_id = $order->get_id();
	$payment_method = get_post_meta( $order_id, '_payment_method', true );

	if ( $payment_method === 'woo_payment_on_delivery' ) {

		$payment_type = get_post_meta( $order_id, '_woo_payment_on_delivery_type', true );
		$data = ' (';

		if ( $payment_type === 'money' ) {

			$cash = get_post_meta( $order_id, '_woo_payment_on_delivery_cash', true );

			if ( $cash == 0 ) {
				$data .= __( 'Não precisa de troco', 'lpb_woo_payment_on_delivery' );
			} else {
				$data .= __( 'troco para', 'lpb_woo_payment_on_delivery' ) . ' ' . wc_price( $cash );
			}
		} elseif ( $payment_type === 'debitcard' || $payment_type === 'creditcard' || $payment_type === 'voucher' ) {

			$flag = esc_attr( get_post_meta( $order_id, '_woo_payment_on_delivery_card_flag', true ) );
			$data .= __( 'com Cartão', 'lpb_woo_payment_on_delivery' ) . ' ';

			if ( $payment_type === 'creditcard' ) {
				$data .= __( 'de Crédito', 'lpb_woo_payment_on_delivery' );
			} elseif ( $payment_type === 'debitcard' ) {
				$data .= __( 'de Débito', 'lpb_woo_payment_on_delivery' );
			} elseif ( $payment_type === 'voucher' ) {
				$data .= __( 'Voucher', 'lpb_woo_payment_on_delivery' );
			}

			$data .= ' ' . $flag;
		} elseif ( $payment_type === 'paycheck' ) {

			$data .= __( 'com Cheque', 'lpb_woo_payment_on_delivery' );
		}

		$data .= ')';

		$rows['payment_method']['value'] .= $data;
	}

	return $rows;
}

add_action( 'woocommerce_checkout_update_order_meta', 'lpb_woo_payment_on_delivery_save_data', 11 );
function lpb_woo_payment_on_delivery_save_data ( $order_id ) {

	if ( isset( $_REQUEST['card_machine_indicated'] ) ) {
		update_post_meta( $order_id, '_woo_payment_on_delivery_type', sanitize_text_field( $_REQUEST['card_machine_indicated'] ) );
	}
	
	if (  isset( $_REQUEST['flagcard_indicated'] ) ) {
		update_post_meta( $order_id, '_woo_payment_on_delivery_card_flag', sanitize_text_field( $_REQUEST['flagcard_indicated'] ) );
	}
	
	if ( isset( $_REQUEST['woo_cash_delivery'] ) ) {
		update_post_meta( $order_id, '_woo_payment_on_delivery_cash', sanitize_text_field( $_REQUEST['woo_cash_delivery'] ) );
	}
}
