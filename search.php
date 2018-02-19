<?php
/**
 * Search results template.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

use ColbyComms\TwentyEighteen\{PageHeader, TwentyEighteen as T18};

get_header();
?>
<main <?php T18::main_class(); ?>>
<?php
PageHeader::show(
	[
		'do_background_image' => false,
		'width' => 'md',
		'header_content' => '
			<div class="page-header container-lg">
				<h1 class="text-white">Search results for <i>' . get_search_query() . '</i></h1>'
				. get_search_form( false ) .
			'</div>',
	]
);
?>
<?php T18::after_page_header(); ?>
	<div class="container-lg">
		<div class="pt-4 row pb-4">
		<?php if ( ! have_posts() ) : ?>
			<div class="col-12">
				No posts found.
			</div>
			<?php
			endif;
while ( have_posts() ) :
	the_post();
	get_template_part( 'parts/article', 'excerpt' );
			endwhile;
			?>
		</div>
		<?php echo T18::get_post_pagination(); ?>
	</div>
</main>
<?php

get_footer();
