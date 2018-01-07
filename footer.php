<?php
/**
 * Footer template
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use ColbyComms\SVG\SVG;
use function ColbyComms\TwentyEighteen\Functions\get_global_menu;
use function ColbyComms\TwentyEighteen\Functions\get_address_block;
use function ColbyComms\TwentyEighteen\Functions\render_sticky_nav;
use function ColbyComms\TwentyEighteen\Functions\get_nav_type;
use function ColbyComms\TwentyEighteen\Functions\get_social_icons;
use function ColbyComms\TwentyEighteen\Functions\sticky_nav;
use function ColbyComms\TwentyEighteen\Functions\sub_footer;

?>
</main>
<footer class="site-footer dark pt-4 pb-6 container-fluid dark">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4 small-4">
				<?php echo get_address_block(); ?>
				<?php echo get_social_icons(); ?>
			</div>

			<div class="col-12 col-md-8 mb-2 text-light">
				<?php echo get_global_menu(); ?>
			</div>
			<div class="col-12 mb-2 text-center">
				<a class="text-white" href=<?php echo network_home_url(); ?>>
					<?php SVG::show( 'connect-to-colby' ); ?>
				</a>
			</div>
			<div class="col-12 mb-2 text-muted text-center small-3">
				&copy;<?php echo esc_html( date( 'Y' ) ); ?> Colby College. All rights reserved.
			</div>
		</div>
	</div>
</footer>
<?php sticky_nav(); ?>
<?php wp_footer(); ?>
<?php
subfooter();


$sub_footer = apply_filters( 'sub_footer_content', carbon_get_theme_option( 'sub_footer_content' ) );
if ( ! empty( $sub_footer ) ) {
	echo do_shortcode( $sub_footer );
}
