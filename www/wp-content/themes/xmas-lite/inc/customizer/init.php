<?php
/**
 * Xmas Lite Theme Customizer
 *
 * @package Xmas_Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function xmas_lite_customize_register( $wp_customize ) {

    /*Load custom controls for customizer.*/
    require get_template_directory() . '/inc/customizer/controls.php';

    /*Load sanitization functions.*/
    require get_template_directory() . '/inc/customizer/sanitize.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'xmas_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'xmas_lite_customize_partial_blogdescription',
		) );
	}

    /*Register custom section types.*/
    $wp_customize->register_section_type( 'Xmas_Lite_Customize_Section_Upsell' );

    /*Register sections.*/
    $wp_customize->add_section(
        new Xmas_Lite_Customize_Section_Upsell(
            $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'Xmas Lite Pro', 'xmas-lite' ),
                'pro_text' => esc_html__( 'Buy Pro', 'xmas-lite' ),
                'pro_url'  => 'https://themesaga.com/theme/xmas-lite-pro/',
                'priority'  => 1,
            )
        )
    );

    /*Load customizer options.*/
    require get_template_directory() . '/inc/customizer/options.php';
}
add_action( 'customize_register', 'xmas_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function xmas_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function xmas_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function xmas_lite_customize_preview_js() {
	wp_enqueue_script(
	    'xmas-lite-themecustomizer',
        get_template_directory_uri() . '/js/customizer.js',
        array( 'jquery','customize-preview' ),
        '',
        true
    );
}
add_action( 'customize_preview_init', 'xmas_lite_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function xmas_lite_customizer_control_scripts(){
    wp_enqueue_style('xmas-lite-customizer-css', get_template_directory_uri() . '/assets/saga/css/admin.css');
}
add_action('customize_controls_enqueue_scripts', 'xmas_lite_customizer_control_scripts', 0);



