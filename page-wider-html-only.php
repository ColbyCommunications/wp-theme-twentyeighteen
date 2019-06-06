<?php
/**
 * Template Name: Page (wider, HTML only)
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

use ColbyComms\TwentyEighteen\{PageHeader, TwentyEighteen as T18};

global $post;

remove_filter( 'the_content', 'wpautop' );

setup_postdata( $post );

get_header();
?>
<main <?php T18::main_class( 'main' ); ?>>
	<?php PageHeader::show(); ?>
	<?php T18::after_page_header(); ?>
	<div class="container-xl py-4">
		<article class="pb-3">
			<?php the_content(); ?>
		</article>
	</div>
</main>
<?php
get_footer();
