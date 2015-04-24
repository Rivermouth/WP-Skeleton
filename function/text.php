<?php

/**
 * Return translation of given slug
 */
function _text($slug)
{
	$c = skl();
	$arr;
	if (isset($c['text'][$c['lang']])) {
		$arr = $c['text'][$c['lang']];
	}
	else {
		$arr = $c['text'][$c['default_lang']];
	}
	return $arr[$slug];
}

function _format($type) 
{
	$c = skl();
	$arr;
	if (isset($c['format'][$c['lang']])) {
		$arr = $c['format'][$c['lang']];
	}
	else {
		$arr = $c['format'][$c['default_lang']];
	}
	return $arr[$type];
}

?>
