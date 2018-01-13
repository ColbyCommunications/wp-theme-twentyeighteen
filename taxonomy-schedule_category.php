<?php
/**
 * Template for post archives.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use ColbyComms\Schedules\ScheduleShortcode;
use function ColbyComms\TwentyEighteen\Functions\get_archive_header;
use function ColbyComms\TwentyEighteen\Functions\schedule_archive_header;

if ( ! have_posts() ) {
	include '404.php';
	return;
}

get_header();

$queried_object = get_term_by( 'slug', get_query_var( 'schedule_category' ), 'schedule_category' );

?>
<main class="<?php echo esc_attr( implode( ' ', apply_filters( 'main_class', [ 'main' ] ) ) ); ?>">
	<?php schedule_archive_header( $queried_object ); ?>
	<div class="container mx-auto mb-5">
		<?php
		echo ScheduleShortcode::render(
			$wp_query,
			$queried_object->parent ? [ 'active' => 'Signature Events' ] : [],
			$queried_object->parent ? $queried_object : null
		);
		?>
	</div>
</main>
<?php

get_footer();
