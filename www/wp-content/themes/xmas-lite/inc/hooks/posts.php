<?php
if (!function_exists('xmas_lite_display_trending_posts')) :
    /**
     * Trending Post.
     *
     * @since 1.0.0
     */
    function xmas_lite_display_trending_posts()
    {
        $enable_trending_posts = xmas_lite_get_option('enable_trending_posts',true);
        $trending_posts_cat = xmas_lite_get_option('trending_posts_cat',true);
        $trending_posts_title = xmas_lite_get_option('trending_posts_title',true);
        if ( $enable_trending_posts ) {
            if (!empty($trending_posts_cat)) {
                $post_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => $trending_posts_cat,
                        ),
                    ),
                );
                $trending_post = new WP_Query($post_args);
                if ($trending_post->have_posts()):
                    ?>
                    <section class="section-block section-trend">
                        <div class="container">
                            <div class="row">
                                <?php
                                if ( !empty($trending_posts_title) ) {
                                ?>
                                <div class="col-sm-12">
                                    <div class="saga-title-wrapper saga-title-wrapper-1">
                                        <h2 class="saga-title">
                                            <span class="primary-background">
                                                <?php echo $trending_posts_title; ?>
                                            </span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                <div class="saga-slide">
                                <?php
                                }
                                ?>
                                <?php while ($trending_post->have_posts()):$trending_post->the_post(); ?>

                                    <div class="slide item">
                                        <div class="trending-item-content primary-background border-overlay">
                                            <a href="<?php the_permalink(); ?>" class="bg-image bg-image-1 bg-opacity">
                                                <?php
                                                    $image = xmas_lite_get_post_image(get_the_ID(),'xmas-lite-small-img');
                                                    echo '<img class="trending-post-img" src="' . esc_url($image ). '">';
                                                ?>
                                            </a>
                                            <div class="post-content border-overlay-content">
                                                <div class="post-cat primary-font">
                                                    <?php
                                                    $categories = get_the_category();
                                                    $separator = ', ';
                                                    $output = '';
                                                    if ( ! empty( $categories ) ) {
                                                        foreach( $categories as $category ) {
                                                            if($category->term_id != 1 ){
                                                                $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'xmas-lite' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                                                            }
                                                        }
                                                        echo trim( $output, $separator );
                                                    }
                                                    ?>
                                                </div>
                                                <h2 class="entry-title entry-title-1">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                endif;
            }
        }
    }
endif;
add_action('xmas_lite_display_posts', 'xmas_lite_display_trending_posts', 10);

if (!function_exists('xmas_lite_latest_posts')) :
    /**
     * Latest Posts
     *
     * @since 1.0.0
     */
    function xmas_lite_latest_posts()
    {
        if( is_front_page() && is_home() ){
            if ( 'posts' == get_option( 'show_on_front' ) ) {
                echo '<section class="section-block section-latest-block"><div class="container">';
                include( get_home_template() );
                echo '</div></section>';
            }
        }
    }
endif;
add_action('xmas_lite_before_footer', 'xmas_lite_latest_posts', 10);

if (!function_exists('xmas_lite_static_page_content')) :
    /**
     * Static Page Content
     *
     * @since 1.0.0
     */
    function xmas_lite_static_page_content()
    {
        if( is_front_page() ){
            if ( 'page' == get_option( 'show_on_front' ) ) {
                $show_static_page_content = xmas_lite_get_option('show_static_page_content', true);
                if ($show_static_page_content) {
                    echo '<div class="container">'
                    ?>
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <?php
                            while (have_posts()) : the_post();
                                get_template_part('template-parts/content', 'page');
                            endwhile;
                            ?>
                        </main>
                    </div>
                    <?php
                    get_sidebar();
                    echo '</div>';
                }
            }
        }
    }
endif;
add_action('xmas_lite_before_footer', 'xmas_lite_static_page_content', 20);

if (!function_exists('xmas_lite_post_gallery')) :
    /**
     * Static Page Content
     *
     * @since 1.0.0
     */
    function xmas_lite_post_gallery()
    {
        $enable_posts_gallery = xmas_lite_get_option('enable_posts_gallery',true);
        $posts_gallery_cat = xmas_lite_get_option('posts_gallery_cat',true);
        if ( $enable_posts_gallery ) {
            if (!empty($posts_gallery_cat)) {
                $post_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 12,
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => $posts_gallery_cat,
                        ),
                    ),
                );
                $post_gallery = new WP_Query($post_args);
                if ($post_gallery->have_posts()):
                    ?>
                    <div class="footer-galler-slider">
                        <div class="gallery-slide">
                        <?php while ($post_gallery->have_posts()):$post_gallery->the_post();?>
                           <div class="trending-item-content primary-background border-overlay zoom-gallery">
                               <figure>
                                   <?php
                                   $small_image = xmas_lite_get_post_image(get_the_ID(),'xmas-lite-small-img');
                                   $large_image = xmas_lite_get_post_image(get_the_ID(),'xmas-lite-large-img');
                                   ?>
                                    <a href="<?php echo esc_url($large_image); ?>" class="bg-image bg-image-3 bg-opacity-reverse">
                                        <?php
                                        echo '<img src="' . esc_url($small_image) . '">';
                                        ?>
                                    </a>
                               </figure>
                            </div>
                        <?php endwhile;wp_reset_postdata();?>
                        </div>
                    </div>
                    <?php
               endif;
            }
        }
    }
endif;
add_action('xmas_lite_before_footer', 'xmas_lite_post_gallery', 30);
