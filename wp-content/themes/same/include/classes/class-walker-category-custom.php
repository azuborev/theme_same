<?php

class Walker_Category_Custom extends Walker_Category {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "</ul>\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$output .= '<li><a href="' . home_url( $item->taxonomy . '/' . $item->slug ) . '">' . $item->name . ' (' . $item->category_count . ')</a>';
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</a></li>\n";
	}
}