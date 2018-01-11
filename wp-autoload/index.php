<?php
/**
 * Autoload non-class files.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

foreach ( glob( __DIR__ . '/functions/*.php', GLOB_NOSORT ) as $file ) {
	include_once $file;
}

foreach ( glob( __DIR__ . '/hooks/*.php', GLOB_NOSORT ) as $file ) {
	include_once $file;
}

new ColbyComms\TwentyEighteen\Shortcodes\Section();
new ColbyComms\TwentyEighteen\Shortcodes\Catalog();
new ColbyComms\TwentyEighteen\Shortcodes\Column();
new ColbyComms\TwentyEighteen\Shortcodes\NoAutoP();
new ColbyComms\TwentyEighteen\Shortcodes\ColbyDNLogos();
new ColbyComms\TwentyEighteen\ThemeOptions();
