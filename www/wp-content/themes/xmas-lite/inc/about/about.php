<?php
/**
 * About setup
 *
 * @package Xmas_Lite
 */

if ( ! function_exists( 'xmas_lite_about_setup' ) ) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function xmas_lite_about_setup() {

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( '%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'xmas-lite' ), 'Xmas Lite' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'xmas-lite' ),
				'useful-plugins'  => esc_html__( 'Useful Plugins', 'xmas-lite' ),
				),

			// Quick links.
			'quick_links' => array(
                'theme_url' => array(
                    'text' => esc_html__( 'Theme Details', 'xmas-lite' ),
                    'url'  => 'https://themesaga.com/theme/xmas-lite/',
                ),
                'demo_url' => array(
                    'text' => esc_html__( 'View Demo', 'xmas-lite' ),
                    'url'  => 'https://demo.themesaga.com/xmas-lite/',
                ),
                'documentation_url' => array(
                    'text'   => esc_html__( 'View Documentation', 'xmas-lite' ),
                    'url'    => 'https://docs.themesaga.com/xmas-lite/',
                    'button' => 'primary',
                ),
            ),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'xmas-lite' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'xmas-lite' ),
					'button_text' => esc_html__( 'View Documentation', 'xmas-lite' ),
					'button_url'  => 'https://themesaga.com/theme/xmas-lite/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Static Front Page', 'xmas-lite' ),
					'icon'        => 'dashicons dashicons-admin-generic',
					'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page.', 'xmas-lite' ),
					'button_text' => esc_html__( 'Static Front Page', 'xmas-lite' ),
					'button_url'  => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
					'button_type' => 'primary',
					),
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'xmas-lite' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'xmas-lite' ),
					'button_text' => esc_html__( 'Customize', 'xmas-lite' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				'four' => array(
					'title'       => esc_html__( 'Demo Content', 'xmas-lite' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf( esc_html__( 'To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'xmas-lite' ), esc_html__( 'One Click Demo Import', 'xmas-lite' ) ),
					),
				'five' => array(
					'title'       => esc_html__( 'Theme Preview', 'xmas-lite' ),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__( 'You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized.', 'xmas-lite' ),
					'button_text' => esc_html__( 'View Demo', 'xmas-lite' ),
					'button_url'  => 'https://demo.themesaga.com/xmas-lite/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
                'six' => array(
                    'title'       => esc_html__( 'Contact Support', 'xmas-lite' ),
                    'icon'        => 'dashicons dashicons-sos',
                    'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'xmas-lite' ),
                    'button_text' => esc_html__( 'Contact Support', 'xmas-lite' ),
                    'button_url'  => 'https://wordpress.org/support/theme/xmas-lite/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
				),

			// Useful plugins.
			'useful_plugins' => array(
				'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'xmas-lite' ),
				),

			);

		Xmas_Lite_About::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'xmas_lite_about_setup' );
