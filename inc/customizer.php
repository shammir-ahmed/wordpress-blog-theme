<?php
/**
 * ModernBlog Theme Customizer
 *
 * @package ModernBlog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function modernblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'modernblog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'modernblog_customize_partial_blogdescription',
			)
		);
	}
	
	// Theme Options Panel
	$wp_customize->add_panel( 'modernblog_theme_options', array(
		'priority'       => 130,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'modernblog' ),
		'description'    => esc_html__( 'Customize your theme settings.', 'modernblog' ),
	) );
	
	// Colors Section
	$wp_customize->add_section( 'modernblog_colors', array(
		'title'       => esc_html__( 'Primary Colors', 'modernblog' ),
		'panel'       => 'modernblog_theme_options',
	) );
	
	$wp_customize->add_setting( 'primary_color', array(
		'default'           => '#0056b3',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label'    => esc_html__( 'Primary Theme Color', 'modernblog' ),
		'section'  => 'modernblog_colors',
	) ) );
}
add_action( 'customize_register', 'modernblog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function modernblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function modernblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function modernblog_customize_preview_js() {
	// Enqueue would go here if we had customizer.js
}
add_action( 'customize_preview_init', 'modernblog_customize_preview_js' );
