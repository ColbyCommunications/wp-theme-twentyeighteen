<?php
/**
 * Function get_site_menu_items
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Retrieves an array of menu items in 'Site Menu'.
 *
 * @return array The items.
 */
function get_site_menu_items() {
	return wp_get_nav_menu_items( 'Site Menu' ) ?: [];
}
