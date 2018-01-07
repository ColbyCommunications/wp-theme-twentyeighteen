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
function sub_footer() {
	$sub_footer = apply_filters( 'sub_footer_content', carbon_get_theme_option( 'sub_footer_content' ) );
	if ( ! empty( $sub_footer ) ) {
		echo do_shortcode( $sub_footer );
	}
}
