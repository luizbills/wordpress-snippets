<?php

add_filter( 'wp_nav_menu_args', 'prefix_change_primary_menu' );
function prefix_change_primary_menu ( $args ) {
	if ( get_the_ID() == 15 && $args['theme_location'] === 'primary' ) {
		$args['menu'] = 'Menu 2';
	}
	return $args;
}
