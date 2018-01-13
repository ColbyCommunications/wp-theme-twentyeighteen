<?php
/**
 * Template for an article excerpt.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

?>
<article <?php post_class( 'col-12 col-md-6 px-2 light archive-excerpt' ); ?>>
	<div class="container-md pb-3 mb-3 article-inner">
		<header class="primary pl-2 pt-2 pr-2 pb-1 mb-2 container-fluid">
			<div class="container">
				<h1 class="large-2">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>
			</div>
		</header>
		<div class="container-fluid px-0">
			<div class="container small-2">
				<?php the_excerpt(); ?>
			</div>
		</div>
		<?php get_template_part( 'parts/post-footer' ); ?>
	</div>
</article>
