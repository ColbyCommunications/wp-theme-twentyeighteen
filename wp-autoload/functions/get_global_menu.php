<?php
/**
 * Function get_global_menu
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Render the menu titled 'Global Menu' set on the main site in the installation.
 *
 * @return string Rendered HTML.
 */
function get_global_menu() {
	if ( is_multisite() ) {
		switch_to_blog( 1 );
	}

	$items = is_nav_menu( 'Global Menu' ) ? wp_get_nav_menu_items( 'Global Menu' ) : [];

	if ( is_multisite() ) {
		restore_current_blog();
	}

	return '<ul class="columned-list text-uppercase small-2">' . implode(
		'', array_map(
			function ( $item ) {
				return "<li><a href=\"$item->url\">{$item->title}</a></li>";
			},
			$items
		)
	) . '</ul>';
}
