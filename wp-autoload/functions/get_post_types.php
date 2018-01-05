<?php

namespace ColbyComms\TwentyEighteen\Functions;

function get_post_types() {
	return [
		'catalog-item' => [
			'label' => 'Catalog',
			'labels' => [
				'name' => 'Catalog',
				'singular_name' => 'Catalog Item',
			],
			'public' => true,
			'supports' => [
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'custom-fields',
			],
			'show_in_rest' => true,
		],
	];
}
