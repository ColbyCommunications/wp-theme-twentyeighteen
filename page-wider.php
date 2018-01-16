<?php
/**
 * Template Name: Page (wider)
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

global $post;

setup_postdata( $post );

get_header();
?>
<main <?php T18::main_class(); ?>>
	<?php echo T18::get_page_header(); ?>
	<?php T18::after_page_header(); ?>
	<div class="container-xl py-4">
		<article class="pb-3">
			<?php the_content(); ?>
		</article>
	</div>
</main>
<?php
get_footer();
