<?php
/**
 * Creates a shortcode for a section without autoparagraphs.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Shortcodes;

/**
 * Shorcode [noautop]
 */
class NoAutoP {
	/**
	 * Add hooks.
	 */
	public function __construct() {
		if ( ! shortcode_exists( 'noautop' ) ) {
			add_shortcode( 'noautop', [ $this, 'shortcode_callback' ] );
		}
	}

	/**
	 * Trims newline characters from the content and returns the output.
	 * 
	 * @param array $_ Unused shortode atts.
	 * @param string $content The shortcode content.
	 * @return string The modified shortcode content.
	 */
	public function shortcode_callback( $_, $content ) {
		return str_replace( ["\n", "\r"], '', $content );
	}
}
