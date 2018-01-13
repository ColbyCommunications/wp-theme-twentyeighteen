<?php
/**
 * Template Name: Page (wider, HTML only)
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use function ColbyComms\TwentyEighteen\Functions\get_page_header;
use function ColbyComms\TwentyEighteen\Functions\main_class;

global $post;

remove_filter( 'the_content', 'wpautop' );

setup_postdata( $post );

get_header();
?>
<main <?php main_class( 'main' ); ?>>
	<?php echo get_page_header(); ?>
	<div class="container-xl py-4">
		<article class="pb-3">
	<?php the_content(); ?>
		</article>
	</div>
</main>
<?php
get_footer();
