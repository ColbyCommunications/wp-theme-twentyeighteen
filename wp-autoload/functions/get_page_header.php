<?php
/**
 * Function get_page_header
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Adds defaults to passed-in array.
 *
 * @param array $options The passed in array.
 * @return array The complete set of options.
 */
function _do_option_defaults( $options = [] ) {
	return array_merge(
		[
			'do_background_image' => true,
			'title_size' => 'large 1 large-md-6',
			'width' => '',
			'header_content' => get_post_meta( get_the_id(), 'header_content', true ),
		],
		$options
	);
}

/**
 * Builds inline CSS for the featured image.
 *
 * @param array $options The passed-in options for the page header.
 * @return string The style attribute or an empty string.
 */
function _get_featured_image_style( $options ) {
	$featured_image_style = '';

	if ( $options['do_background_image'] && has_post_thumbnail() ) {
		$url = get_the_post_thumbnail_url( get_the_id(), 'large' );
		$featured_image_style = " style=\"background-image: url($url)\"";
	}

	return $featured_image_style;
}

/**
 * Echoes extra classes to the buffer.
 *
 * @param bool $featured_image_exists Whether there's a featured image.
 */
function _extra_classes( $featured_image_exists ) {
	$padding_classes = $featured_image_exists
		? 'pb-8 pt-9'
		: 'pb-3 pt-7';

	echo $padding_classes;
	echo $featured_image_exists
		? ' has-featured-image'
		: '';
}

/**
 * Builds a header for the current page.
 *
 * @param array $options Passed-in options.
 * @return string HTML.
 */
function get_page_header( $options = [] ) {
	$options = _do_option_defaults( $options );
	$featured_image_style = _get_featured_image_style( $options );

	ob_start();

	?>
	<header
		class="container-fluid largest primary <?php _extra_classes( ! ! $featured_image_style ); ?>"
		<?php echo $featured_image_style; ?>>
		<?php if ( empty( $options['header_content'] ) ) : ?>
			<?php default_page_header_content( $options ); ?>
		<?php else : ?>
			<?php echo $options['header_content']; ?>
		<?php endif; ?>
	</header>
	<?php

	return ob_get_clean();
}
