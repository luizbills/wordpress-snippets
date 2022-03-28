<?php
/**
 * Add new attributes to woocommerce product shortcodes
 * Example: offset attribute to [featured_products]
 */

\add_filter( 'woocommerce_shortcode_products_query', function ( $query_args, $attr, $type ) {
	if ( $attr['offset'] > 0 ) {
		$query_args['offset'] = $attr['offset'];
	}
	return $query_args;
}, 20, 3 );

\add_filter( 'shortcode_atts_featured_products', function ( $out, $pairs, $atts ) {
	$out['offset'] = intval( isset( $atts['offset'] ) ? abs( $atts['offset'] ) : 0 );
	return $out;
}, 20, 3 );
