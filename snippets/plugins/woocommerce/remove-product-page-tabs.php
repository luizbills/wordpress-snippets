<?php
/** 
* Remove product page tabs
* 
* @version 1.0.0
*/

add_filter( 'woocommerce_product_tabs', 'lpb_wc_remove_reviews_tab', 99 );
function lpb_wc_remove_reviews_tab ( $tabs ) {
	// Reviews
	unset( $tabs['reviews'] );

	// Additional information
	unset( $tabs['additional_information'] );

	return $tabs;
}