<?php
// @codingStandardsIgnoreFile
// Advanced Custom Fields 5.6.1 removes built-in Custom Fields from post/page screen options.
// This theme doesn't use ACF, but it is network-activated in Colby's main multisite installation.
add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );
