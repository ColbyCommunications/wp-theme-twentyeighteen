<?php
/**
 * Function main_class
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Outputs the main class handler.
 *
 * @param string $classes CSS classes to apply to the main tag.
 */
function main_class( $classes = '' ) {
	$classes = apply_filters( 'main_class', explode( ' ', $classes ) );

	echo 'class="' . esc_attr( implode( ' ', $classes ) ) . '"';
}
