<?php
/**
 * Recommended plugins
 *
 * @package xmas-lite
 */
if ( ! function_exists( 'xmas_lite_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function xmas_lite_recommended_plugins() {
		$plugins = array(
			array(
				'name'     => esc_html__( 'One Click Demo Import', 'xmas-lite' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			),
		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'xmas_lite_recommended_plugins' );
