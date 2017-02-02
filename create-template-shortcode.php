<?php
/**
 * Function to create shortcodes that renders a template part (using Twig with Timber).
 * Note: install and active the plugin Timber (https://wordpress.org/plugins/timber-library).
 *
 * @version 1.0.1
*/
function create_template_shortcode( $name, $template_path, $defaults = '' ) {
	add_shortcode( $name, function ( $args, $content, $shortcode_name ) use ( $name, $template_path, $defaults ){
		$data = Timber::get_context();
		
	if ( is_string( $defaults ) ) {
			$args = wp_parse_args( $args, wp_parse_args( $defaults ) );
		} elseif ( is_array( $defaults ) ) {
			$args = wp_parse_args( $args, $defaults );
		}
	
		$data = array_merge($data, $args);
	
		$data['content'] = $content;
		$data['_shortcode_name'] = $shortcode_name;
		
		$data = apply_filters( 'template_shortcode_' . $name, $data );
	
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
