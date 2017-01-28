<?php

// all pages
add_filter( 'show_admin_bar', '__return_false' );

// on specific page
add_filter( 'show_admin_bar', 'prefix_hide_admin_bar' );
function prefix_hide_admin_bar ( $content ) {
	if ( get_the_ID() == 51 ) {
		return false;
	}
	return $content;
}
