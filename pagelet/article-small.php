<article id="post-<?php the_ID(); ?>" class="post type-small" itemscope itemtype="http://schema.org/Article">

	<?php el_title('h2'); ?>
	
	<small><?php el_publish_date(); ?> by <?php el_author_link(); ?></small>
	
	<?php el_categories(); ?>

	<?php el_content(true); ?>
	
</article>