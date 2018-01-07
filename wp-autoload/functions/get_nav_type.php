<?php
/**
 * Function get_nav_type
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Retreives the type of menu set through the theme options.
 *
 * @return string The nav type.
 */
function get_nav_type() {
	static $nav_type;

	if ( empty( $nav_type ) ) {
		$nav_type = carbon_get_theme_option( 'menu_type' );
	}

	return $nav_type;
}
