<?php
/** 
 * Remove items from admin bar
 * 
 * @version 1.0.0
 */

add_action( 'admin_bar_menu', 'lpb_remove_wp_logo', 999 );
function lpb_remove_wp_logo ( $wp_admin_bar ) {
	// remove WP logo
	$wp_admin_bar->remove_node('wp-logo');
	// remove "PLUS New"
	$wp_admin_bar->remove_node('new-content');
}