<?php
/**
 * Hooks functions to the init action.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Hooks;

use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

add_action( 'init', __NAMESPACE__ . '\_register_post_types' );
add_action( 'init', __NAMESPACE__ . '\_set_whether_to_do_event_listings', 5 );

// phpcs:disable Squiz.Commenting.FunctionComment.Missing

function _register_post_types() {
	foreach ( T18::get_post_types() as $post_type_name => $post_type_args ) {
		register_post_type( $post_type_name, $post_type_args );
	}
}

function _set_whether_to_do_event_listings() {
	add_filter(
		'colby_wp_schedule_run', function() {
			return carbon_get_theme_option( 'do_event_listings' );
		}
	);
}
