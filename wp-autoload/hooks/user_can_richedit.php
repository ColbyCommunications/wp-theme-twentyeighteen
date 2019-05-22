<?php
/**
 * Hooks functions to the user_can_richedit filter.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Hooks;

add_filter( 'user_can_richedit', __NAMESPACE__ . '\_turn_off_visual_editor_for_html_only_pages', 999 );

// phpcs:disable Squiz.Commenting.FunctionComment.Missing
function _turn_off_visual_editor_for_html_only_pages( $bool ) {
	$screen = get_current_screen();
	if ( is_object( $screen ) && isset( $screen->post_type ) && 'page' === $screen->post_type ) {
		if ( strpos( get_page_template(), 'html-only' ) !== false ) {
			return false;
		}
	}
	return $bool;
}
