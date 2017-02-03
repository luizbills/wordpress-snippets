<?php
/**
 * Function to create shortcodes that renders a template part (using Twig with Timber).
 * Note: install and active the plugin Timber (https://wordpress.org/plugins/timber-library).
 *
 * @version 1.1.0
*/
function create_template_shortcode( $name, $template_path, $defaults = array() ) {
	add_shortcode( $name, function ( $args, $content, $shortcode_name ) use ( $name, $template_path, $defaults ) {
		$args = shortcode_atts( $defaults, $args, $shortcode_name ); 
		$data = array_merge( Timber::get_context() , $args);

		$data['content'] = $content;
		$data['_shortcode_name'] = $shortcode_name;
		$data = apply_filters( 'template_shortcode_' . $shortcode_name, $data );

		return Timber::compile( $template_path, $data, 600 );
	} );
}

/* # Usage
// create the shortcode
create_template_shortcode( 'button', 'partials/button.twig', array(
	'link' => '',
	'type' => 'primary',
	'class' => '',
  'id' => ''
) );
// use in your content
[button link="https://google.com"]Google[/button]
// or in your code
do_shortcode( '[button]Click me[/button]' );
*/
