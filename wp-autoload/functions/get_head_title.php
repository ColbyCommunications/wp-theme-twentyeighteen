<?php
/**
 * Function get_head_title
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Builds the text to go in the HTML <title> tag.
 *
 * @return string The title.
 */
function get_head_title() {
	$wp_title = wp_title( '', false );
	$wp_title = $wp_title ? "$wp_title - " : '';
	return $wp_title . get_bloginfo() . ' - Colby College';
}
