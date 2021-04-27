<?php

// ?
require get_theme_file_path('/includes/sort-filterRoute.php');

add_action('wp_enqueue_scripts', 'zumra_files');

function zumra_files()
{
    // ? start
    // import noUiSlider css
    wp_enqueue_style('slider-css', get_theme_file_uri('node_modules/nouislider/distribute/nouislider.min.css'));
    // import noUiSlider js
    wp_enqueue_script('slider-js', get_theme_file_uri('node_modules/nouislider/distribute/nouislider.min.js'));
    // ? end

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

    // ? start
    // import font-awesome icons 
    wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/63e45fbbf9.js', NULL, '1.0', true);
    // root url for api calls
    wp_localize_script('main-js', 'productsData', [
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ]);
    // ? end
}

add_action('after_setup_theme', 'zumra_features');

function zumra_features()
{
    // allowing posts to have featured images
    add_theme_support('post-thumbnails');
    add_image_size('product-card-thumbnail', 300, 320, true);
    add_image_size('product-thumbnail', 400, 440, true);
}
