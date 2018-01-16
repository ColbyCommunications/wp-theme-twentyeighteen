<?php
/**
 * Template Name: Page with sidebar (wider)
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

global $post;

setup_postdata( $post );

get_header();
?>
<?php echo T18::get_page_header(); ?>
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<main class="<?php echo esc_attr( implode( ' ', apply_filters( 'main_class', [ 'main col-12 col-lg-8' ] ) ) ); ?>">
				<div class="container py-5">
					<article class="pb-3">
						<?php the_content(); ?>
					</article>
				</div>
			</main>
			<aside class="col-12 col-lg-4 py-5">
				<?php echo T18::get_main_sidebar(); ?>
			</aside>
		</div>
	</div>
</div>
<?php
get_footer();
