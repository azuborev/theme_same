<?php
/**
 * Custom Category Walker file.
 *
 * @file changes categories output.
 *
 * @package same.
 */

/**
 * Class Walker_Category_Custom
 */
class Walker_Category_Custom extends Walker_Category {
	/**
	 *
	 * @param string $output
	 * @param int $depth
	 * @param array $args
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul>\n";
	}

	/**
	 * @param string $output
	 * @param int $depth
	 * @param array $args
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "</ul>\n";
	}

	/**
	 * @param string $output
	 * @param object $item
	 * @param int $depth
	 * @param array $args
	 * @param int $current_object_id
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$output .= '<li><a href="' . home_url( $item->taxonomy . '/' . $item->slug ) . '">' . $item->name . ' (' . $item->category_count . ')</a>';
	}

	/**
	 * @param string $output
	 * @param object $item
	 * @param int $depth
	 * @param array $args
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</a></li>\n";
	}
}