<?php
/**
 * Performs theme initialization.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen;

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

define( 'VERSION', '1.0.7' );
define( 'TEXT_DOMAIN', 'colby-wp-theme-twentyeighteen' );

// Fix path to carbon fields assets URL failing to resolve.
// TO-DO: See config.php and core/Carbon_Fields.php in that library for debugging.
define( 'Carbon_Fields\\URL', get_template_directory_uri() . '/vendor/htmlburger/carbon-fields/' );

if ( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	wp_die( 'This theme uses Composer. Run `composer install` in the theme root to get set up.' );
}

if ( ! file_exists( __DIR__ . '/dist' ) ) {
	wp_die( 'Run `npm install` and `webpack -p` in the theme\'s root to transpile its CSS and Javascript.' );
}

if ( ! function_exists( 'pp' ) ) {
	/**
	 * Pretty print data.
	 *
	 * @param mixed $data Any data.
	 * @param mixed $die Truthy to die after printing.
	 * @return void
	 */
	function pp( $data, $die = 0 ) {
		echo '<pre>';
		print_r( $data ); // @codingStandardsIgnoreLine
		echo '</pre>';
		if ( $die ) {
			wp_die();
		}
	}
}

require_once __DIR__ . '/vendor/autoload.php';
