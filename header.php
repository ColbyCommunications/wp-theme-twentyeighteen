<?php
/**
 * Header template
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

use ColbyComms\SVG\SVG;
use ColbyComms\TwentyEighteen\TwentyEighteen as T18;

?><!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=0" />
<?php wp_head(); ?>
<title>
	<?php echo T18::get_head_title(); ?>
</title>
<body <?php body_class(); ?>>
<header class="site-header pl-2 pr-2 pt-1 pb-1 container-fluid 
<?php
echo has_post_thumbnail( $post )
	? 'dark-transparent'
	: 'primary';
	?>
	">
	<div class="container">
		<div class="row mx-0 align-items-center">
			<div class="col-6 px-0 col-lg-3">
				<?php echo do_shortcode( '[colby-dn-logos]' ); ?>
			</div>
			<a style="line-height: 1.5;" class="home-link px-0 col-6 col-lg-9 justify-flex-end d-flex text-right"
				href="<?php bloginfo( 'url' ); ?>">
				<?php bloginfo(); ?>
			</a>
		</div>
	</div>
</header>
