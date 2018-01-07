<?php
/**
 * Function get_sticky_nav
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

/**
 * Renders a nav intended to stick to the bottom with CSS.
 *
 * @return string Rendered HTML.
 */
function render_sticky_nav() {
	ob_start();

	foreach ( get_site_menu_items() as $item ) {
		?>
	<a href="<?php echo $item->url; ?>" class="sticky-nav-item primary text-uppercase btn <?php echo implode( ' ', array_map( 'trim', $item->classes ) ); ?>">
		<?php echo $item->title; ?>
	</a>
		<?php
	}

	$sticky_nav_items = ob_get_clean();

	return "<nav class=\"sticky-nav small-5\">
	$sticky_nav_items
</nav>";
}
