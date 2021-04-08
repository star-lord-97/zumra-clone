<?php

function zumra_files()
{
    wp_enqueue_script('main-js', get_theme_file_uri('resources/js/bundled.js'), NULL, '1.0', true);
    wp_enqueue_style('main_styles', get_theme_file_uri('resources/css/style.css'));
}

add_action('wp_enqueue_scripts', 'zumra_files');
