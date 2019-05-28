<?php
/**
 * Plugin Name: Who's Coming
 * Description: A listing of people who have R.S.V.P.'ed to an event, with the list entered in JSON or CSV format.
 * Plugin URI: https://github.com/ColbyCommunications/whos-coming
 * Version: 0.1.0
 * Author: John Watkins <john.watkins@colby.edu>
 * Text Domain: whos-coming
 *
 * @package colbycomms/whos-coming
 */

/**
 * Only loaded when the the package is installed as a WordPress plugin. The actual plugin entry point is
 * whos-coming/index.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	include __DIR__ . '/vendor/autoload.php';
}
