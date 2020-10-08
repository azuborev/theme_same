<?php
/**
 * File with main-functions.
 *
 * @package files.
 */

/**
 * Same functions and definitions
 *
 * @package same
 */

require_once __DIR__ . '/include/widgets/class-same-widget-social-links.php';
require_once __DIR__ . '/include/widgets/class-same-widget-text.php';
require_once __DIR__ . '/include/widgets/class-same-widget-contacts.php';
require_once __DIR__ . '/include/widgets/class-same-widget-category-list.php';
require_once __DIR__ . '/include/widgets/class-same-widget-recent-posts.php';

require_once __DIR__ . '/include/classes/class-header-menu-walker.php';
require_once __DIR__ . '/include/classes/class-walker-category-custom.php';

require_once __DIR__ . '/include/shortcodes/shortcode-link.php';
require_once __DIR__ . '/include/shortcodes/shortcode-tag.php';

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'same_setup' ) ) {

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
				'menu-header' => __( 'Menu in header', 'same' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'same_setup' );
/**
 * Enqueue scripts and styles.
 */
function same_scripts() {
	wp_enqueue_style( 'same-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'same-google-fonts', 'https://fonts.googleapis.com/css?family=Crete+Round', array(), _S_VERSION );
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
	if ( is_post_type_archive( 'cases' ) ) {
		wp_enqueue_script( 'same-quicksand', get_template_directory_uri() . '/assets/js/jquery.quicksand.js', array( 'same-jquery' ), _S_VERSION, true );
	}
	wp_enqueue_script( 'same-onload', get_template_directory_uri() . '/assets/js/onload.js', array( 'same-jquery', 'same-prettyphoto' ), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'same_scripts' );
/**
 * Register area for sidebar, widget.
 */
function same_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar: aside', 'same' ),
			'id'            => 'same-sidebar-aside',
			'description'   => __( 'Add widgets here.', 'same' ),
			'before_widget' => '<div class="padd16bot">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Sidebar: social links', 'same' ),
			'id'            => 'same-header-icons',
			'before_widget' => null,
			'after_widget'  => null,
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Sidebar in footer - after columns', 'same' ),
			'id'            => 'same-footer-after-col',
			'before_widget' => null,
			'after_widget'  => null,
		)
	);
	$sidebar_num = 4;
	set_same_sidebar_footer( $sidebar_num );

	register_widget( 'same_widget_social_links' );
	register_widget( 'same_widget_text' );
	register_widget( 'same_widget_contacts' );
	register_widget( 'same_widget_category_list' );
	register_widget( 'same_widget_recent_posts' );
}
add_action( 'widgets_init', 'same_widgets_init' );

/**
 * Register array of area for sidebar in footer.
 *
 * @param integer $num sidebar's number.
 */
function set_same_sidebar_footer( int $num ) {
	$name = __( 'Sidebar in footer ', 'same' );
	for ( $i = 1; $i <= $num; $i++ ) {
		register_sidebar(
			array(
				'name'          => $name . $i,
				'id'            => 'same-footer-col-' . $i,
				'before_widget' => null,
				'after_widget'  => null,
				'before_title'  => '<h3>',
				'after_title'   => '</h3>',
			)
		);
	}
}

/**
 * Add shortcode for excerpt.
 *
 * @param string $post_excerpt The post excerpt.
 * @return string
 */
function custom_shortcode_title( $post_excerpt = '' ) {
	return do_shortcode( $post_excerpt );
}
add_filter( 'get_the_excerpt', 'custom_shortcode_title' );
