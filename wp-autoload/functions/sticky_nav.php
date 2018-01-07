<?php
/**
 * Function sticky_nav
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Prints the sticky nav if it is the chosen navigation type.
 */
function sticky_nav() {
	if ( 'fixed-bottom' === get_nav_type() ) {
		echo render_sticky_nav();
	}
}
