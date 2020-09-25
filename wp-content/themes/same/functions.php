<?php
/**
 * same functions and definitions
 * @package same
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'same_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function same_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on same, use a find and replace
		 * to change 'same' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'same', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			    [
				'menu-1' => esc_html__( 'Primary', 'same' ),
			]
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			]
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'same_custom_background_args',
				[
					'default-color' => 'ffffff',
					'default-image' => '',
				]
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'same_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function same_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'same_content_width', 640 );
}
add_action( 'after_setup_theme', 'same_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function same_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Sidebar', 'same' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'same' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);
}
add_action( 'widgets_init', 'same_widgets_init' );







/**
 * Enqueue scripts and styles.
 */
function same_scripts() {
	wp_enqueue_style( 'same-style', get_stylesheet_uri(), [], _S_VERSION );
    wp_enqueue_style( 'same-light_style', get_template_directory_uri().'/assets/css/light.css', [], _S_VERSION );
    wp_style_add_data('same-light_style', 'title', __('light', 'same'));
    wp_enqueue_style( 'same-dark_style', get_template_directory_uri().'/assets/css/dark.css', [], _S_VERSION );
    wp_style_add_data('same-dark_style', 'alt', true);
    wp_style_add_data('same-dark_style', 'title', __('dark', 'same'));
    wp_enqueue_style( 'same-flexslider_style', get_template_directory_uri().'/assets/css/flexslider.css', [], _S_VERSION );
    wp_enqueue_style( 'same-prettyPhoto_style', get_template_directory_uri().'/assets/css/prettyPhoto.css', [], _S_VERSION );
    wp_enqueue_style( 'same-reset_style', get_template_directory_uri().'/assets/css/reset.css', [], _S_VERSION );

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'same-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', [], false, true );
    wp_enqueue_script( 'same-jquery-ui', get_template_directory_uri() . '/assets/js/jquery.ui.min.js', ['same-jquery'], false, true );
    wp_enqueue_script( 'same-flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.min.js', ['same-jquery'], false, true );
    wp_enqueue_script( 'same-stylesheettoggle', get_template_directory_uri() . '/assets/js/jquery.stylesheettoggle.js', ['same-jquery'], false, true );
    wp_enqueue_script( 'same-onload', get_template_directory_uri() . '/assets/js/onload.js', ['same-jquery'], false, true );
}
add_action( 'wp_enqueue_scripts', 'same_scripts' );


