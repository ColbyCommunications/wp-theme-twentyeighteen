<?php
/**
 * Autoload hook files and load classes.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

foreach ( glob( __DIR__ . '/hooks/*.php', GLOB_NOSORT ) as $file ) {
	include_once $file;
}

// Shortcodes.
new ColbyComms\TwentyEighteen\Shortcodes\Button();
new ColbyComms\TwentyEighteen\Shortcodes\Section();
new ColbyComms\TwentyEighteen\Shortcodes\Catalog();
new ColbyComms\TwentyEighteen\Shortcodes\Column();
new ColbyComms\TwentyEighteen\Shortcodes\NoAutoP();
new ColbyComms\TwentyEighteen\Shortcodes\ColbyDNLogos();
new ColbyComms\TwentyEighteen\Shortcodes\SiteSearchForm();
new ColbyComms\TwentyEighteen\Shortcodes\Theme();

// Theme options page.
new ColbyComms\TwentyEighteen\ThemeOptions();

// Editor.
new ColbyComms\TwentyEighteen\Editor();


return;
add_filter( ColbyComms\Schedules\Schedules::ENQUEUE_SCRIPT_FILTER, '__return_false' );
