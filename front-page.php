<?php get_header(); ?>

<main>
    <!-- hero glide -->
    <div class="px-4 my-8">
        <div class="container mx-auto">
            <div class="glide">
                <div class="glide__track" data-glide-el="track">
                    <!-- glide images -->
                    <ul class="glide__slides" id="aaa">
                        <li class="glide__slide"><img src="<?= get_theme_file_uri('resources/img/poster1.jpg') ?>" class="w-full h-full" alt=""></li>
                        <li class="glide__slide"><img src="<?= get_theme_file_uri('resources/img/poster2.jpg') ?>" class="w-full h-full" alt=""></li>
                        <li class="glide__slide"><img src="<?= get_theme_file_uri('resources/img/poster3.jpg') ?>" class="w-full h-full" alt=""></li>
                    </ul>

                    <!-- glide arrows -->
                    <div class="glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                            <svg xmlns="http://www.w3.org/2000/svg" height="72px" viewBox="0 0 24 24" width="72px" class="fill-current text-gray-300">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
                            </svg>
                        </button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                            <svg xmlns="http://www.w3.org/2000/svg" height="72px" viewBox="0 0 24 24" width="72px" class="fill-current text-gray-300">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- special offers -->
    <div class="px-4 my-8">
        <div class="container mx-auto">
            <h1 class="font-bold text-lg mb-4">SPECIAL OFFERS</h1>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php get_template_part('templates/product-item') ?>
            </div>
        </div>
    </div>

    <!-- posters -->
    <div class="px-4 my-8">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 grid-rows-2 md:grid-cols-3 gap-4 md:gap-8">
                <h1 class="border md:col-span-1 md:row-span-1"><img class="w-full h-48 md:h-96" src="<?= get_theme_file_uri('resources/img/poster1.jpg') ?>" alt=""></h1>
                <h1 class="border md:col-span-2 md:row-span-1"><img class="w-full h-48 md:h-96" src="<?= get_theme_file_uri('resources/img/poster2.jpg') ?>" alt=""></h1>
                <h1 class="border md:col-span-3 md:row-span-1"><img class="w-full h-48 md:h-96" src="<?= get_theme_file_uri('resources/img/poster3.jpg') ?>" alt=""></h1>
            </div>
        </div>
    </div>

    <!-- new arrival -->
    <div class="px-4 my-8">
        <div class="container mx-auto">
            <h1 class="font-bold text-lg mb-4">NEW ARRIVAL</h1>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php get_template_part('templates/product-item') ?>
            </div>
        </div>
    </div>

    <!-- best selling -->
    <div class="px-4 my-8">
        <div class="container mx-auto">
            <h1 class="font-bold text-lg mb-4">BEST SELLING</h1>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php get_template_part('templates/product-item') ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>