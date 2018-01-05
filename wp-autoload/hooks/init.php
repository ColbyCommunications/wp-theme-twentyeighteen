<?php

namespace ColbyComms\TwentyEighteen\Hooks;

use function ColbyComms\TwentyEighteen\Functions\get_post_types;

add_action( 'init', 'ColbyComms\\TwentyEighteen\\Hooks\\register_post_types' );

function register_post_types() {
	foreach ( get_post_types() as $post_type_name => $post_type_args ) {
		register_post_type( $post_type_name, $post_type_args );
	}
}
