<?php
/**
 * Template Name: Page (wider)
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use function ColbyComms\TwentyEighteen\Functions\get_page_header;

global $post;

setup_postdata( $post );

get_header();
?>
<?php echo get_page_header(); ?>
<div class="container py-5">
	<article class="pb-3">
		<?php the_content(); ?>
	</article>
</div>

<?php
get_footer();
