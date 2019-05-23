<?php
/**
 * Loads the child theme novelpink
 */
function novelpink_child_theme_setup() {
    load_child_theme_textdomain( 'novelpink');
}
add_action( 'after_setup_theme', 'novelpink_child_theme_setup' );

function novelpink_enqueue_styles() {
    // Use the parent theme's stylesheet
    return get_template_directory_uri() . '/style.css';
}

function novelpink_styles() {
    $themeVersion = wp_get_theme()->get('Version');

    // Enqueue our style.css with our own version
    wp_enqueue_style('novelpink-child-style', get_stylesheet_directory_uri() . '/style.css',
        array(), $themeVersion);
}

// Filter get_stylesheet_uri() to return the parent theme's stylesheet 
add_filter('stylesheet_uri', 'novelpink_enqueue_styles');

// Enqueue this theme's scripts and styles (after parent theme)
add_action('wp_enqueue_scripts', 'novelpink_styles', 99);
?>