<?php
/**
 * Function get_social_icons
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Functions;

use ColbyComms\SVG\SVG;

/**
 * Provides details for social icons to display on the site.
 * TO-DO: Move some of this into theme settings.
 *
 * @return array The settings.
 */
function _get_social_icon_settings() {
	return [
		[
			'name' => 'Facebook',
			'url' => apply_filters( 'facebook_url', 'https://www.facebook.com/colbycollege/' ),
			'icon' => SVG::get( 'facebook' ),
		],
		[
			'name' => 'Twitter',
			'url' => apply_filters( 'twitter_url', 'https://twitter.com/ColbyCollege' ),
			'icon' => SVG::get( 'twitter' ),
		],
		[
			'name' => 'Instagram',
			'url' => apply_filters( 'instagram_url', 'https://www.instagram.com/colbycollege/' ),
			'icon' => SVG::get( 'instagram' ),
		],
		[
			'name' => 'Vimeo',
			'url' => apply_filters( 'vimeo_url', 'https://vimeo.com/colbycollege' ),
			'icon' => SVG::get( 'vimeo' ),
		],
	];
}

/**
 * Retreives a set of social icons with Colby accounts.
 *
 * @return string The nav type.
 */
function get_social_icons() {
	ob_start();
	?>
	<div class="mb-3 mt-3">
		<?php foreach ( _get_social_icon_settings() as $social_link ) : ?>
		<a class="pr-3 text-white" href=<?php echo esc_url( $social_link['url'] ); ?>>
			<?php echo $social_link['icon'] ?: $social_link['name']; ?>
		</a>
		<?php endforeach; ?>
	</div>
	<?php
	return ob_get_clean();
}
