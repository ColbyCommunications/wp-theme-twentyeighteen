<?php
/**
 * Template Name: Page with sidebar
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use function ColbyComms\TwentyEighteen\Functions\get_page_header;
use function ColbyComms\TwentyEighteen\Functions\get_main_sidebar;
use function ColbyComms\TwentyEighteen\Functions\main_class;

global $post;

setup_postdata( $post );

get_header();

echo get_page_header(); ?>
<div class="container-fluid">
	<div class="container-lg">
		<div class="row">
			<main <?php main_class( 'main col-12 col-md-8' ); ?>>
				<article class="container py-5">
					<?php the_content(); ?>
				<article>
			</main>
			<aside class="col-12 col-md-4 py-5">
				<?php echo get_main_sidebar(); ?>
			</aside>
		</div>
	</div>
</div>
<?php

get_footer();
