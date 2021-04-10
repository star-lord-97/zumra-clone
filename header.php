<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body class="min-h-screen flex flex-col justify-between">
    <div x-data="{ openMobileMenu: false }">
        <div class="flex justify-between items-center py-4 md:container md:mx-auto bg-primary px-4 text-white">
            <?php get_template_part('templates/logo') ?>
            <div class="hidden md:flex space-x-8">
                <?php get_template_part('templates/nav-links') ?>
            </div>
            <div class="hidden md:flex space-x-8">
                <?php get_template_part('templates/nav-icons') ?>
            </div>
            <button @click="openMobileMenu = !openMobileMenu" class="md:hidden focus:outline-none transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" class="fill-current">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                </svg>
            </button>
        </div>

        <div x-show="openMobileMenu" @click.away="openMobileMenu = false" class="fixed w-3/4 h-screen z-50 bg-primary text-white" style="right: 25%" x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="opacity-0 transform scale-x-0 -translate-x-1/2" x-transition:enter-end="opacity-100 transform scale-x-100 translate-x-0" x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0" x-transition:leave-end="opacity-0 transform scale-x-0 -translate-x-1/2">
            <div class="flex flex-col items-start justify-between space-y-8 my-8 ml-8">
                <?php get_template_part('templates/nav-links') ?>
                <div class="flex space-x-8">
                    <?php get_template_part('templates/nav-icons') ?>
                </div>
            </div>
        </div>
    </div>