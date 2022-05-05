<?php

add_action( 'restrict_manage_posts', '_custom_add_admin_filter' );
public function _custom_add_admin_filter () {
	global $post_type;
	$current_post_type = 'YOUR POST TYPE SLUG';

	if ( $post_type === $current_post_type ) {
		$taxonomy = 'YOUR TAXONOMY SLUG';
		$filter_args = array(
			'show_option_all'   => 'Select an option',
			'orderby'           => 'NAME',
			'order'             => 'ASC',
			'name'              => $taxonomy,
			'taxonomy'          => $taxonomy,
			'value_field'       => 'slug',
			'hide_empty'        => false,
		);

		if ( isset( $_GET[ $taxonomy ] ) {
			$filter_args['selected'] = \esc_attr( $_GET[ $taxonomy ] );
		}

		\wp_dropdown_categories( $filter_args );
	}
}
