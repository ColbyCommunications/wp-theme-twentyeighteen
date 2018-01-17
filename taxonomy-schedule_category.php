<?php
/**
 * Template for post archives.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use ColbyComms\Schedules\Shortcodes\ScheduleShortcode;
use ColbyComms\Schedules\WpQuery;
use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

if ( ! have_posts() ) {
	include '404.php';
	return;
}

get_header();

$queried_object = get_term_by( 'slug', get_query_var( 'schedule_category' ), 'schedule_category' );

?>
<main class="<?php echo esc_attr( implode( ' ', apply_filters( 'main_class', [ 'main' ] ) ) ); ?>">
	<?php T18::schedule_archive_header( $queried_object ); ?>
	<?php PageHeader::show(); ?>
	<div class="container mx-auto mb-5">
		<?php
		echo ScheduleShortcode::render(
			new WpQuery( $wp_query ),
			$queried_object->parent ? [ 'active' => 'Signature Events' ] : [],
			$queried_object->parent ? $queried_object : null
		);
		?>
	</div>
</main>
<?php

get_footer();
