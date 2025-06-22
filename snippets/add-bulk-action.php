<?php

add_filter( 'bulk_actions-edit-shop-order', 'register_actions' );
function register_actions ( $actions ) {
  $actions['YOUR_ACTION_ID'] = esc_html__( 'Your action name', 'domain' );
  return $actions;
}

add_filter( 'handle_bulk_actions-edit-post', 'handle_actions', 10, 3 );
function handle_actions ( $redirect_to, $action, $post_ids ) {
  if ( $action === 'YOUR_ACTION_ID' ) {
    // do something
  }
  return $redirect_to;
}

// read more: https://make.wordpress.org/core/2016/10/04/custom-bulk-actions/
