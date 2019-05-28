<?php
/**
 * Plugin entry point.
 *
 * @package colbycomms/whos-coming
 */

namespace ColbyComms\WhosComing;

use ColbyComms\WhosComing\WpFunctions as WP;

new ThemeOptions();

WP::add_action(
	'init',
	function() {
		new WhosComing();
	}
);
