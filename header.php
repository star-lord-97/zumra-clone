<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body class="min-h-screen flex flex-col justify-between">
    <?php get_template_part('templates/navbar') ?>
    <?php get_template_part('templates/mobile-navmodal') ?>