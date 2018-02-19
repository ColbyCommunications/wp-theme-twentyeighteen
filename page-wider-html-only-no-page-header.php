<?php
/**
 * Template Name: Page (full-width, HTML only, no page header)
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

use ColbyComms\TwentyEighteen\{PageHeader, TwentyEighteen as T18};

global $post;


add_filter(
	T18::TRANSPARENT_HEADER_FILTER, function() {
		return true;
	}
);

remove_filter( 'the_content', 'wpautop' );

setup_postdata( $post );

get_header();
?>
<main <?php T18::main_class( 'main' ); ?>>
	<div>
		<article class="pb-3">
			<?php the_content(); ?>
		</article>
	</div>
</main>
<?php
get_footer();
