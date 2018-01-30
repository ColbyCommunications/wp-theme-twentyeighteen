<?php
/**
 * Hooks functions to the the_content filter.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Hooks;

add_filter( 'the_content', __NAMESPACE__ . '\_modify_directory_shortcode_html' );
add_filter( 'the_content', __NAMESPACE__ . '\_remove_empty_paragraph_tags' );

/**
 * Modify the legacy classes on the directory page. Probably not very good.
 *
 * @param string $content Post content possibly containing the shortcode.
 * @return string The update HTML.
 */
function _modify_directory_shortcode_html( $content ) {
	global $post;

	if ( empty( $post ) ) {
		return $content;
	}

	if ( 'Staff' !== $post->post_title ) {
		return $content;
	}

	$content = do_shortcode( $content );
	$content = str_replace( 'headerline', 'primary row', $content );
	$content = str_replace( 'li class="clearfix', 'li class="clearfix row directory-row', $content );

	for ( $i = 1; $i <= 12; $i++ ) {
		$content = str_replace( "span$i", "col-12 col-md-$i", $content );
	}

	return $content;
}

// phpcs:disable Squiz.Commenting.FunctionComment.Missing

function _remove_empty_paragraph_tags( $content ) {
	return str_replace( '<p></p>', '', $content );
}
