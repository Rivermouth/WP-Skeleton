<?php

function get_pagelet($slug, $name=null)
{
	get_template_part('pagelet/' . $slug, $name);
}

function get_util($slug, $name=null)
{
	get_template_part('util/' . $slug, $name);
}

// Great site for generating queries: http://generatewp.com/wp_query/
function do_loop($fn, $query_args=null, $enable_pagination=true, &$fn_args=null)
{
	global $wp_query;
	global $post;
	$original_post = null;

	if ($query_args == null) {
	    $query = $wp_query;
	}
	else {
	    $query = new WP_Query($query_args);
	    $original_post = $post;
	}

	if ($query->have_posts()) {
		$post_count = $query->post_count;
		$index = 0;
		while ($query->have_posts()) {
			$query->the_post();
			$fn($fn_args);
			$index++;
		}
		?>

		<?php if ($enable_pagination) : ?>
		<div class="pagination aligncontainer">
			<div class="nav-next alignleft"><?php previous_posts_link(); ?></div>
			<div class="nav-previous alignright"><?php next_posts_link(); ?></div>
		</div>
		<?php endif; ?>

		<?php
		if ($original_post != null) {
			$post = $original_post;
			setup_postdata($post);
		}
	}
	else {
		_text('no-posts-found');
	}
}

?>
