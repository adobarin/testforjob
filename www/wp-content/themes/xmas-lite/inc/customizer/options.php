<?php

/*Get default values to set while building customizer elements*/
$default_options = xmas_lite_get_default_customizer_values();

/*Add Homepage Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Homepage Options', 'xmas-lite' ),
        'description' => __( 'Contains all homepage settings', 'xmas-lite')
    )
);
/**/

/* ========== Home Page Trending Posts Section ========== */
$wp_customize->add_section(
    'home_trending_posts_options' ,
    array(
        'title' => __( 'Trending Post Options', 'xmas-lite' ),
        'panel' => 'theme_home_option_panel',
    )
);

/*Enable Trending Posts Section*/
$wp_customize->add_setting(
    'theme_options[enable_trending_posts]',
    array(
        'default'           => $default_options['enable_trending_posts'],
        'sanitize_callback' => 'xmas_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[enable_trending_posts]',
    array(
        'label'    => __( 'Enable Trending Posts', 'xmas-lite' ),
        'section'  => 'home_trending_posts_options',
        'type'     => 'checkbox',
    )
);

/*Trending Posts Title.*/
$wp_customize->add_setting(
    'theme_options[trending_posts_title]',
    array(
        'default'           => $default_options['trending_posts_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'theme_options[trending_posts_title]',
    array(
        'label'    => __( 'Trending posts Title', 'xmas-lite' ),
        'section'  => 'home_trending_posts_options',
        'type'     => 'text',
    )
);
/**/

/*Trending Posts Category.*/
$wp_customize->add_setting(
    'theme_options[trending_posts_cat]',
    array(
        'default'           => $default_options['trending_posts_cat'],
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Xmas_Lite_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[trending_posts_cat]',
        array(
            'label'    => __( 'Choose Trending posts category', 'xmas-lite' ),
            'section'  => 'home_trending_posts_options',
        )
    )
);
/**/

/* ========== Home Page Trending Posts Section Close========== */

/*Add Theme Options Panel.*/
$wp_customize->add_panel(
    'theme_option_panel',
    array(
        'title' => __( 'Theme Options', 'xmas-lite' ),
        'description' => __( 'Contains all theme settings', 'xmas-lite')
    )
);
/**/

/* ========== Top Bar Section. ==========*/
$wp_customize->add_section(
    'top_bar_options',
    array(
        'title'      => __( 'TopBar Options', 'xmas-lite' ),
        'panel'      => 'theme_option_panel',
    )
);

/*Show Top Bar*/
$wp_customize->add_setting(
    'theme_options[show_top_bar]',
    array(
        'default'           => $default_options['show_top_bar'],
        'sanitize_callback' => 'xmas_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[show_top_bar]',
    array(
        'label'    => __( 'Show TopBar', 'xmas-lite' ),
        'section'  => 'top_bar_options',
        'type'     => 'checkbox',
    )
);

/* ========== Top Bar Section Close========== */


/* ========== Layout Section ========== */
$wp_customize->add_section(
    'layout_options',
    array(
        'title'      => __( 'Layout Options', 'xmas-lite' ),
        'panel'      => 'theme_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'theme_options[global_layout]',
    array(
        'default'           => $default_options['global_layout'],
        'sanitize_callback' => 'xmas_lite_sanitize_select',
    )
);
$wp_customize->add_control(
    'theme_options[global_layout]',
    array(
        'label'       => __( 'Global Layout', 'xmas-lite' ),
        'section'     => 'layout_options',
        'type'        => 'select',
        'choices'     => array(
            'right-sidebar' => __( 'Content - Primary Sidebar', 'xmas-lite' ),
            'left-sidebar' => __( 'Primary Sidebar - Content', 'xmas-lite' ),
            'no-sidebar' => __( 'No Sidebar', 'xmas-lite' )
        ),
    )
);

/* ========== Layout Section Close ========== */

/* ========== Pagination Section ========== */
$wp_customize->add_section(
    'pagination_options',
    array(
        'title'      => __( 'Pagination Options', 'xmas-lite' ),
        'panel'      => 'theme_option_panel',
    )
);

/*Pagination Type*/
$wp_customize->add_setting( 
    'theme_options[pagination_type]',
    array(
        'default'           => $default_options['pagination_type'],
        'sanitize_callback' => 'xmas_lite_sanitize_select',
    )
);
$wp_customize->add_control( 
    'theme_options[pagination_type]',
    array(
        'label'       => __( 'Pagination Type', 'xmas-lite' ),
        'section'     => 'pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => esc_html__( 'Default (Older / Newer Post)', 'xmas-lite' ),
            'numeric' => esc_html__( 'Numeric', 'xmas-lite' ),
        ),
    )
);
/* ========== Pagination Section Close========== */

/* ========== Breadcrumb Section ========== */
$wp_customize->add_section(
    'breadcrumb_options',
    array(
        'title'      => __( 'Breadcrumb Options', 'xmas-lite' ),
        'panel'      => 'theme_option_panel',
    )
);

/* Breadcrumb Type*/
$wp_customize->add_setting(
    'theme_options[breadcrumb_type]',
    array(
        'default'           => $default_options['breadcrumb_type'],
        'sanitize_callback' => 'xmas_lite_sanitize_select',
    )
);
$wp_customize->add_control(
    'theme_options[breadcrumb_type]',
    array(
        'label'       => __( 'Breadcrumb Type', 'xmas-lite' ),
        'description' => sprintf( esc_html__( 'Advanced: Requires %1$sBreadcrumb NavXT%2$s plugin', 'xmas-lite' ), '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">','</a>' ),
        'section'     => 'breadcrumb_options',
        'type'        => 'select',
        'choices'     => array(
            'disabled' => __( 'Disabled', 'xmas-lite' ),
            'simple' => __( 'Simple', 'xmas-lite' ),
            'advanced' => __( 'Advanced', 'xmas-lite' ),
        ),
    )
);
/* ========== Breadcrumb Section Close ========== */

/* ========== Excerpt Section ========== */
$wp_customize->add_section(
    'excerpt_options',
    array(
        'title'      => __( 'Excerpt Options', 'xmas-lite' ),
        'panel'      => 'theme_option_panel',
    )
);

/* Excerpt Length */
$wp_customize->add_setting(
    'theme_options[excerpt_length]',
    array(
        'default'           => $default_options['excerpt_length'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'theme_options[excerpt_length]',
    array(
        'label'       => __( 'Excerpt Length', 'xmas-lite' ),
        'section'     => 'excerpt_options',
        'type'        => 'number',
    )
);

/* Excerpt Read More Text */
$wp_customize->add_setting(
    'theme_options[excerpt_read_more_text]',
    array(
        'default'           => $default_options['excerpt_read_more_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'theme_options[excerpt_read_more_text]',
    array(
        'label'       => __( 'Read More Text', 'xmas-lite' ),
        'section'     => 'excerpt_options',
        'type'        => 'text',
    )
);
/* ========== Excerpt Section Close ========== */

/* ========== Footer Section ========== */
$wp_customize->add_section(
    'footer_options' ,
    array(
        'title' => __( 'Footer Options', 'xmas-lite' ),
        'panel' => 'theme_option_panel',
    )
);
/*Copyright Text.*/

/*Enable Posts Gallery Section*/
$wp_customize->add_setting(
    'theme_options[enable_posts_gallery]',
    array(
        'default'           => $default_options['enable_posts_gallery'],
        'sanitize_callback' => 'xmas_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[enable_posts_gallery]',
    array(
        'label'    => __( 'Enable Posts Gallery', 'xmas-lite' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/* Posts Gallery Category.*/
$wp_customize->add_setting(
    'theme_options[posts_gallery_cat]',
    array(
        'default'           => $default_options['posts_gallery_cat'],
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Xmas_Lite_Dropdown_Taxonomies_Control(
        $wp_customize,
        'theme_options[posts_gallery_cat]',
        array(
            'label'    => __( 'Choose posts gallery category', 'xmas-lite' ),
            'section'  => 'footer_options',
        )
    )
);
/**/

$wp_customize->add_setting(
    'theme_options[copyright_text]',
    array(
        'default'           => $default_options['copyright_text'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport'           => 'postMessage',
    )
);
$wp_customize->add_control(
    'theme_options[copyright_text]',
    array(
        'label'    => __( 'Copyright Text', 'xmas-lite' ),
        'section'  => 'footer_options',
        'type'     => 'textarea',
    )
);
/* ========== Footer Section Close========== */

/*Homepage Settings - Show static page content.*/
$wp_customize->add_setting(
    'theme_options[show_static_page_content]',
    array(
        'default'           => $default_options['show_static_page_content'],
        'sanitize_callback' => 'xmas_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'theme_options[show_static_page_content]',
    array(
        'label'    => esc_html__( 'Show Static Page Content', 'xmas-lite' ),
        'section'  => 'static_front_page',
        'type'     => 'checkbox',
    )
);