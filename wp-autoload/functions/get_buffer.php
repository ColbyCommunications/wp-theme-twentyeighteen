<?php
/**
 * Function get_buffer
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Get the result of a function meant to echo directly to the output buffer.
 *
 * @param function $cb A callback.
 * @return string The output of the callback.
 */
function get_buffer( $cb ) {
	ob_start();
	$cb();
	return ob_get_clean();
}
