<?php
/**
 * 404 template
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use ColbyComms\TwentyEighteen\{PageHeader, TwentyEighteen as T18};

get_header();

?>
<main <?php T18::main_class( 'main' ); ?>>
<?php
PageHeader::show(
	[
		'header_content' => '<div class="container text-center">
				<h1>No post found.</h1>
			</div>',
	]
);
?>
	<?php T18::after_page_header(); ?>
	<article class="container pt-6 pb-4 text-center">
		<p class="lead">Can't find what you're looking for?</p>
		<?php echo do_shortcode( '[site-search-form]' ); ?>
	</article>
</main>
<?php

get_footer();
