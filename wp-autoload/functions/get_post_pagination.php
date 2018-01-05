<?php
/**
 * get_post_pagination.php
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

function get_post_pagination() {
	$pagination = get_the_posts_pagination(
		[
			'prev_text' => 'Newer',
			'next_text' => 'Older',
		]
	);

	return "
	<div class=\"row\">
		<div class=\"col-12 px-3 mt-5\">
			$pagination
		</div>
	</div>";
}
