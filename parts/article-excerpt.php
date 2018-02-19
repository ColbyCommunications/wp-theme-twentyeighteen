<?php
/**
 * Template for an article excerpt.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

?>
<article <?php post_class( 'light archive-excerpt' ); ?>>
	<header class="primary archive-excerpt__header">
		<h1 class="archive-excerpt__title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h1>
	</header>
	<div class="archive-excerpt__body">
		<?php the_excerpt(); ?>
	</div>
	<footer class="archive-excerpt__footer">
		<div class="archive-excerpt__date">
			<?php the_time( get_option( 'date_format' ) ); ?>
		</div>
	</footer>
</article>
