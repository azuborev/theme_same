<?php
/**
 * Custom Category Walker file.
 *
 * @package files.
 */

/**
 * Class Walker_Category_Custom
 */
class Walker_Category_Custom extends Walker_Category {
	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string $output Used to append additional content. Passed by reference.
	 * @param int    $depth Depth of category.
	 * @param array  $args An array of arguments.
	 */
	public function start_lvl( &$output = '', $depth = 0, $args = array() ) {
		$output .= "\n<ul>\n";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @param string $output Used to append additional content. Passed by reference.
	 * @param int    $depth Depth of category. Used for tab indentation.
	 * @param array  $args An array of arguments.
	 */
	public function end_lvl( &$output = '', $depth = 0, $args = array() ) {
		$output .= "</ul>\n";
	}

	/**
	 * Starts the element output.
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param object $item Category data object.
	 * @param int    $depth Depth of category in reference to parents.
	 * @param array  $args An array of arguments.
	 * @param int    $current_object_id ID of the current category.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$output .= '<li><a href="' . home_url( $item->taxonomy . '/' . $item->slug ) . '">' . $item->name . ' (' . $item->category_count . ')</a>';
	}

	/**
	 * Ends the element output, if needed.
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param object $item Not used.
	 * @param int    $depth Depth of category. Not used.
	 * @param array  $args An array of arguments.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</a></li>\n";
	}
}
