<?php
/**
 * Creates a button.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Shortcodes;

/**
 * Shortcode [button].
 */
class Button {
	/**
	 * This shortcode's tag.
	 *
	 * @var string
	 */
	const SHORTCODE_TAG = 'button';

	/**
	 * Registers the shortcode callback.
	 */
	public function __construct() {
		if ( ! shortcode_exists( self::SHORTCODE_TAG ) ) {
			add_shortcode( self::SHORTCODE_TAG, [ __CLASS__, 'render_shortcode' ] );
		}
	}

	/**
	 * Renders the [button] shortcode.
	 *
	 * @param array  $atts Shortcode attributes.
	 * @param string $content Shortcode content.
	 * @return string The shortcode output.
	 */
	public static function render_shortcode( $atts = [], $content = '' ) {
		$content = $atts['text'] ?? $content;

		if ( isset( $atts['extra_text'] ) ) {
			$content = "<span class=\"btn__first-line\">
				$content
			</span>
			<span class=\"btn__last-line\">
				{$atts['extra_text']}
			</span>";
		}

		$element = isset( $atts['href'] ) ? 'a' : 'button';
		$href = isset( $atts['href'] ) ? " href=\"{$atts['href']}\"" : '';
		$class = isset( $atts['class'] ) ? " {$atts['class']}" : '';

		return "<$element class=\"btn$class\"$href>$content</$element>";
	}
}
