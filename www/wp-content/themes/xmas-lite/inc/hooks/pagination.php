<?php 

if ( ! function_exists( 'xmas_lite_display_posts_navigation' ) ) :

	/**
	 * Display Pagination.
	 *
	 * @since 1.0.0
	 */
	function xmas_lite_display_posts_navigation() {

        $pagination_type = xmas_lite_get_option( 'pagination_type', true );
        switch ( $pagination_type ) {

            case 'default':
                the_posts_navigation();
                break;

            case 'numeric':
                the_posts_pagination();
                break;

            default:
                break;
        }
		return;
	}

endif;

add_action( 'xmas_lite_posts_navigation', 'xmas_lite_display_posts_navigation' );
