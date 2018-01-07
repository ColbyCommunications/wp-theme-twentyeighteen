<?php
/**
 * Hooks functions to the after_setup_theme action.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Hooks;

use function ColbyComms\TwentyEighteen\Functions\get_image_sizes;

add_action( 'after_setup_theme', __NAMESPACE__ . '\_add_basic_opt_in_features' );
add_action( 'after_setup_theme', __NAMESPACE__ . '\_add_custom_image_sizes' );

// phpcs:disable Squiz.Commenting.FunctionComment.Missing

/** Basic opt-in theme features. */
function _add_basic_opt_in_features() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support( 'html5' );
}

/** Adds theme custom image sizes. */
function _add_custom_image_sizes() {
	foreach ( get_image_sizes() as $image_size_args ) {
		call_user_func_array( 'add_image_size', $image_size_args );
	}
}
