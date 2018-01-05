<?php

namespace ColbyComms\TwentyEighteen\Hooks;

add_action( 'after_setup_theme', 'ColbyComms\\TwentyEighteen\\Hooks\\register_main_sidebar' );

function register_main_sidebar() {
	register_sidebar(
		[
			'name' => __( 'Main sidebar', 'colby-reunion' ),
			'id' => 'main-sidebar',
		]
	);
}
