<?php
/**
 * Function get_post_types
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Provides settings for post types to be registered by the theme.
 *
 * @return array An array of post type settings.
 */
function get_post_types() {
	$post_types = [];

	if ( carbon_get_theme_option( 'do_service_catalog' ) === true ) {
		$post_types['catalog-item'] = [
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
		];
	}

	return $post_types;
}
