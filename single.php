<?php

use function ColbyComms\TwentyEighteen\Functions\get_page_header;

global $post;

setup_postdata( $post );

get_header();
?>
<?php echo get_page_header( [
	'do_background_image' => false,
	'title_size' => 'large-1',
	'width' => 'md'
	]
); ?>
<div class="container-md py-5">
    <article class="px-2">
	    <?php the_content(); ?>
		<?php get_template_part( 'parts/post-footer' ); ?>
    </article>
</div>
<?php
get_footer();
