<?php
/**
 * Hooks functions to the colbycomms_twentyeighteen__after_page_header action.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Hooks;

use Carbon_Fields\Helper\Helper;
use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

add_action( 'colbycomms_twentyeighteen__after_page_header', __NAMESPACE__ . '\_maybe_do_site_menu' );

// phpcs:disable Squiz.Commenting.FunctionComment.Missing

function _maybe_do_site_menu() : string {
	$nav_type = Helper::get_theme_option( 'menu_type' );

	if ( 'across-top' !== $nav_type ) {
		return '';
	}

	return T18::render_navbar( 'shrinkable' );
}
