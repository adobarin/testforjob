<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function xmas_lite_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'xmas-lite'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Displays items on sidebar.', 'xmas-lite'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="saga-title-wrapper saga-title-wrapper-2"><h2 class="widget-title saga-title saga-title-small">',
        'after_title' => '</h2></div>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Column One', 'xmas-lite'),
        'id' => 'footer-col-one',
        'description' => esc_html__('Displays items on footer first column.', 'xmas-lite'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Column Two', 'xmas-lite'),
        'id' => 'footer-col-two',
        'description' => esc_html__('Displays items on footer second column.', 'xmas-lite'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Column Three', 'xmas-lite'),
        'id' => 'footer-col-three',
        'description' => esc_html__('Displays items on footer third column.', 'xmas-lite'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'xmas_lite_widgets_init');