<?php
/**
 * Hooks functions to the wp_enqueue_scripts action.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Hooks;

use ColbyComms\TwentyEighteen\TEXT_DOMAIN;
use ColbyComms\TwentyEighteen\VERSION;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_open_sans' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_theme_styles' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_theme_scripts' );

// phpcs:disable Squiz.Commenting.FunctionComment.Missing

function _open_sans() {
	wp_enqueue_style(
		'open-sans',
		'https://fonts.googleapis.com/css?family=Open+Sans:400,700,300'
	);
}

function _theme_styles() {
	wp_enqueue_style(
		TEXT_DOMAIN,
		get_template_directory_uri() . '/dist/wp-theme-twentyeighteen.css',
		[],
		VERSION
	);
}

function _theme_scripts() {
	wp_enqueue_script(
		TEXT_DOMAIN,
		get_template_directory_uri() . '/dist/index.js',
		[],
		VERSION,
		true
	);
}
