<?php
/**
 * Creates a shortcode for a themed area.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Shortcodes;

/**
 * Shortcode [theme].
 */
class Theme {
	/**
	 * This shortcode's tag.
	 * 
	 * @var string
	 */
	const SHORTCODE_TAG = 'theme';

	/**
	 * Registers the shortcode callback.
	 */
	public function __construct() {
		if ( ! shortcode_exists( self::SHORTCODE_TAG ) ) {
			add_shortcode( self::SHORTCODE_TAG, [ __CLASS__, 'render_shortcode' ] );
		}
	}

	/**
	 * Renders the shortcode.
	 *
	 * @param array  $atts Shortcode attributes.
	 * @param string $content Shortcode content.
	 * @return string The shortcode output.
	 */
	public static function render_shortcode( $atts = [], $content = '' ) {
		if ( ! isset( $atts['name'] ) ) {
			return $content;
		}

		$class = isset( $atts['class'] ) ? " {$atts['class']}" : '';

		return "<div class=\"{$atts['name']}$class\">$content</div>";
	}
}
