<?php

add_filter( 'woocommerce_checkout_fields' , 'prefix_edit_checkout_fields' );
function prefix_edit_checkout_fields( $fields ) {

  // remove
  unset( $fields['billing']['billing_persontype'] );

  // override
  $fields['order']['order_comments']['placeholder'] = 'My new placeholder';
  
  // add new
  $fields['shipping']['shipping_phone'] = array(
    'label' => __( 'Phone', 'woocommerce' ),
    'placeholder' => _x( 'Phone', 'placeholder', 'woocommerce' ),
    'required' => false,
    'class' => array( 'form-row-wide' ), // or 'form-row-first' or 'form-row-last'
    'clear' => true
  );
  
  // learn more: https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/

  return $fields;
}
