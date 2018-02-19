<?php
// @codingStandardsIgnoreFile
use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

add_filter(
	'colbycomms__wp_schedule__before_schedule_archive', function( $string, $queried_object ) {
		ob_start();
	?>
<main class="<?php echo esc_attr( implode( ' ', apply_filters( 'main_class', [ 'main' ] ) ) ); ?>">
	<?php T18::schedule_archive_header( $queried_object ); ?>
	<div class="container-lg mx-auto mb-5">
	<?php
	return ob_get_clean();
	}, 10, 2
);
