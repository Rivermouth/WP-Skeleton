<?php
/**
 * Generic page, used if no other page template 
 * is used.
 */

	el_html_open();
	get_pagelet('header');
	?>
	<div id="center-block">
		<div id="main"><?php
		do_loop(function() {
			get_pagelet('page');
		});
		?></div><?php
	get_pagelet('sidebar');
	?></div><?php
	get_pagelet('footer');
	el_html_close();

?>
