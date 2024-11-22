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
			'tema-breezelabs-block-style-index',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);
		wp_enqueue_style(
			'tema-breezelabs-block-font-awesome',
			'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css',
			array(),
			$version_string
		);
		wp_enqueue_style(
			'tema-breezelabs-block-styles',
			get_template_directory_uri() . '/assets/dist/main.css',
			array(),
			$version_string
		);
		wp_enqueue_script( 
			'tema-breezelabs-block-scripts', 
			get_template_directory_uri() . '/assets/dist/main.bundle.js', 
			array(), 
			$version_string, 
			true 
		);
	}

endif;

add_action( 'wp_enqueue_scripts', 'tema_breezelabs_block_styles' );