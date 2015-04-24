<?php

function intro_shortcode( $atts, $content = null ) {
	return '<div class="intro-paragraph">' . $content . '</div>';
}
add_shortcode('intro', 'intro_shortcode');

?>
