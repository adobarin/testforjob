<?php
/* Get Featured Image or Default Image */
if ( ! function_exists( 'xmas_lite_get_post_image' ) ) :
    /**
     * Returns image.
     *
     * @since 1.0.0
     *
     * @param bool  $post_id    Post ID.
     * @param string $size  Image size.
     * @param bool  $default True to return default image if thumbnail not found.
     * @return string Image Url.
     */
    function xmas_lite_get_post_image($post_id, $size = 'thumbnail', $default = true ) {
        $image = get_the_post_thumbnail_url( $post_id, $size );
        if(false == $default ){
            return $image;
        }else{
            if(empty($image)){
                if( 'xmas-lite-large-img' == $size){
                    $image = get_template_directory_uri().'/assets/images/no-image-2.png';
                }else{
                    $image = get_template_directory_uri().'/assets/images/no-image.png';
                }
            }
            return $image;
        }
    }
endif;

/* Display Breadcrumbs */
if ( ! function_exists( 'xmas_lite_get_breadcrumb' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     */
    function xmas_lite_get_breadcrumb() {

        if ( ! function_exists( 'breadcrumb_trail' ) ) {

            require_once get_template_directory() . '/assets/lib/breadcrumbs/breadcrumbs.php';
        }

        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );

    }

endif;

/* Change default excerpt length */
if ( ! function_exists( 'xmas_lite_excerpt_length' ) ) :

    /**
     * Change excerpt Length.
     *
     * @since 1.0.0
     */
    function xmas_lite_excerpt_length($excerpt_length) {
        $excerpt_length = xmas_lite_get_option('excerpt_length',true);
        return absint($excerpt_length);
    }

endif;
add_filter( 'excerpt_length', 'xmas_lite_excerpt_length', 999 );

/* Modify Excerpt Read More text */
if ( ! function_exists( 'xmas_lite_excerpt_more' ) ) :

    /**
     * Modify Excerpt Read More text.
     *
     * @since 1.0.0
     */
    function xmas_lite_excerpt_more($more) {
        global $post;
        $excerpt_read_more_text = xmas_lite_get_option('excerpt_read_more_text',true);
        return '<a class="moretag" href="'. esc_url(get_permalink($post->ID) ). '"> '.esc_html($excerpt_read_more_text).'</a>';
    }

endif;
add_filter('excerpt_more', 'xmas_lite_excerpt_more');

/* Get Page layout */
if ( ! function_exists( 'xmas_lite_get_page_layout' ) ) :

    /**
     * Get Page Layout based on the post meta or customizer value
     *
     * @since 1.0.0
     *
     * @return string Page Layout.
     */
    function xmas_lite_get_page_layout() {
        global $post;
        /*Fetch from Post Meta*/
        if ( $post && is_singular() ) {
            $page_layout = get_post_meta( $post->ID, 'xmas_lite_page_layout', true );
        }
        /*Fetch from customizer*/
        if(empty($page_layout)){
            $page_layout = xmas_lite_get_option('global_layout',true);
        }
        return $page_layout;
    }

endif;
