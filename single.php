<?php
/*
Single post
*/

	el_html_open();
	get_pagelet('header');
	?>
	<div id="center-block">
		<div id="main"><?php
		do_loop(function() {
			get_pagelet('article');
		});
		?></div><?php
	get_pagelet('sidebar');
	?></div><?php
	get_pagelet('footer');
	el_html_close();

?>
