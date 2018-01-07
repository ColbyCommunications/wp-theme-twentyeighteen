<?php
/**
 * Function get_page_header
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Get HTML for the top of an archive page.
 *
 * @return string Rendered HTML.
 */
function get_archive_header() {
	ob_start();
	?>

	<header class="container-fluid largest primary pt-7 pb-2 mb-4">
		<div class="container text-center">
			<div class="large-1 large-md-6">
				<h1><?php the_archive_title(); ?></h1>
			</div>
		</div>
	</header>

	<?php
	return ob_get_clean();
}
