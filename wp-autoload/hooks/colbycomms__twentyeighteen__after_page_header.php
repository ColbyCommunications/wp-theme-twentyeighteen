<?php
/**
 * Hooks functions to the colbycomms_twentyeighteen__after_page_header action.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Hooks;

use Carbon_Fields\Helper\Helper;
use ColbyComms\TwentyEighteen\{ThemeOptions, TwentyEighteen as T18};

add_action( self::AFTER_PAGE_HEADER_FILTER, __NAMESPACE__ . '\_maybe_do_site_menu' );

// phpcs:disable Squiz.Commenting.FunctionComment.Missing

/**
 * Renders the across-top style nav menu if the option is set.
 */
function _maybe_do_site_menu() : string {
	$nav_type = ThemeOptions::get( ThemeOptions::MENU_TYPE_KEY );

	if ( 'across-top' !== $nav_type ) {
		return '';
	}

	return T18::render_navbar( 'shrinkable' );
}
