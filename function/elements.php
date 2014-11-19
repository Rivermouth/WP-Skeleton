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
