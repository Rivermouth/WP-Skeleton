<?php

function el_html_open() 
{
	get_pagelet('html', 'open');
}

function el_html_close() 
{
	get_pagelet('html', 'close');
}

function el_publish_date() 
{ 
?>
	<span class="time">
		<time datetime="<?php echo get_ISO_datetime(); ?>" itemprop="datePublished"><?php the_time(_format('time')); ?></time>
	</span>
<?php
}

function el_publish_date_meta() 
{
?>
	<meta itemprop="datePublished" content="<?php echo get_ISO_datetime(); ?>">
<?php
}

function el_keywords_meta()
{
	$posttags = get_the_tags();
	if ($posttags) {
		$keywords = null;
		foreach($posttags as $tag) {
			if ($keywords == null) {
				$keywords = '';
			}
			else {
				$keywords .= ',';
			}
			$keywords .= $tag->name; 
		}
		?>
			<meta itemprop="keywords" content="<?php echo $keywords; ?>">
		<?php
	}
}

function el_author_link() 
{
?>
	<span class="author" itemprop="author"><?php the_author_posts_link(); ?></span>
<?php
}

function el_title($tag='h1') 
{
?>
	<div class="title"> 
		<?php if ($tag) { echo '<' . $tag . '>'; } ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<span itemprop="name"><?php the_title(); ?></span>
			</a>
		<?php if ($tag) { echo '</' . $tag . '>'; } ?>
	</div>
<?php
}

function el_title_no_link($tag='h1') 
{
?>
	<div class="title"> 
		<?php if ($tag) { echo '<' . $tag . '>'; } ?>
			<span itemprop="name"><?php the_title(); ?></span>
		<?php if ($tag) { echo '</' . $tag . '>'; } ?>
	</div>
<?php
}

if (!function_exists('el_categories')) {
	function el_categories() 
	{
		$post_categories = wp_get_post_categories(get_the_ID());
		foreach($post_categories as $catid){
			$cat = get_category($catid);
		?>
			<div class="tags categories">
				<span class="tag-<?php echo $cat->slug; ?>">
					<a href="<?php echo get_category_link($catid); ?>" itemprop="about"><?php echo $cat->name; ?></a>
				</span>
			</div>
		<?php	
		}
	}
}

if (!function_exists('el_content_thumbnail')) {
	function el_content_thumbnail($do_wrap_in_post_link=false) 
	{
		if (has_post_thumbnail()) {
			if ($do_wrap_in_post_link) echo '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">';
			else {
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
				echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '">';
			}
			the_post_thumbnail('large');
			echo '</a>';
		}
	}
}
	
function el_content($wrap_thumb_in_post_link=false) 
{
?>
	<div class="thumbnail featured-image">
		<?php if (has_post_thumbnail()) : ?>
			<?php el_content_thumbnail($wrap_thumb_in_post_link); ?>
			<meta itemprop="thumbnailURL" content="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" />
		<?php endif; ?>
	</div>

	<div class="entry" itemprop="text">
		<?php the_content(_text('read-more')); ?>
	</div>
<?php
}

if ( ! function_exists( 'el_comment_nav' ) ) {
	function el_comment_nav() 
	{
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<div class="nav-links">
				<?php
					if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'twentyfifteen' ) ) ) {
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					}

					if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'twentyfifteen' ) ) ) {
						printf( '<div class="nav-next">%s</div>', $next_link );
					}
				?>
			</div>
		</nav>
		<?php
		endif;
	}
}

function el_menu($menu_name='primary', $parse_fn=null) 
{
    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items($menu->term_id);
		$out = '';
		foreach ( (array) $menu_items as $key => $menu_item ) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			if ($parse_fn != null) {
				$parse_fn($menu_item);
			}
			else {
				echo '<li><a href="' . $url . '" title="' . $title . '">' . $title . '</a></li>';
			}
		}
		echo ($parse_fn != null ? $out : '<ul id="menu-' . $menu_name . '">' . $out . '</ul>');
	} 
	else {
		echo '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
    }
}

function el_sidebar($name) 
{
	if (is_active_sidebar($name)) {
		dynamic_sidebar($name);
		return true;
	}
	else {
		return false;
	}
}

function el_sidebar_main() 
{
	return el_sidebar('sidebar-main');
}

function el_sidebar_footer() 
{
	return el_sidebar('sidebar-footer');
}

function el_sidebar_top_menu() 
{
	return el_sidebar('sidebar-top-menu');
}

function el_sidebar_header_front() 
{
	return el_sidebar('sidebar-header-page-front');
}

function el_sidebar_header_blog() 
{
	return el_sidebar('sidebar-header-page-blog');
}

function el_sidebar_header() 
{
	return el_sidebar('sidebar-header-other');
}

?>
