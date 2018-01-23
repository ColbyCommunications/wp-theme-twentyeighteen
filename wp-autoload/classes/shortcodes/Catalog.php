<?php
/**
 * Creates a shortcode for a catalog-like listing of items with descriptions.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Shortcodes;

/**
 * Shortcode [catalog].
 */
class Catalog {
	/**
	 * Registers the shortcode callback.
	 */
	public function __construct() {
		if ( ! shortcode_exists( 'catalog' ) ) {
			add_shortcode( 'catalog', [ __CLASS__, 'render_catalog' ] );
		}
	}

	/**
	 * Gets a query for posts with the catalog-item post_type.
	 *
	 * @return WP_Query
	 */
	private static function get_catalog_query( $atts ) {
		$args = [
			'post_type' => 'catalog-item',
			'posts_per_page' => 99,
			'orderby' => 'name',
			'order' => 'ASC',
		];

		if ( ! empty( $atts['categories'] ) ) {
			$args['tax_query'] = [
				[
					'taxonomy' => 'service-category',
					'field' => 'name',
					'terms' => array_map( 'trim', explode( ',', $atts['categories'] ) ) 
				]
			];
		}

		return new \WP_Query( $args );
	}

	/**
	 * Renders a list of catalog items.
	 *
	 * @param \WP_Query $catalogs_query The wp_query to work with.
	 * @return string The rendered list.
	 */
	private static function get_items_html( \WP_Query $catalogs_query ) {
		ob_start();
		while ( $catalogs_query->have_posts() ) {
			$catalogs_query->the_post();
			?>
<button class="list-group-item list-group-item-action"
		data-catalog-button
		data-catalog-content="
		<?php
		echo esc_attr(
			'<h3>' . get_the_title() . '</h3>'
			. apply_filters( 'the_content', get_the_content() )
		);
		?>
		">
	<?php the_title(); ?>
</button>
			<?php
		}

		wp_reset_postdata();

		return ob_get_clean();
	}

	/**
	 * The [catalog] shortcode callback.
	 *
	 * @param array  $atts Shortcode attributes.
	 * @param string $content Shortcode content.
	 * @return string The shortcode output.
	 */
	public static function render_catalog( $atts = [], $content = '' ) {
		$atts = shortcode_atts(
			[
				'categories' => false,
			],
			$atts
		);

		$catalogs_query = self::get_catalog_query( $atts );

		if ( ! $catalogs_query->have_posts() ) {
			return '';
		}

		$items = self::get_items_html( $catalogs_query );

		ob_start();

		?>
<section class="section container">
	<div data-catalog class="row">
		<div class="col-12 col-md-4">
			<div class="list-group gray">
				<?php echo $items; ?>
			</div>
		</div>
		<div data-catalog-container class="col-12 col-md-8">
			<?php echo apply_filters( 'the_content', $content ); ?>
		</div>
	</div>
</section>
		<?php

		return ob_get_clean();
	}
}
