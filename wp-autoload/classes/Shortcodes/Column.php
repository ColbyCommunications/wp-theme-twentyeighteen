<?php
/**
 * Creates a shortcode for a column.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Shortcodes;

/**
 * Shortcode [column].
 */
class Column {
	/**
	 * This shortcode's tag.
	 * 
	 * @var string
	 */
	const SHORTCODE_TAG = 'column';

	/**
	 * Registers the shortcode callback.
	 */
	public function __construct() {
		if ( ! shortcode_exists( self::SHORTCODE_TAG ) ) {
			add_shortcode( self::SHORTCODE_TAG, [ __CLASS__, 'render_column' ] );
		}
	}

	/**
	 * Builds the CSS class to go on the column element.
	 *
	 * @param array $atts The shortcode attributes.
	 * @return string The class string.
	 */
	private static function make_class_string( $atts = [] ) {
		$classes = $atts['class'] ? explode( ' ', $atts['class'] ) : [];

		foreach ( [ 'sm', 'md', 'lg', 'xl' ] as $width ) {
			if ( false === $atts[ $width ] ) {
				continue;
			}

			$classes[] = str_replace( 'sm-', '', "col-$width-$atts[$width]" );
		}

		return implode( ' ', $classes );
	}

	/**
	 * Renders the [column] shortcode.
	 *
	 * @param array  $atts Shortcode attributes.
	 * @param string $content Shortcode content.
	 * @return string The shortcode output.
	 */
	public static function render_column( $atts = [], $content = '' ) {
		global $colbycomms_component_library;

		$atts = shortcode_atts(
			[
				'sm' => '12',
				'md' => false,
				'lg' => false,
				'xl' => false,
				'class' => false,
				'style' => false,
				'background-image' => false,
			],
			$atts
		);

		ob_start();
		?>
<div class="col-12 <?php echo esc_attr( self::make_class_string( $atts ) ); ?>"
	<?php
	if ( ! empty( $atts['style'] ) ) :
		echo $atts['style'];
	endif;
	?>
	>
	<?php echo apply_filters( 'the_content', $content ); ?>
</div>
		<?php

		return ob_get_clean();
	}
}
