<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Xmas_Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function xmas_lite_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    $page_layout = xmas_lite_get_page_layout();
    $classes[] = esc_attr($page_layout);

	return $classes;
}
add_filter( 'body_class', 'xmas_lite_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function xmas_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'xmas_lite_pingback_header' );
