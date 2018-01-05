<?php
/**
 * Autoload non-class files.
 *
 * @package colbycomms/wp-theme-twentyeighteen
 */



require 'functions.php';

foreach ( glob(__DIR__ . '/functions/*.php', GLOB_NOSORT) as $file ) {
    include_once $file;
}

foreach ( glob(__DIR__ . '/shortcodes/*.php', GLOB_NOSORT) as $file ) {
    include_once $file;
}

foreach ( glob(__DIR__ . '/hooks/*.php', GLOB_NOSORT) as $file ) {
    include_once $file;
}


new ColbyComms\TwentyEighteen\Shortcodes\Section();
new ColbyComms\TwentyEighteen\Shortcodes\Catalog();
new ColbyComms\TwentyEighteen\ThemeOptions();
