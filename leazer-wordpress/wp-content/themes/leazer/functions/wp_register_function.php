<?php

/* Register Menu */
register_nav_menus(array(
    'main_navigation' => 'Main Header Menu',
    'footer_navigation' => 'Footer Menu',
));

/* Register Sidebar Begin */
if (function_exists('register_sidebar')) {
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

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);

function special_nav_class($classes, $item) {
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'current-item ';
    }
    return $classes;
}

function custom_excerpt_length($length) {
    return 20;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);


// Add a custom user role

$result = add_role('agent', __(
                'Agent'), array(
    'read' => true, // true allows this capability
    'edit_posts' => true, // Allows user to edit their own posts
    'edit_pages' => true, // Allows user to edit pages
    'edit_others_posts' => true, // Allows user to edit others posts not just their own
    'create_posts' => true, // Allows user to create new posts
    'manage_categories' => true, // Allows user to manage post categories
    'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
    'edit_themes' => true, // false denies this capability. User can’t edit your theme
    'install_plugins' => true, // User cant add new plugins
    'update_plugin' => true, // User can’t update any plugins
    'update_core' => true // user cant perform core updates
        )
);
