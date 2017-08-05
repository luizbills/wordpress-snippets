<?php
/** 
 * Override page template
 * 
 * @version 1.0.0
 */

add_filter( 'template_include', 'lpb_custom_page_template' );
function lpb_custom_page_template ( $template ) {
	return '/absolute/path/to/custom-template-page.php';
}
