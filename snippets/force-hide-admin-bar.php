<?php
/** 
 * Hide frontend admin bar
 * 
 * @version 1.0.0
 */

// anywhere
add_filter( 'show_admin_bar', '__return_false' );

// on specific page
add_filter( 'show_admin_bar', 'lpb_hide_admin_bar' );
function lpb_hide_admin_bar ( $content ) {
	if ( get_the_ID() == 51 ) {
		return false;
	}
	return $content;
}

// show for admin users only
add_filter( 'show_admin_bar', 'lpb_hide_admin_bar_for_some_users' );
function lpb_hide_admin_bar_for_some_users ( $content ) {
	if ( ! current_user_can('administrator') ) {
		return false;
	}
	return $content;
}