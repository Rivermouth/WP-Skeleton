<?php

function get_ISO_datetime() 
{
	return get_the_time('c');
}

function query_child_pages()
{
	return 'post_type=page&post_parent=' . get_the_ID();
}

function has_child_pages() 
{
	$children = get_pages('child_of=' . get_the_ID());
	if(count($children) > 0 ) return true;
	else return false;
}

?>
