<?php
/**
 * Template for single posts and pages.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

use ColbyComms\TwentyEighteen\{PageHeader, TwentyEighteen as T18};

global $post;

setup_postdata( $post );

get_header();
?>
<main <?php T18::main_class(); ?>>
	<?php PageHeader::show(); ?>
	<?php T18::after_page_header(); ?>
	<div class="container-lg py-5">
		<article class="pb-3">
			<?php the_content(); ?>
		</article>
	</div>
</main>
<?php
get_footer();
