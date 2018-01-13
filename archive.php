<?php
/**
 * Template for post archives.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use function ColbyComms\TwentyEighteen\Functions\get_archive_header;

if ( ! have_posts() ) {
	include '404.php';
	return;
}

get_header();

?>
<main class="<?php echo esc_attr( implode( ' ', apply_filters( 'main_class', [ 'main' ] ) ) ); ?>">
<div class="row">
	<?php echo get_archive_header(); ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'parts/article', 'excerpt' ); ?>
	<?php endwhile; ?>
</div>
<?php echo get_post_pagination(); ?>
</main>
<?php

get_footer();
