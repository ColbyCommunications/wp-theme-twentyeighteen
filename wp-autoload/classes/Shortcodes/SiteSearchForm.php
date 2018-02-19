<?php
/**
 * Creates a shortcode for a section.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Shortcodes;

/**
 * Shortcode [site-search-form].
 */
class SiteSearchForm {
	/**
	 * The shortcode tag.
	 * 
	 * @var string
	 */
	const SHORTCODE_TAG = 'site-search-form';

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
		if ( ! shortcode_exists( self::SHORTCODE_TAG ) ) {
			add_shortcode( self::SHORTCODE_TAG, [ __CLASS__, 'render_shortcode' ] );
		}
	}

	/**
	 * Renders the shortode.
	 *
	 * @return string HTML.
	 */
	public static function render_shortcode() : string {
		$echo = false;
		return get_search_form( $echo );
	}
}
