<?php
/**
 * Functions
 */

require_once(get_template_directory() . '/WPSkeleton.php');

$wp_skeleton_settings = new WPSkeleton\Settings();

function get_fn($name) 
{
	$uri = '/function/' . $name . '.php';
	if (file_exists(get_stylesheet_directory() . $uri)) {
		require_once(get_stylesheet_directory() . $uri);
	}
	else {
		require_once(get_template_directory() . $uri);
	}
}

function get_widget($name) 
{
	$uri = '/widget/' . $name . '.php';
	if (file_exists(get_stylesheet_directory() . $uri)) {
		require_once(get_stylesheet_directory() . $uri);
	}
	else {
		require_once(get_template_directory() . $uri);
	}
}

require_once 'skl-config.php';

get_fn('dev-utils');
get_fn('utils');

get_fn('text');
get_fn('elements');
get_fn('shortcodes');

if (function_exists('init_child')) {
	init_child();
}

get_fn('wp-conf');

?>
