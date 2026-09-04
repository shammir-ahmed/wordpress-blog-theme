<?php
/**
 * ModernBlog functions and definitions
 *
 * @package ModernBlog
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
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

		// Register menus
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Menu', 'modernblog' ),
				'footer' => esc_html__( 'Footer Menu', 'modernblog' ),
			)
		);

		// Switch default core markup to output valid HTML5.
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
		add_theme_support( 'custom-background', apply_filters( 'modernblog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

        // Gutenberg support
        add_theme_support( 'align-wide' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'responsive-embeds' );
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
 * Enqueue scripts and styles.
 */
function modernblog_scripts() {
	wp_enqueue_style( 'modernblog-style', get_stylesheet_uri(), array(), _S_VERSION );
	// Add modern fonts
    wp_enqueue_style( 'modernblog-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@400;600;700&display=swap', array(), null );

	wp_enqueue_script( 'modernblog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'modernblog_scripts' );

// Include Customizer
// require get_template_directory() . '/inc/customizer.php';

// Include Widgets
// require get_template_directory() . '/inc/widgets.php';
