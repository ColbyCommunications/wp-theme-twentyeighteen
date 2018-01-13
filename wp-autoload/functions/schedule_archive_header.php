<?php
/**
 * See the schedule_archive taxonomy template.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Outputs the main header for a schedule_category taxonomy archive page.
 *
 * @param \WP_Term $queried_object The term for the current page.
 * @return void
 */
function schedule_archive_header( \WP_Term $queried_object ) {
	ob_start();
	echo '<div>Schedule</div><h1>';
	echo $queried_object->name;
	echo '</h1>';

	echo get_archive_header(
		[
			'content' => ob_get_clean(),
		]
	);
}
