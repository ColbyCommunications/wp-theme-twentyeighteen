<?php
/**
 * Autoload hook files and load classes.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

foreach ( glob( __DIR__ . '/hooks/*.php', GLOB_NOSORT ) as $file ) {
	include_once $file;
}

// Shortcodes.
new ColbyComms\TwentyEighteen\Shortcodes\Section();
new ColbyComms\TwentyEighteen\Shortcodes\Catalog();
new ColbyComms\TwentyEighteen\Shortcodes\Column();
new ColbyComms\TwentyEighteen\Shortcodes\NoAutoP();
new ColbyComms\TwentyEighteen\Shortcodes\ColbyDNLogos();

// Theme options page.
new ColbyComms\TwentyEighteen\ThemeOptions();
