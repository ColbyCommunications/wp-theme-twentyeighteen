<?php

namespace ColbyComms\TwentyEighteen\Hooks;
use function ColbyComms\TwentyEighteen\Functions\get_image_sizes;

add_action( 'after_setup_theme', 'ColbyComms\\TwentyEighteen\\Hooks\\add_basic_opt_in_features' );
add_action( 'after_setup_theme', 'ColbyComms\\TwentyEighteen\\Hooks\\add_custom_image_sizes' );

/** Basic opt-in theme features. */
function add_basic_opt_in_features() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support( 'html5' );
}

/** Adds theme custom image sizes. */
function add_custom_image_sizes() {
	foreach ( get_image_sizes() as $image_size_args ) {
		call_user_func_array( 'add_image_size', $image_size_args );
	}
}
