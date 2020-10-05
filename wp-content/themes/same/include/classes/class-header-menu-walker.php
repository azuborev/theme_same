<?php
/**
 * Header Menu Walker file.
 *
 * @package files.
 */

/**
 * Class Header_Menu_Walker
 */
class Header_Menu_Walker extends Walker_Nav_Menu {
	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string $output used to append additional content.
	 * @param int    $depth - depth of the item.
	 * @param array  $args - an array of additional arguments.
	 */
	public function start_lvl( &$output = '', $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n $indent<div class = 'submenu' ><ul> \n";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @param string $output used to append additional content.
	 * @param int    $depth - depth of the item.
	 * @param array  $args - an array of additional arguments.
	 */
	public function end_lvl( &$output = '', $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "$indent</ul></div>\n";
	}
}
