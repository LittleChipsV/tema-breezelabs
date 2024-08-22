<?php

if ( ! function_exists( 'tema_breezelabs_block_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function tema_breezelabs_block_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_enqueue_style(
			'tema-breezelabs-block-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);
	}

endif;

add_action( 'wp_enqueue_scripts', 'tema_breezelabs_block_styles' );