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
function do_loop($fn, $query_args=null, $enable_pagination=true) 
{
	global $wp_query;
	$query = ($query_args == null ? $wp_query : new WP_Query($query_args));
	
	if ($query->have_posts()) {
		$post_count = $query->post_count;
		$index = 0;
		while ($query->have_posts()) {
			$query->the_post();
			$fn();
			$index++;
		}
		?>

		<?php if ($enable_pagination) : ?>
		<div class="pagination aligncontainer">
			<div class="nav-next alignleft"><?php previous_posts_link( _text('pagination-next') ); ?></div>
			<div class="nav-previous alignright"><?php next_posts_link( _text('pagination-prev') ); ?></div>
		</div>
		<?php endif; ?>
<?php
		wp_reset_postdata();
	}
	else {
		_text('no-posts-found');
	}
}

?>
