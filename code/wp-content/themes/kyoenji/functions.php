<?php
function kyoenji_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'primary' => 'Primary Menu',
    ]);
}
add_action('after_setup_theme', 'kyoenji_theme_setup');

function kyoenji_theme_scripts() {
    $version = filemtime(get_stylesheet_directory() . '/style.css');  // Timestamp from file mod time
    wp_enqueue_style('tailwind-css', get_stylesheet_uri(), array(), $version);
}
add_action('wp_enqueue_scripts', 'kyoenji_theme_scripts');
?>
