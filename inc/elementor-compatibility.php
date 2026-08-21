<?php
/**
 * Elementor Compatibility File.
 *
 * @package ModernBlog
 */

/**
 * Register Elementor locations if Elementor Pro is active.
 */
function modernblog_register_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'modernblog_register_elementor_locations' );

/**
 * Remove default theme padding/margins when Elementor full-width template is used.
 */
function modernblog_elementor_body_classes( $classes ) {
	if ( function_exists( 'elementor_theme_do_location' ) ) {
		if ( is_page_template( 'elementor_header_footer' ) || is_page_template( 'elementor_canvas' ) ) {
			$classes[] = 'modernblog-elementor-active';
		}
	}
	return $classes;
}
add_filter( 'body_class', 'modernblog_elementor_body_classes' );
