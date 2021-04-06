<?php

function zumra_files()
{
    wp_enqueue_script('main-js', get_theme_file_uri('/resources/js/bundled.js'), NULL, '1.0', true);
    // wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    // wp_enqueue_style('font-awesome', '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('main_styles', get_theme_file_uri('/resources/css/style.css'));
    // wp_localize_script('main-js', 'universityData', array(
    //     'root_url' => get_site_url()
    // ));
}

add_action('wp_enqueue_scripts', 'zumra_files');
