<?php
/**
 * Template for post archives.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use Carbon_Fields\Helper\Helper as Carbon;
use ColbyComms\Schedules\Shortcodes\ScheduleShortcode;
use ColbyComms\Schedules\Utils\WpQuery;
use ColbyComms\TwentyEighteen\{PageHeader, TwentyEighteen as T18};

if ( ! have_posts() ) {
	include '404.php';
	return;
}

get_header();

$queried_object = get_term_by( 'slug', get_query_var( 'schedule_category' ), 'schedule_category' );

?>
<main class="<?php echo esc_attr( implode( ' ', apply_filters( 'main_class', [ 'main' ] ) ) ); ?>">
	<?php T18::schedule_archive_header( $queried_object ); ?>
	<div class="container-lg mx-auto mb-5">
		<div class="mb-3">
		<?php echo apply_filters( 'the_content', $queried_object->description ); ?>
		</div>
		<?php
		$do_tag_selector = Carbon::get_term_meta( $queried_object->term_id, 'colby_schedule__do_tag_list' ) ? 'true' : 'false';
		$do_description = Carbon::get_term_meta( $queried_object->term_id, 'colby_schedule__hide_description' ) ? 'false' : 'true';
		echo ScheduleShortcode::render(
			new WpQuery( $wp_query ),
			$queried_object->parent
				? [ 'active' => 'Signature Events', 'tag-selector' => $do_tag_selector, 'show-description' => $do_description ]
				: [ 'tag-selector' => $do_tag_selector, 'show-description' => $do_description ],
			$queried_object->parent ? $queried_object : null
		);
		?>
	</div>
</main>
<?php

get_footer();
