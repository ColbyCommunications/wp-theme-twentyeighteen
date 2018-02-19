<?php
/**
 * Creates a shortcode for a block showing the Colby logo and the DareNorthward logo.
 *
 * @package colbycomms/colby-wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Shortcodes;

use ColbyComms\SVG\SVG;

/**
 * Shortcode [colby-dn-logos]
 */
class ColbyDNLogos {

	/**
	 * Add hooks.
	 */
	public function __construct() {
		if ( ! shortcode_exists( 'colby-dn-logos' ) ) {
			add_shortcode( 'colby-dn-logos', [ __CLASS__, 'shortcode_callback' ] );
		}
	}

	/**
	 * Renders the shortcode output.
	 */
	public static function shortcode_callback() {
		ob_start();

		?>
<div class="colby-dn-logos">
	<a href="//colby.edu" class="colby-dn-logos__colby">
		<?php SVG::show( 'colby-logo' ); ?>
	</a>
	<a href="//darenorthward.colby.edu" class="colby-dn-logos__dn">
		<?php SVG::show( 'dare-northward' ); ?>
	</a>
</div>

		<?php

		// Trim newline characters to prevent autop problems.
		return str_replace( [ "\n", "\r" ], '', ob_get_clean() );
	}
}
