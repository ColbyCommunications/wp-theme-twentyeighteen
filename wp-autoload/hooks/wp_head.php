<?php
/**
 * Hooks functions to the wp_head action.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

namespace ColbyComms\TwentyEighteen\Hooks;

use ColbyComms\TwentyEighteen\ThemeOptions;

add_action( 'wp_head', __NAMESPACE__ . '\_typekit' );
add_action( 'wp_head', __NAMESPACE__ . '\_analytics', 999 );

// phpcs:disable Squiz.Commenting.FunctionComment.Missing

function _typekit() {
	?>
<link rel="stylesheet" href="https://use.typekit.net/mko7rzv.css">
<?php
}

function _analytics() {
	echo ThemeOptions::get( ThemeOptions::ANALYTICS_KEY );
}
