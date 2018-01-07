<?php
/**
 * Template Name: Page with sidebar
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use function ColbyComms\TwentyEighteen\Functions\get_page_header;
use function ColbyComms\TwentyEighteen\Functions\get_main_sidebar;

global $post;

setup_postdata( $post );

get_header();

?>

<?php echo get_page_header(); ?>
<div class="container py-5">
	<div class="row">
		<article class="col-12 col-md-8">
			<div>
				<?php the_content(); ?>
			</div>
		</article>
		<div class="col-12 col-md-4">
			<?php echo get_main_sidebar(); ?>
		</div>
	</div>
</div>

<?php

get_footer();
