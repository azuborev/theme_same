<?php
function wrap_text_in_tag($atts, $content= null) {
	$atts = shortcode_atts( [
		'tag'=> 'q',
	], $atts );
	return '<'.$atts['tag'].'>'.$content.'</'.$atts['tag'].'>';
}
add_shortcode('same-tag', 'wrap_text_in_tag');
