<?php

add_action('wp_enqueue_scripts', 'zumra_files');

function zumra_files()
{
    // importing the bundled js file
    wp_enqueue_script('main-js', get_theme_file_uri('resources/js/bundled.js'), NULL, '1.0', true);
    // importing alpine.js
    wp_enqueue_script('alpine-js', 'https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js', NULL, '1.0', true);
    // importing the main css file
    wp_enqueue_style('main_styles', get_theme_file_uri('resources/css/style.css'));
    // importing glide.core
    wp_enqueue_style('glide-core', get_theme_file_uri('node_modules/@glidejs/glide/dist/css/glide.core.min.css'));
    // importing glide.theme
    wp_enqueue_style('glide-theme', get_theme_file_uri('node_modules/@glidejs/glide/dist/css/glide.theme.min.css'));
}

add_action('after_setup_theme', 'zumra_features');

function zumra_features()
{
    // allowing posts to have featured images
    add_theme_support('post-thumbnails');
    add_image_size('product-thumbnail', 300, 320, true);
}
