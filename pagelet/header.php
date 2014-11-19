<div id="header">
	
	<?php 

	if (is_front_page()) {
		?><div class="header-front-page"><?php
		el_sidebar_header_front();
		?></div><?php
	}
	else if (is_home()) {
		?><div class="header-blog-page"><?php
		el_sidebar_header_blog();
		?></div><?php
	}
	else {
		?><div class="header-other-page"><?php
		el_sidebar_header();
		?></div><?php
	}

	?>
	
	<div id="menu-top">
		<?php el_sidebar_top_menu(); ?>
	</div>
</div>
