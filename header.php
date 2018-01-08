<?php
/**
 * Header template
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use ColbyComms\SVG\SVG;
use function ColbyComms\TwentyEighteen\Functions\get_head_title;

?><!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=0" />
<?php wp_head(); ?>
<title>
	<?php echo get_head_title(); ?>
</title>
<header class="site-header pl-2 pr-2 pt-1 pb-1 container-fluid <?php echo has_post_thumbnail( $post ) ? 'dark-transparent' : 'primary'; ?>">
	<div class="container">
		<div class="row align-items-center">
			<a class="logo-container col-4 d-flex align-items-center" href="//www.colby.edu">
				<?php SVG::show( 'colby-logo' ); ?>
			</a>
			<a style="line-height: 1.5;" class="home-link col-8 justify-flex-end d-flex text-right"
				href="<?php bloginfo( 'url' ); ?>">
				<?php bloginfo(); ?>
			</a>
		</div>
	</div>
</header>
<main class="<?php echo esc_attr( implode( ' ', apply_filters( 'main_class', [ 'main' ] ) ) ); ?>">
