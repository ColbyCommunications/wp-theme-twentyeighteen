<?php
/**
 * PageHeader.php
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen;

/**
 * Handles different types of page headers.
 */
class PageHeader {
	/**
	 * Echoes a page header.
	 *
	 * @param array $options Settings for the render function.
	 * @return void
	 */
	public static function show( array $options = [] ) : void {
		echo self::get( $options );
	}

	/**
	 * Retrieves the HTMl for a page header.
	 *
	 * @param array $options Settings for the render function.
	 * @return string The HTML to render.
	 */
	public static function get( array $options = [] ) : string {
		$options = array_merge(
			[
				'type' => 'page',
			],
			$options
		);

		switch ( $options['type'] ) {
			case 'archive':
				return self::get_archive_header( $options );
			case 'page':
				return self::get_page_header( $options );
			default:
				return '';
		}
	}

	/**
	 * Get HTML for the top of an archive page.
	 *
	 * @param array $options Display options.
	 * @return string Rendered HTML.
	 */
	public static function get_archive_header( array $options = [] ) : string {
		ob_start();
		?>

		<header class="page-header1 container-fluid largest primary">
			<div class="container text-center">
				<div>
					<?php if ( isset( $options['content'] ) ) : ?>
						<?php echo $options['content']; ?>
					<?php else : ?>
						<h1><?php the_archive_title(); ?></h1>
					<?php endif; ?>
				</div>
			</div>
		</header>

		<?php
		return ob_get_clean();
	}

	/**
	 * Adds defaults to passed-in array.
	 *
	 * @param array $options The passed in array.
	 * @return array The complete set of options.
	 */
	public static function do_page_header_option_defaults( $options = [] ) {
		return array_merge(
			[
				'do_background_image' => true,
				'title_size' => 'large-1 large-md-3',
				'width' => '',
				'header_content' => do_shortcode( get_post_meta( get_the_id(), 'header_content', true ) ),
			],
			$options
		);
	}

	/**
	 * Builds a header for the current page.
	 *
	 * @param array $options Passed-in options.
	 * @return string HTML.
	 */
	public static function get_page_header( $options = [] ) {
		$options = self::do_page_header_option_defaults( $options );
		$featured_image_style = self::get_featured_image_style( $options );

		ob_start();

		?>
		<header
			class="page-header1 container-fluid largest primary <?php self::extra_classes( ! ! $featured_image_style ); ?>"
			<?php echo $featured_image_style; ?>>
			<?php if ( empty( $options['header_content'] ) ) : ?>
				<?php self::default_page_header_content( $options ); ?>
			<?php else : ?>
				<?php echo $options['header_content']; ?>
			<?php endif; ?>
		</header>
		<?php

		return ob_get_clean();
	}

	/**
	 * Builds inline CSS for the featured image.
	 *
	 * @param array $options The passed-in options for the page header.
	 * @return string The style attribute or an empty string.
	 */
	public static function get_featured_image_style( $options ) {
		$featured_image_style = '';

		if ( $options['do_background_image'] && has_post_thumbnail() ) {
			$url = get_the_post_thumbnail_url( get_the_id(), has_image_size( 'hero' ) ? 'hero' : 'large' );
			$featured_image_style = " style=\"background-image: url($url)\"";
		}

		return $featured_image_style;
	}

	/**
	 * Echoes extra classes to the buffer.
	 *
	 * @param bool $featured_image_exists Whether there's a featured image.
	 */
	public static function extra_classes( $featured_image_exists ) {
		echo $featured_image_exists
			? ' has-featured-image'
			: '';
	}

	/**
	 * Get classes set in the post meta.
	 *
	 * @return string|null The classes or nothing.
	 */
	public static function get_header_classes() {
		return get_post_meta( get_the_id(), 'header_class', true );
	}

	/**
	 * Provides fallback content for a header where nothing is provided.
	 *
	 * @param array $options Options passed in to the page header function.
	 */
	public static function default_page_header_content( $options = [] ) {
		$subtitle = is_singular()
			? get_post_meta( get_the_id(), 'subtitle', true )
			: '';

		$header_classes = self::get_header_classes();
		?>
		<div class="<?php echo $header_classes ? "$header_classes " : ''; ?> container<?php echo empty( $options['width'] ) ? '' : "-{$options['width']}"; ?>">
			<?php echo self::get_parent_page_link(); ?>
			<div class="<?php echo esc_attr( $options['title_size'] ); ?>">
				<h1 class="text-uppercase"><?php the_title(); ?></h1>
			</div>
			<?php if ( $subtitle ) : ?>
			<div class="large-2">
				<h2><?php echo $subtitle; ?></h2>
			</div>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * Builds a div with a link to the current page's parent.
	 *
	 * @return string HTML.
	 */
	public static function get_parent_page_link() {
		$parent = wp_get_post_parent_id( get_the_id() );

		if ( ! $parent ) {
			return '';
		}

		ob_start();
		?>
	<div class="parent-page-link">
		<a href="<?php echo get_the_permalink( $parent ); ?>">
			<?php echo get_the_title( $parent ); ?>
		</a>
	</div>

		<?php
		return ob_get_clean();
	}
}
