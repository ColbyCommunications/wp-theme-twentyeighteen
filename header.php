<?php
/**
 * Header template
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

use ColbyComms\SVG\SVG;
use ColbyComms\TwentyEighteen\TwentyEighteen as T18;


?><!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=0" />
<link rel=icon href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type=image/x-icon>
<?php wp_head(); ?>
<title>
	<?php echo T18::get_head_title(); ?>
</title>
<body <?php body_class(); ?>>
<header class="site-header py-1 px-2 container-fluid 
<?php
echo has_post_thumbnail( $post ) || T18::is_header_transparent()
	? T18::get_transparent_header_class()
	: 'primary';
	?>
	">
	<div class="container">
		<div class="row mx-0 align-items-center">
			<div class="col-6 px-0 col-lg-3">
				<?php echo do_shortcode( '[colby-dn-logos]' ); ?>
			</div>
			<a class="home-link small-2 large-md-1 px-0 col-6 col-lg-9 justify-flex-end d-flex text-right"
				href="<?php bloginfo( 'url' ); ?>">
				<?php bloginfo(); ?>
			</a>
		</div>
	</div>
</header>
