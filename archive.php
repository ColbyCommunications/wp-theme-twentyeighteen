<?php
/**
 * Template for post archives.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

use ColbyComms\TwentyEighteen\{PageHeader, TwentyEighteen as T18};

if ( ! have_posts() ) {
	include '404.php';
	return;
}

get_header();

?>
<main <?php T18::main_class( 'main' ); ?>>
	<?php PageHeader::show( [ 'type' => 'archive' ] ); ?>
	<?php T18::after_page_header(); ?>
	<div class="post-archive">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'parts/article', 'excerpt' ); ?>
		<?php endwhile; ?>
	</div>
<?php echo T18::get_post_pagination(); ?>
</main>
<?php

get_footer();
