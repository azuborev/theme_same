<?php
/**
 * Shortcode file.
 *
 * @package same.
 */

/**
 * Add link in text.
 *
 * @param array $atts attributes for shortcode.
 *
 * @return string
 */
function add_link_in_text( array $atts ) {
	$atts = shortcode_atts(
		array(
			'link'   => '#',
			'anchor' => 'read more..',
		),
		$atts
	);
	return '<a href="' . $atts['link'] . '">' . $atts['anchor'] . '</a>';
}
add_shortcode( 'same-link', 'add_link_in_text' );
