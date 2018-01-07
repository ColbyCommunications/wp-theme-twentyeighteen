<?php
/**
 * Search results template.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use function ColbyComms\TwentyEighteen\Functions\get_page_header;
use function ColbyComms\TwentyEighteen\Functions\get_post_pagination;

get_header();

echo get_page_header(
	[
		'do_background_image' => false,
		'width' => 'md',
		'header_content' => '<div class="page-header container-lg"><h1 class="text-white">Search results for <i>'
		. get_search_query() . '</i></h1>' . get_search_form( false ) . '</div>',
	]
);
?>
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
		<?php echo get_post_pagination(); ?>
</div>

<?php

get_footer();
