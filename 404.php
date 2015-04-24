<?php
/*
404 page
*/

	el_html_open();
	get_pagelet('header');
	?>
	<div id="center-block">
		<div id="main">
			<h1>404</h1>
			<?php echo _text('404'); ?>
		</div><?php
	get_pagelet('sidebar');
	?></div><?php
	get_pagelet('footer');
	el_html_close();

?>
