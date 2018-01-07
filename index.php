<?php
/**
 * Fallback template.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */

if ( is_singular() ) {
	include 'singular.php';
	return;
}

if ( is_archive() ) {
	include 'archive.php';
	return;
}

if ( is_home() ) {
	include 'home.php';
	return;
}
