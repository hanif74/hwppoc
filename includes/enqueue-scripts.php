<?php
add_action('wp_enqueue_scripts', function () {
    // Styles
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        null
    );
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );

    // Scripts
    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        null,
        true
    );

    $main_js = get_stylesheet_directory_uri() . '/assets/js/main.js';
    wp_enqueue_script(
        'theme-main',
        $main_js,
        ['jquery'],
        wp_get_theme()->get('Version'),
        true
    );
});
