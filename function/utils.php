<?php

function get_ISO_datetime() 
{
	return get_the_time('c');
}

function query_child_pages()
{
	return 'post_type=page&post_parent=' . get_the_ID();
}

function has_children($post_type) 
{
	$children = get_pages(array('child_of' => get_the_ID(), 'numberposts' => 1, 'post_type' => $post_type));
	return count($children) > 0;
}

function has_child_pages() 
{
	return has_children('page');
}

function get_feature_image_url() 
{
	return wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
}

?>
