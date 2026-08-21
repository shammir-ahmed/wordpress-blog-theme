<?php
/**
 * ModernBlog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ModernBlog
 */

if ( ! defined( 'MODERNBLOG_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'MODERNBLOG_VERSION', '1.1.0' );
}

if ( ! function_exists( 'modernblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function modernblog_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'modernblog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'modernblog' ),
				'menu-2' => esc_html__( 'Footer Menu', 'modernblog' ),
			)
		);

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'modernblog_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		
		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'modernblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function modernblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'modernblog_content_width', 800 );
}
add_action( 'after_setup_theme', 'modernblog_content_width', 0 );

/**
 * Register widget area.
 */
function modernblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'modernblog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'modernblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area', 'modernblog' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here for the footer.', 'modernblog' ),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'modernblog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function modernblog_scripts() {
	// Google Fonts
	wp_enqueue_style( 'modernblog-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap', array(), null );

	// Theme Stylesheet
	wp_enqueue_style( 'modernblog-style', get_stylesheet_uri(), array(), MODERNBLOG_VERSION );
	wp_enqueue_style( 'modernblog-main', get_template_directory_uri() . '/assets/css/main.css', array(), MODERNBLOG_VERSION );

	// Theme Scripts
	wp_enqueue_script( 'modernblog-navigation', get_template_directory_uri() . '/assets/js/main.js', array(), MODERNBLOG_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'modernblog_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Elementor Compatibility.
 */
require get_template_directory() . '/inc/elementor-compatibility.php';
