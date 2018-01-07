<?php
/**
 * Creates a shortcode for a section.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Shortcodes;

/**
 * Shortcode [section].
 */
class Section {
	/**
	 * Registers the shortcode callback.
	 */
	public function __construct() {
		if ( ! shortcode_exists( 'section' ) ) {
			add_shortcode( 'section', [ __CLASS__, 'render_section' ] );
		}
	}

	/**
	 * The [section] shortcode callback.
	 *
	 * @param array  $atts Shortcode attributes.
	 * @param string $content Shortcode content.
	 * @return string The shortcode output.
	 */
	public static function render_section( $atts, $content = '' ) {
		$atts = shortcode_atts(
			[
				'title' => '',
				'class' => '',
				'style' => '',
			],
			$atts
		);

		ob_start();
		?>
<section class="section container-fluid px-0 bg-infinite <?php echo trim( 'section ' . $atts['class'] ); ?>"
	<?php
	if ( ! empty( $atts['style'] ) ) :
		echo 'style="' . esc_attr( $atts['style'] ) . '"';
	endif;
	?>
	>
	<div class="container">
		<?php if ( ! empty( $atts['title'] ) ) : ?>
		<header>
			<h1 class="section-title">
				<?php echo $atts['title']; ?>
			</h1>
		</header>
		<?php endif; ?>
		<div class="row">
			<?php echo apply_filters( 'the_content', $content ); ?>
		</div>
	</div>
</section>
		<?php

		return ob_get_clean();
	}
}
