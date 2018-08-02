<?php
function register_theme_name_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'underscore-js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css');
//        wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css');
	wp_enqueue_style( 'font-css', 'https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700');
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	wp_enqueue_script( 'jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'boot-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/menu.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'register_theme_name_scripts' );

