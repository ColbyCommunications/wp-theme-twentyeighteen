<?php
/**
 * Creates a shortcode for a section.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Shortcodes;

/**
 * Shortcode [site-search-form].
 */
class SiteSearchForm {
	/**
	 * Hooks the shortcode creator function.
	 */
	public function __construct() {
		add_action( 'init', [ __CLASS__, 'add_shortcode' ] );
	}

	/**
	 * Hooks the shortcode callback.
	 *
	 * @return void
	 */
	public static function add_shortcode() {
		if ( ! shortcode_exists( 'site-search-form' ) ) {
			add_shortcode( 'site-search-form', [ __CLASS__, 'site_search_form' ] );
		}
	}

	/**
	 * Renders the shortode.
	 *
	 * @return string HTML.
	 */
	public static function site_search_form() : string {
		$echo = false;
		return get_search_form( $echo );
	}
}