<?php
/**
 * Hooks functions to the wp_enqueue_scripts action.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Hooks;

use ColbyComms\TwentyEighteen\TEXT_DOMAIN;
use ColbyComms\TwentyEighteen\VERSION;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_open_sans' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_theme_styles' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_theme_scripts' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_print_styles' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_remove_unwanted_styles', 999 );

// phpcs:disable Squiz.Commenting.FunctionComment.Missing

function _open_sans() {
	wp_enqueue_style(
		'open-sans',
		'https://fonts.googleapis.com/css?family=Open+Sans:400,700,300'
	);
}

function _theme_styles() {
	$min = defined( 'PROD' ) && PROD ? '.min' : '';

	wp_enqueue_style(
		TEXT_DOMAIN,
		get_template_directory_uri() . '/dist/' . TEXT_DOMAIN . "$min.css",
		[],
		VERSION
	);
}

function _theme_scripts() {
	$min = defined( 'PROD' ) && PROD ? '.min' : '';

	wp_enqueue_script(
		TEXT_DOMAIN,
		get_template_directory_uri() . '/dist/' . TEXT_DOMAIN . "$min.js",
		[],
		VERSION,
		true
	);
}

function _remove_unwanted_styles() {
	wp_dequeue_style( 'tboot_shortcode_styles' );
	wp_dequeue_style( 'wooslider-flexslider' );
	wp_dequeue_style( 'wooslider-common' );
	wp_dequeue_style( 'duplicate-post' );
}

function _print_styles() {
	wp_enqueue_style(
		'twentyeighteen-print',
		get_template_directory_uri() . '/assets/print.css',
		[],
		VERSION,
		get_query_var( 'print' ) ? 'all' : 'print'
	);
}
