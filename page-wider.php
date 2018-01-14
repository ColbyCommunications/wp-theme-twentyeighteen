<?php
/**
 * Template Name: Page (wider)
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use function ColbyComms\TwentyEighteen\Functions\get_page_header;
use function ColbyComms\TwentyEighteen\Functions\main_class;

global $post;

setup_postdata( $post );

get_header();
?>
<main <?php main_class(); ?>>
	<?php echo get_page_header(); ?>
	<div class="container py-4">
		<article class="pb-3">
			<?php the_content(); ?>
		</article>
	</div>
</main>
<?php
get_footer();
