<?php
/**
 * Template for single posts.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

use ColbyComms\TwentyEighteen\{PageHeader, TwentyEighteen as T18};

global $post;

setup_postdata( $post );

get_header();
?>
<main <?php T18::main_class( 'main' ); ?>>
<?php
PageHeader::show(
	[
		'do_background_image' => false,
		'title_size' => 'large-1',
		'width' => 'md',
	]
);
?>
<?php T18::after_page_header(); ?>
<div class="container-md py-5">
	<article class="px-2">
		<?php the_content(); ?>
		<?php get_template_part( 'parts/post-footer' ); ?>
	</article>
</div>
</main>
<?php
get_footer();
