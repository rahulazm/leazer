<?php
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_page(array(
        'page_title' => 'Theme Option',
        'menu_title' => 'Theme Option',
        'menu_slug' => 'theme-option-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_page(array(
        'page_title' => 'Theme Sidebar',
        'menu_title' => 'Theme Sidebar',
        'menu_slug' => 'theme-option-sidebar',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}