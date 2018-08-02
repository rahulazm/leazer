<?php
function register_theme_name_scripts() {
    wp_enqueue_style( 'fontawosome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'footable-bootstrap', get_template_directory_uri() . '/assets/css/footable.bootstrap.min.css' );
    wp_enqueue_style( 'menu-style', get_template_directory_uri() . '/assets/css/jquery.mmenu.all.css' );
    wp_enqueue_style( 'hamburgers', get_template_directory_uri() . '/assets/css/hamburgers.css' );
    wp_enqueue_style( 'theme-custom', get_template_directory_uri() . '/assets/css/style.css' );
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
    wp_enqueue_style( 'clndr', get_template_directory_uri() . '/assets/css/clndr.css' );
    
    wp_enqueue_script( 'underscore-js', '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'moment-js', '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true );
    wp_enqueue_script( 'menu-js', get_template_directory_uri() . '/assets/js/jquery.mmenu.all.js', array(), '1.0.0', true );
    wp_enqueue_script( 'clndr-js', get_template_directory_uri() . '/assets/js/clndr.js', array(), '1.0.0', true );
    
}
add_action( 'wp_enqueue_scripts', 'register_theme_name_scripts' );

