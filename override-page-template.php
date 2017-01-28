<?php

add_filter( 'template_include', 'prefix_custom_template' );
function prefix_custom_template( $template ) {
	return '/absolute/path/to/custom-template-page.php';
}
