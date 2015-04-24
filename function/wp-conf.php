<?php

// Drag and drop menu support
register_nav_menu('primary', 'Primary Menu');

// This theme uses post thumbnails
add_theme_support('post-thumbnails');

// Apply do_shortcode() to widgets so that shortcodes will be executed in widgets
add_filter('widget_text', 'do_shortcode');

// Widget area for main sidebar
register_sidebar(array(
	'name' => 'Main Sidebar',
	'id' => 'sidebar-main',
	'description' => 'Widget area for main sidebar',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

// Widget area for footer
register_sidebar(array(
	'name' => 'Footer',
	'id' => 'sidebar-footer',
	'description' => 'Widget area for footer',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

// Widget area for top menu
register_sidebar(array(
	'name' => 'Top Menu',
	'id' => 'sidebar-top-menu',
	'description' => 'Widget area for top menu',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

// Widget area for front page header
register_sidebar(array(
	'name' => 'Front Page Header',
	'id' => 'sidebar-header-page-front',
	'description' => 'Widget area for front page header',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

// Widget area for blog page header
register_sidebar(array(
	'name' => 'Blog Page Header',
	'id' => 'sidebar-header-page-blog',
	'description' => 'Widget area for blog page header',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

// Widget area for header (no front page nor blog page)
register_sidebar(array(
	'name' => 'Header (other)',
	'id' => 'sidebar-header-other',
	'description' => 'Widget area for header (no front page nor blog page)',
	'before_widget' => '<div id="%1$s">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'
));

// Allow svg upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Enqueue_styles
if (!function_exists('SKL_load_styles')) {
	function SKL_load_styles() 
	{
		wp_register_style('skeleton-style', get_template_directory_uri() . '/style.css');

		wp_enqueue_style('skeleton-style');
	}
	
	add_action('wp_enqueue_scripts', 'SKL_load_styles');
}

//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info
function insert_fb_in_head() {
	global $post;
	
	$thumbUrl;
	$cont;
	
	if (is_singular()) {
		setup_postdata($post);
		$cont = get_the_excerpt();
		wp_reset_postdata();
	}
	else {
		$cont = get_bloginfo('description');
	}
	
	if ( !is_singular()) //if it is not a post or a page
		return;
	
	//echo '<meta property="fb:admins" content="YOUR USER ID"/>';
	echo '<meta property="og:title" content="' . get_the_title() . '"/>';
	echo '<meta property="og:type" content="article"/>';
	echo '<meta property="og:description" content="' . $cont . '"/>';
	echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
	
	if(!has_post_thumbnail()) { //the post does not have featured image, use a default image
		$thumbUrl = get_stylesheet_directory_uri() . '/default.png';
	}
	else{
		$thumbUrl = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
	}
	
	echo '<meta property="og:image" content="' . $thumbUrl . '"/>';
	echo "\n";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

?>
