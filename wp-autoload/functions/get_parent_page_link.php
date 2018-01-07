<?php
/**
 * Function get_head_title
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Builds a div with a link to the current page's parent.
 *
 * @return string HTML.
 */
function get_parent_page_link() {
	$parent = wp_get_post_parent_id( get_the_id() );

	if ( ! $parent ) {
		return '';
	}

	ob_start();
	?>
<div class="parent-page-link">
	<a href="<?php echo get_the_permalink( $parent ); ?>">
		<?php echo get_the_title( $parent ); ?>
	</a>
</div>

	<?php
	return ob_get_clean();
}
