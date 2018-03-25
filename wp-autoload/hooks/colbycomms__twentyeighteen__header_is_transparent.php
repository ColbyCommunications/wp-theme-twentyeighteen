<?php
// @codingStandardsIgnoreFile
use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

add_filter( T18::IS_HEADER_TRANSPARENT, function( $bool ) {
		global $post;

		if ( ! is_page() ) {
			return $bool;
		}

		if ( empty( $post ) ) {
			return $bool;
		}

	}
);
