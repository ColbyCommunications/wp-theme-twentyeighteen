<?php
/**
 * Function get_main_sidebar
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Gets the HTML for the sidebar called "Main Sidebar".
 *
 * @return string Rendered HTML.
 */
function get_main_sidebar() {
	ob_start();
	if ( is_active_sidebar( 'main-sidebar' ) ) {
		echo '<ul class="list-unstyled">';
		dynamic_sidebar( 'main-sidebar' );
		echo '</ul>';
	}

	return ob_get_clean();
}
