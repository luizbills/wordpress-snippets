<?php
/** 
 * Enable or disable woocommerce v3 features
 * 
 * @version 1.0.0
 */

add_action( 'after_setup_theme', 'lpb_woocommerce_features_support' );
function lpb_woocommerce_features_support ()  {
	// Enable
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Disable
	remove_theme_support( 'wc-product-gallery-zoom' );
	remove_theme_support( 'wc-product-gallery-lightbox' );
	remove_theme_support( 'wc-product-gallery-slider' );
}
