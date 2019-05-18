<?php

/*
Template Name: Страница Официальная информация
*/
get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
			query_posts('cat=3'); 
            if (have_posts()) :
                /* Start the Loop */
                while (have_posts()) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part('template-parts/content', get_post_format());

                endwhile;

                /**
                 * Hook - xmas_lite_posts_navigation.
                 *
                 * @hooked: xmas_lite_display_posts_navigation - 10
                 */
                do_action( 'xmas_lite_posts_navigation' );

            else :

                get_template_part('template-parts/content', 'none');

            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->
	
<?	
$page_layout = xmas_lite_get_page_layout();
if( 'no-sidebar' != $page_layout ){
    get_sidebar();
}

get_footer();

?>
