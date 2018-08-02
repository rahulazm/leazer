<?php
include("wp_register_function.php");
include("post_types/slider/slider.php");
include("acf_function/acf_option_pages.php");
include("wp_register_script.php");
add_theme_support( 'post-thumbnails', array( 'espresso_events' ) );
add_theme_support( 'post-thumbnails', array( 'post' ) );