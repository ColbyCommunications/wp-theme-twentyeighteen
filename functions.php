<?php
/**
 * Performs theme initialization.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

if ( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	wp_die( 'This theme uses Composer. Run `composer install` in the theme root to get set up.' );
}

if ( ! file_exists( __DIR__ . '/dist' ) ) {
	wp_die( 'Run `npm install` and `webpack -p` in the theme\'s root to transpile its CSS and Javascript.' );
}

if ( ! function_exists( 'pp' ) ) {
	function pp( $data, $die = 0 ) {
		echo '<pre>';
		print_r( $data );
		echo '</pre>';
		if ( $die ) {
			wp_die();
		}
	}
}

// Fix path to carbon fields assets URL failing to resolve.
// TO-DO: See config.php and core/Carbon_Fields in that library for debugging.
define( 'Carbon_Fields\\URL', get_template_directory_uri() . '/vendor/htmlburger/carbon-fields/' );

require_once __DIR__ . '/vendor/autoload.php';
