<?php

// Custom Post Types & Custom Taxonomies
require get_template_directory() . '/inc/post-types-taxonomies.php';

function load_theme_styles() {
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'load_theme_styles');

// Custom blocks
require get_theme_file_path() . '/valora-blocks/valora-blocks.php';