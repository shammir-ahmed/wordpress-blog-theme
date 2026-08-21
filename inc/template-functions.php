<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ModernBlog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function modernblog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	} else {
		$classes[] = 'has-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'modernblog_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function modernblog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'modernblog_pingback_header' );

/**
 * Inject Primary Color Customizer CSS
 */
function modernblog_customizer_css() {
	$primary_color = get_theme_mod( 'primary_color', '#0056b3' );
	?>
	<style type="text/css">
		:root {
			--primary-color: <?php echo esc_attr( $primary_color ); ?>;
		}
		a { color: var(--primary-color); }
		a:hover { color: color-mix(in srgb, var(--primary-color) 80%, black); }
		.btn-primary { background-color: var(--primary-color); border-color: var(--primary-color); }
	</style>
	<?php
}
add_action( 'wp_head', 'modernblog_customizer_css' );
