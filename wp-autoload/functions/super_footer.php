<?php
/**
 * Function sub_footer
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Prints the sub footer if it is set via theme options.
 */
function super_footer() {
	$super_footer = apply_filters( 'super_footer_content', carbon_get_theme_option( 'super_footer_content' ) );
	if ( ! empty( $super_footer ) ) {
		echo do_shortcode( $super_footer );
	}
}
