<?php
/**
 * Function get_image_sizes
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Get the image sizes set for this theme.
 *
 * @return array Associative array -- keys are names and values are options to pass to
 *                           the add image size option.
 */
function get_image_sizes() {
	return [
		'Big Thumbnail' => [
			'big-thumbnail',
			400,
			400,
			true,
		],
	];
}
