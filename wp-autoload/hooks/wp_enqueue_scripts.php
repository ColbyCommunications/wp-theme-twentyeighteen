<?php

add_action(
	'wp_enqueue_scripts', function() {
		wp_enqueue_style(
			'open-sans',
			'https://fonts.googleapis.com/css?family=Open+Sans:400,700,300'
		);
		wp_enqueue_style(
			'wp-theme-twentyeighteen',
			get_template_directory_uri() . '/dist/wp-theme-twentyeighteen.css',
			[],
			'1.0.1'
		);

		wp_enqueue_script(
			'wp-theme-twentyeighteen',
			get_template_directory_uri() . '/dist/index.js',
			[],
			'1.0.1',
			true
		);
	}
);
