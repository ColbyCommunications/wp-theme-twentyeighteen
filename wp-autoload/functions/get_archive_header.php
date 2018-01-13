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
 * @param array $options Display options.
 * @return string Rendered HTML.
 */
function get_archive_header( $options = [] ) {
	ob_start();
	?>

	<header class="container-fluid largest primary pt-7 pb-2 mb-4">
		<div class="container text-center">
			<div class="large-1 large-md-6">
				<?php if ( isset( $options['content'] ) ) : ?>
					<?php echo $options['content']; ?>
				<?php else : ?>
					<h1><?php the_archive_title(); ?></h1>
				<?php endif; ?>
			</div>
		</div>
	</header>

	<?php
	return ob_get_clean();
}
