<?php
/**
 * Shortcode file.
 *
 * @package same.
 */

/**
 *
 * Function for add html tag.
 *
 * @param array $atts attributes for shortcode.
 *
 * @param null  $content content in shortcode.
 * @return string
 */
function wrap_text_in_tag( $atts = array(), $content = null ) {
	$atts = shortcode_atts(
		array(
			'tag' => 'q',
		),
		$atts
	);
	return '<' . $atts['tag'] . '>' . $content . '</' . $atts['tag'] . '>';
}
add_shortcode( 'same-tag', 'wrap_text_in_tag' );
