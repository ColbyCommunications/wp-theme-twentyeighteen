<?php

add_filter(
	'the_content', function( $content ) {
		return str_replace( '<p></p>', '', $content );
	}
);

/**
 * Modify the legacy classes on the directory page. Probably not very good.
 */
add_filter( 'the_content', function( $content ) {
	global $post;

	if ( 'Staff' !== $post->post_title ) {
		return $content;
	}

	$content = str_replace( 'headerline', 'primary row', $content );
	$content = str_replace( 'li class="clearfix', 'li class="clearfix row directory-row', $content );

	for ( $i = 1; $i <= 12; $i += 1 ) {
		$content = str_replace( "span$i", "col-12 col-md-$i", $content );
	}

	return $content;
} );
