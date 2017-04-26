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

/**
 * Returns nested object array of menu. All submenu items are in $menu->children 
 * array in parent menu item.
 *
 * @param current_menu - name of menu or menu location
 * @return array of nested menu items or false if none found
 */
function wp_get_menu_items_nested($current_menu)
{
    $array_menu = wp_get_nav_menu_items($current_menu);
	// If no menu found with $current_menu, try to find menu in that named location
	if ( ! $array_menu && ( $locations = get_nav_menu_locations() ) && isset( $locations[ $current_menu ] ) ) {
		$array_menu = wp_get_nav_menu_items( $locations[ $current_menu ] );
	}
	if (!$array_menu) {
		return false;
	}
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
			$m->children = array();
			$menu[$m->ID] = $m;
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $menu[$m->menu_item_parent]->children[$m->ID] = $m;
        }
    }
    return $menu;
}

?>
