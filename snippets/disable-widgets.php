<?php
/** 
 * How to disable a widget.
 * Note: there is a plugin too https://wordpress.org/plugins/wp-widget-disable/ 
 * 
 * @version 1.0.0
 */
add_action( 'widgets_init', 'lpb_unregister_wp_widgets' );
function lpb_unregister_wp_widgets () {
	unregister_widget( 'WP_Widget_Tag_Cloud' );
}
