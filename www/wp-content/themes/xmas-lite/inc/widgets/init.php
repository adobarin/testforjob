<?php

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widget-sidebars.php';

/* Theme Widgets*/
require get_template_directory() . '/inc/widgets/tab-posts.php';
require get_template_directory() . '/inc/widgets/author-info.php';
require get_template_directory() . '/inc/widgets/social-menu.php';

/* Register site widgets */
if ( ! function_exists( 'xmas_lite_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function xmas_lite_widgets() {
        register_widget( 'Xmas_Lite_Tab_Posts' );
        register_widget( 'Xmas_Lite_Author_Info' );
        register_widget( 'Xmas_Lite_Social_Menu' );
    }
endif;
add_action( 'widgets_init', 'xmas_lite_widgets' );
