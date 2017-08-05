<?php
/** 
 * Show a different nav menu on specific page
 * 
 * @version 1.0.0
 */

add_filter( 'wp_nav_menu_args', 'lpb_change_primary_menu' );
function lpb_change_primary_menu ( $args ) {
	if ( get_the_ID() == 15 && $args['theme_location'] === 'primary' ) {
		$args['menu'] = 'Menu 2'; // name of menu
	}
	return $args;
}
