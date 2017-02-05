<?php
/**
 * Function to create shortcodes that renders a template part (using Twig with Timber).
 * Note: install and active the plugin Timber (https://wordpress.org/plugins/timber-library).
 *
 * @version 2.1.0
*/
function create_template_shortcode( $name, $template_path, $defaults = array() ) {
	add_shortcode( $name, function ( $args, $content, $shortcode_name ) use ( $template_path, $defaults ) {
		$args = shortcode_atts( $defaults, $args, $shortcode_name ); 
		$data = array_merge( Timber::get_context(), $args);

		$context['content'] = $content;
		
		$context = apply_filters( 'template_shortcode_timber_context', $context, $shortcode_name );
		$cache = apply_filters( 'template_shortcode_timber_cache_options', array(
			'expires' => false,
			'mode' => TimberLoader::CACHE_USE_DEFAULT
		), $shortcode_name );
		
		$context['_shortcode_name'] = $shortcode_name;
		
		return Timber::compile( $template_path, $context, 600, $cache['expires'], $cache['mode'],  );
	} );
}

/*
# Usage

// create the shortcode
create_template_shortcode( 'button', 'partials/button.twig', array(
	'link' => '',
) );

// use in your content
[button link="https://google.com"]Google[/button]

// or in your code
do_shortcode( '[button]Click me[/button]' );
*/
