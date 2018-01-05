<?php

namespace ColbyComms\TwentyEighteen\Functions;

function get_head_title() {
	$wp_title = wp_title( '', false );
	$wp_title = $wp_title ? "$wp_title - " : '';
	return $wp_title . get_bloginfo() . ' - Colby College';
}
