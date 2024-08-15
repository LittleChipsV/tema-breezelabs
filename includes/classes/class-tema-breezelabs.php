<?php

if ( ! class_exists('TemaBreezelabs') ) {
   class TemaBreezelabs {
      public function __construct() {
         // Action hooks
         add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
         add_action('after_setup_theme', array($this, 'theme_setup'));
         add_action('init', array($this, 'register_theme_menus'));
      }

      // Action hook functions
      public function enqueue_assets() {
         wp_enqueue_style( 'tema-breezelabs-style', get_template_directory_uri() . '/assets/dist/css/main.css', array(), wp_get_theme()->get( 'Version' ), 'all' );
         wp_enqueue_style( 'tema-breezelabs-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css", array(), '6.6.0', 'all' );
         wp_enqueue_style( 'tema-breezelabs-font', "https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap", array(), wp_get_theme()->get( 'Version' ), 'all' );

         wp_enqueue_script( 'tema-breezelabs-script', get_template_directory_uri() . '/assets/dist/js/main.bundle.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
      }

      public function theme_setup() {
         add_theme_support( 'title-tag' );
         add_theme_support( 'post-thumbnails' );
         add_theme_support( 'menus' );
         add_theme_support( 'custom-logo', array(
            'width' => 40,
            'height' => 135,
            'flex-width' => true,
            'flex-height' => true
         ) );
      }

      public function register_theme_menus() {
         register_nav_menus( array(
            'header_menu' => __( 'Header menu', 'tema-breezelabs' )
         ) );
      }
   }
}