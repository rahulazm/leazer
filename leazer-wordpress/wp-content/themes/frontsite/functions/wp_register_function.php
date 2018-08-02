<?php

/* Register Menu */
register_nav_menus(array(
    'main_navigation_front' => 'Main Header Front Menu',
    'footer_menu_front_1' => 'Footer Menu 1',
    'footer_menu_fornt_2' => 'Footer Menu 2',
));

/* Register Sidebar Begin */
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'description' => 'Search',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
        'name' => 'Search',
        'id' => 'search'
    ));
    
    
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id' => 'blog-sidebar',
        'description' => 'Sidebar of Blog List And Details Page',
        'before_widget' => '<div class="recent_art" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title_tg"><h2>',
        'after_title' => '</h2></div>',
    ));
}
/* Register Sidebar End */

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}