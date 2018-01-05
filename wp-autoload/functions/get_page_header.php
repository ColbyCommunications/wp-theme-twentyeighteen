<?php

namespace ColbyComms\TwentyEighteen\Functions;

function default_header_content( $options ) {
	?>
	<div class="container<?php echo $options['width'] ? "-{$options['width']}" : ''; ?> text-center">
	<?php echo get_parent_page_link(); ?>
		<div class="<?php echo esc_attr( $options['title_size'] ); ?>">
			<h1><?php the_title(); ?></h1>
		</div>

		<?php if ($subtitle = get_post_meta(get_the_id(), 'subtitle', true) ) : ?>
		<div class="large-2 text-uppercase">
			<h2><?php echo $subtitle; ?></h2>
		</div>
		<?php endif; ?>
	</div>
	<?php
}

function get_page_header( $options = [] ) {
	$options = array_merge(
		[
			'do_background_image' => true,
			'title_size' => 'large 1 large-md-6',
			'width' => '',
			'header_content' => get_post_meta( get_the_id(), 'header_content', true )
		],
		$options
	);


    $featured_image_style = '';
    if ( $options['do_background_image'] && has_post_thumbnail() ) {
        $url = get_the_post_thumbnail_url( get_the_id(), 'large');
        $featured_image_style = " style=\"background-image: url($url)\"";
    }

    $padding_classes = empty($featured_image_style) ? 'pb-3 pt-7' : 'pb-8 pt-9';


    ob_start();
    ?>

    <header class="container-fluid largest primary <?php echo $padding_classes; ?><?php echo empty($featured_image_style) ? '' : ' has-featured-image'; ?>"<?php echo $featured_image_style; ?>>
		<?php if ( empty( $options['header_content'] ) ) : ?>
		<?php default_header_content( $options ); ?>
		<?php else : ?>
			<?php echo $options['header_content']; ?>
		<?php endif; ?>
    </header>

    <?php
    return ob_get_clean();
}
