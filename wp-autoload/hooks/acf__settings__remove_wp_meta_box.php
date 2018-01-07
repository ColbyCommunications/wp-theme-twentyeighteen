<?php
// @codingStandardsIgnoreFile
// Advanced Custom Fields 5.6.1 removes built-in Custom Fields from post/page screen options.
add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );
