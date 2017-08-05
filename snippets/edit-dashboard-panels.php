<?php
/** 
 * Edit dashboard panels
 * 
 * @version 1.0.0
 */

add_action( 'wp_dashboard_setup', 'lpb_change_woocommerce_dashboard_widget_names', 99 );
function lpb_change_woocommerce_dashboard_widget_names () {
  global $wp_meta_boxes;
  
  // remove default panels
  unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
  unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );
  unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
  unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
  
  // remove welcome panel
  remove_action('welcome_panel', 'wp_welcome_panel');
  
  // rename
  $wp_meta_boxes['dashboard']['normal']['core']['woocommerce_dashboard_status']['title'] = 'Situação da loja';
}