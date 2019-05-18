<?php
/**
 * Default customizer values.
 *
 * @package Xmas_Lite
 */
if ( ! function_exists( 'xmas_lite_get_default_customizer_values' ) ) :
	/**
	 * Get default customizer values.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default customizer values.
	 */
	function xmas_lite_get_default_customizer_values() {

		$defaults = array();

        $defaults['enable_trending_posts'] = false;
        $defaults['trending_posts_title'] = __('Trending Now','xmas-lite');
        $defaults['trending_posts_cat'] = 1;

        // Top Bar.
        $defaults['show_top_bar']   = true;

        // Global Layout
        $defaults['global_layout'] = 'right-sidebar';

        //Pagination
        $defaults['pagination_type'] = 'default';

        //BreadCrumbs
        $defaults['breadcrumb_type'] = 'simple';

        //Excerpt
        $defaults['excerpt_length'] = 40;
        $defaults['excerpt_read_more_text'] = __( 'Read More' , 'xmas-lite');

		// Footer.
		$defaults['copyright_text'] = esc_html__( 'Copyright &copy; All rights reserved.', 'xmas-lite' );
        $defaults['enable_posts_gallery'] = false;
        $defaults['posts_gallery_cat']  = 1;

        //Homepage Settings
        $defaults['show_static_page_content'] = true;

		$defaults = apply_filters( 'xmas_lite_default_customizer_values', $defaults );
		return $defaults;
	}
endif;
