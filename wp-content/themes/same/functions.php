<?php
/**
 * Same functions and definitions
 *
 * @link https://same.com
 *
 * @package same
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'same_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features..
	 */
	function same_setup() {
		add_theme_support( 'custom-logo' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		load_theme_textdomain( 'same', get_template_directory() . '/languages' );
		register_nav_menus(
			array(
				'menu-header' => esc_html__( 'Menu in header', 'same' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'same_setup' );
/**
 * Enqueue scripts and styles.
 */
function same_scripts() {
	wp_enqueue_style( 'same-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'same-light_style', get_template_directory_uri() . '/assets/css/light.css', array(), _S_VERSION );
	wp_style_add_data( 'same-light_style', 'title', __( 'light', 'same' ) );
	wp_enqueue_style( 'same-dark_style', get_template_directory_uri() . '/assets/css/dark.css', array(), _S_VERSION );
	wp_style_add_data( 'same-dark_style', 'alt', true );
	wp_style_add_data( 'same-dark_style', 'title', __( 'dark', 'same' ) );
	wp_enqueue_style( 'same-flexslider_style', get_template_directory_uri() . '/assets/css/flexslider.css', array(), _S_VERSION );
	wp_enqueue_style( 'same-prettyPhoto_style', get_template_directory_uri() . '/assets/css/prettyPhoto.css', array(), _S_VERSION );
	wp_enqueue_style( 'same-reset_style', get_template_directory_uri() . '/assets/css/reset.css', array(), _S_VERSION );
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'same-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'same-jquery-ui', get_template_directory_uri() . '/assets/js/jquery.ui.min.js', array( 'same-jquery' ), _S_VERSION, true );
	wp_enqueue_script( 'same-flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.min.js', array( 'same-jquery' ), _S_VERSION, true );
	wp_enqueue_script( 'same-prettyphoto', get_template_directory_uri() . '/assets/js/jquery.prettyphoto.min.js', array( 'same-jquery' ), _S_VERSION, true );
	wp_enqueue_script( 'same-stylesheettoggle', get_template_directory_uri() . '/assets/js/jquery.stylesheettoggle.js', array( 'same-jquery' ), _S_VERSION, true );
	wp_enqueue_script( 'same-onload', get_template_directory_uri() . '/assets/js/onload.js', array( 'same-jquery', 'same-prettyphoto' ), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'same_scripts' );
/**
 * Register widget area.
 */
function same_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'same' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'same' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'same_widgets_init' );
/**
 * Add tag <span> in menu-header.
 *
 * @param string $title title in menu.
 *
 * @return string in tag <span>.
 */
function filter_nav_menu_item_title( $title ) {
	return '<span>' . $title . '</span>';
}
add_filter( 'nav_menu_item_title', 'filter_nav_menu_item_title' );

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
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n $indent<div class = 'submenu' ><ul> \n";
	}

	/**
	 * Ends the list of after the elements are added.
	 *
	 * @param string $output used to append additional content.
	 * @param int    $depth - depth of the item.
	 * @param array  $args - an array of additional arguments.
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "$indent</ul></div>\n";
	}
}
