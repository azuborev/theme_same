<?php
/**
 * same functions and definitions
 * @package same
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'same_setup' ) ) :

	function same_setup() {
        load_theme_textdomain('same', get_template_directory() . '/languages');
        add_theme_support('post-thumbnails');
        register_nav_menus(
            [
                'menu-1' => esc_html__('Primary', 'same'),
            ]
        );

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

        add_theme_support('custom-logo');
    }

endif;

add_action( 'after_setup_theme', 'same_setup' );

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
    wp_enqueue_script( 'same-prettyphoto', get_template_directory_uri() . '/assets/js/jquery.prettyphoto.min.js', ['same-jquery'], false, true );
    wp_enqueue_script( 'same-stylesheettoggle', get_template_directory_uri() . '/assets/js/jquery.stylesheettoggle.js', ['same-jquery'], false, true );
    wp_enqueue_script( 'same-onload', get_template_directory_uri() . '/assets/js/onload.js', ['same-jquery', 'same-prettyphoto'], false, true );
}
add_action( 'wp_enqueue_scripts', 'same_scripts' );


