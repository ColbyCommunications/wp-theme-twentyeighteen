<?php
/**
 * Hooks functions to the wp_enqueue_scripts action.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Hooks;

add_action( 'after_setup_theme', __NAMESPACE__ . '\_register_main_sidebar' );

// phpcs:disable Squiz.Commenting.FunctionComment.Missing

function _register_main_sidebar() {
	register_sidebar(
		[
			'name' => __( 'Main sidebar', 'colby-wp-theme-twentyeighteen' ),
			'id' => 'main-sidebar',
		]
	);
}
