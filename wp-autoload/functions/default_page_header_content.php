<?php
/**
 * Function default_page_header_content
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Provides fallback content for a header where nothing is provided.
 *
 * @param array $options Options passed in to the page header function.
 */
function default_page_header_content( $options = [] ) {
	$subtitle = is_singular()
		? get_post_meta( get_the_id(), 'subtitle', true )
		: '';

	?>
	<div class="container<?php echo empty( $options['width'] ) ? '' : "-{$options['width']}"; ?> text-center">
		<?php echo get_parent_page_link(); ?>
		<div class="<?php echo esc_attr( $options['title_size'] ); ?>">
			<h1><?php the_title(); ?></h1>
		</div>
		<?php if ( $subtitle ) : ?>
		<div class="large-2 text-uppercase">
			<h2><?php echo $subtitle; ?></h2>
		</div>
		<?php endif; ?>
	</div>
	<?php
}
