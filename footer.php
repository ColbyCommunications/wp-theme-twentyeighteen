<?php
/**
 * Footer template
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use ColbyComms\SVG\SVG;

use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

?>
<?php T18::super_footer(); ?>
<footer class="print-none site-footer dark pt-5 pb-6 container-fluid dark">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4 small-4 mb-3">
				<?php echo T18::get_address_block(); ?>
				<?php echo T18::get_social_icons(); ?>
			</div>

			<div class="col-12 col-md-8 mb-3 text-light">
				<?php echo T18::get_global_menu(); ?>
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
<?php T18::sticky_nav(); ?>
<?php wp_footer(); ?>
<?php
T18::sub_footer();
