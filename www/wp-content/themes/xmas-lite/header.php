<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xmas_Lite
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'xmas-lite'); ?></a>

    <div id="loader" class="loader">
        <div class="loader-inner">
            <span id="loader-typed"></span>
            <div id="loader-typed-strings">
                <h2><?php esc_html_e('Loading', 'xmas-lite'); ?></h2>
                <h2><?php esc_html_e('wait a moment', 'xmas-lite'); ?></h2>
            </div>
        </div>
    </div>
    <?php
    $header_image = get_template_directory_uri().'/assets/images/header-banner.jpg';
    $dynamic_header_image = get_header_image();
    if($dynamic_header_image){
        $header_image = $dynamic_header_image;
    }
    ?>
    <header id="saga-header" class="site-header data-bg" data-background="<?php echo esc_url($header_image);?>">
        <?php
        $show_top_bar = xmas_lite_get_option('show_top_bar',true);
        //if($show_top_bar){
			if (false){
            ?>
            <div class="saga-topnav primary-background">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="top-nav primary-font">
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'topbar-menu',
                                    'menu_id' => 'top-menu',
                                    'container' => 'div',
                                    'depth'        => 1,
                                    'menu_class'=> false,
                                    'fallback_cb'=> false,
                                    )
                                );
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="pull-right">
                                <a href="#" class="search-button secondary-background">
                                    <span class="saga-search-icon" aria-hidden="true"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="search-box">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div><!--Searchbar Ends-->


        <div class="saga-midnav">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="social-icons">
                            <?php
                            wp_nav_menu( array(
                                    'theme_location' => 'social-nav',
                                    'link_before' => '<span class="screen-reader-text">',
                                    'link_after' => '</span>',
                                    'menu_id' => 'social-menu',
                                    'fallback_cb' => false,
                                    'depth'        => 1,
                                    'menu_class'=> false
                                )
                            );
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="site-branding text-center">
                            <?php
                            the_custom_logo();
    
                            if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                <?php
                            endif;

                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description primary-font"><?php echo $description; ?></p>
                                <?php
                            endif;
                            ?>
                        </div><!-- .site-branding -->
                    </div>
                </div>
            </div>
        </div>
        <div class="saga-navigation navigation-background">
            <div class="container">
                <nav id="site-navigation" class="main-navigation">
                <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                     <span class="screen-reader-text">
                        <?php esc_html_e('Primary Menu', 'xmas-lite'); ?>
                    </span>
                    <i class="ham"></i>
                </span>
                <?php wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                    'container' => 'div',
                    'container_class' => 'menu'
                )); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </header><!-- #masthead -->

    <?php
    if( !is_front_page() ) {
        if( !is_home() ){
            /**
             * Hook - xmas_lite_inner_header.
             *
             * @hooked xmas_lite_display_inner_header - 10
             */
            do_action('xmas_lite_inner_header');
        }
        ?>
        <div id="content" class="site-content">
        <?php
    }