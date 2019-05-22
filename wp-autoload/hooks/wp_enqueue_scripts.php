<?php
/**
 * Hooks functions to the wp_enqueue_scripts action.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Hooks;

use ColbyComms\TwentyEighteen\TwentyEighteen;

add_action( 'init', __NAMESPACE__ . '\_register_assets' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_open_sans' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_theme_styles' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_theme_scripts' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_print_styles' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\_remove_unwanted_styles', 999 );

// phpcs:disable Squiz.Commenting.FunctionComment.Missing

function _register_assets() {
	$min = TwentyEighteen::PROD ? '.min' : '';
	wp_register_style(
		TwentyEighteen::TEXT_DOMAIN,
		get_template_directory_uri() . '/dist/' . TwentyEighteen::TEXT_DOMAIN . "$min.css",
		[],
		TwentyEighteen::VERSION
	);

	wp_register_style(
		TwentyEighteen::TEXT_DOMAIN . '-blocks',
		get_template_directory_uri() . '/dist/' . TwentyEighteen::TEXT_DOMAIN . "-blocks$min.css",
		[],
		TwentyEighteen::VERSION
	);

	wp_register_script(
		TwentyEighteen::TEXT_DOMAIN,
		get_template_directory_uri() . '/dist/' . TwentyEighteen::TEXT_DOMAIN . "$min.js",
		[],
		TwentyEighteen::VERSION,
		true
	);
}

function _open_sans() {
	wp_enqueue_style(
		'open-sans',
		'https://fonts.googleapis.com/css?family=Open+Sans:400,700,300'
	);
}

function _theme_styles() {
	wp_enqueue_style( TwentyEighteen::TEXT_DOMAIN );
	wp_enqueue_style( TwentyEighteen::TEXT_DOMAIN . '-blocks' );
}

function _theme_scripts() {
	wp_enqueue_script( TwentyEighteen::TEXT_DOMAIN );
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
		TwentyEighteen::VERSION,
		get_query_var( 'print' ) ? 'all' : 'print'
	);
}
