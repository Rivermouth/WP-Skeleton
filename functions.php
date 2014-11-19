<?php
/**
 * Functions
 */


function get_fn($name) 
{
	require_once('function/' . $name . '.php');
}

function get_widget($name) 
{
	require_once('widget/' . $name . '.php');
}

require_once 'skl-config.php';

get_fn('dev-utils');
get_fn('utils');

get_fn('text');
get_fn('elements');
get_fn('shortcodes');

get_fn('wp-conf');

if (function_exists('init_child')) {
	init_child();
}

?>
