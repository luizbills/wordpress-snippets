<?php
/** 
 * Edit woocommerce checkout fields
 * 
 * @version 1.0.0
 */

add_filter( 'woocommerce_checkout_fields' , 'prefix_edit_checkout_fields' );
function prefix_edit_checkout_fields( $fields ) {

  // to remove
  unset( $fields['billing']['billing_persontype'] );

  // to edit/change
  $fields['order']['order_comments']['placeholder'] = 'My new placeholder';
  
  // to create
  $fields['shipping']['shipping_phone'] = array(
    'label' => __( 'Phone', 'woocommerce' ),
    'placeholder' => _x( 'Phone', 'placeholder', 'woocommerce' ),
    'type' => 'text',
    'required' => false,
    'class' => array( 'form-row-wide' ), // or 'form-row-first' or 'form-row-last'
    'clear' => true // break line after this field
  );
  
  // learn more: https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/

  return $fields;
}
