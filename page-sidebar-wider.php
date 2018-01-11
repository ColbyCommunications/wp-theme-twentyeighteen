<?php
/**
 * Template Name: Page with sidebar (wider)
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
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<main class="<?php echo esc_attr( implode( ' ', apply_filters( 'main_class', [ 'main col-12 col-md-8' ] ) ) ); ?>">
				<div class="container py-5">
					<article class="pb-3">
						<?php the_content(); ?>
					</article>
				</div>
			</main>
			<aside class="col-12 col-md-4 py-5">
				<?php echo get_main_sidebar(); ?>
			</aside>
		</div>
	</div>
</div>
<?php
get_footer();
