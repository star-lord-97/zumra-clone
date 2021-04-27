<?php get_header(); ?>

<main>
    <div class="px-4 pt-32 pb-8">
        <div class="container mx-auto space-y-8">
            <!-- hero glide -->
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
                            <svg viewBox="0 0 24 24" class="fill-current text-gray-300 h-12 w-12 md:h-24 md:w-24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M15.61 7.41L14.2 6l-6 6 6 6 1.41-1.41L11.03 12l4.58-4.59z" />
                            </svg>
                        </button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                            <svg viewBox="0 0 24 24" class="fill-current text-gray-300 h-12 w-12 md:h-24 md:w-24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- special offers -->
            <h1 class="font-bold text-lg mb-4">SPECIAL OFFERS</h1>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php
                // query to get the newest 4 products on sale
                $saleProducts = new WP_Query(array(
                    'posts_per_page' => 4,
                    'post_type' => 'product',
                    'meta_query' => array(array(
                        'key' => 'on_sale',
                        'compare' => '==',
                        'value' => '1',
                    ))
                ));

                // sending the products data to a template part to be rendered
                while ($saleProducts->have_posts()) {
                    $saleProducts->the_post();
                    get_template_part('templates/product-item', null, array(
                        'permalink' => get_the_permalink(),
                        'title' => get_the_title(),
                        'image' => get_the_post_thumbnail_url(null, 'product-card-thumbnail'),
                        'rate' => get_field('rate'),
                        'price' => get_field('price'),
                        'on_sale' => get_field('on_sale'),
                        'sale_price' => get_field('sale_price')
                    ));
                }
                ?>
            </div>

            <!-- posters -->
            <div class="grid grid-cols-1 grid-rows-2 md:grid-cols-3 gap-4 md:gap-8">
                <h1 class="border md:col-span-1 md:row-span-1"><img class="w-full h-48 md:h-96" src="<?= get_theme_file_uri('resources/img/poster1.jpg') ?>" alt=""></h1>
                <h1 class="border md:col-span-2 md:row-span-1"><img class="w-full h-48 md:h-96" src="<?= get_theme_file_uri('resources/img/poster2.jpg') ?>" alt=""></h1>
                <h1 class="border md:col-span-3 md:row-span-1"><img class="w-full h-48 md:h-96" src="<?= get_theme_file_uri('resources/img/poster3.jpg') ?>" alt=""></h1>
            </div>

            <!-- new arrival -->
            <h1 class="font-bold text-lg mb-4">NEW ARRIVAL</h1>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php
                // query to get the newest 4 products
                $newProducts = new WP_Query(array(
                    'posts_per_page' => 4,
                    'post_type' => 'product',
                ));

                // sending the products data to a template part to be rendered
                while ($newProducts->have_posts()) {
                    $newProducts->the_post();
                    get_template_part('templates/product-item', null, array(
                        'permalink' => get_the_permalink(),
                        'title' => get_the_title(),
                        'image' => get_the_post_thumbnail_url(null, 'product-card-thumbnail'),
                        'rate' => get_field('rate'),
                        'price' => get_field('price'),
                        'on_sale' => get_field('on_sale'),
                        'sale_price' => get_field('sale_price')
                    ));
                }
                ?></div>

            <!-- best selling -->
            <h1 class="font-bold text-lg mb-4">BEST SELLING</h1>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php
                // query to get the highest 4 products rates
                $saleProducts = new WP_Query(array(
                    'posts_per_page' => 4,
                    'post_type' => 'product',
                    'meta_key' => 'rate',
                    'orderby' => 'meta_value',
                    'order' => 'DESC'
                ));

                // sending the products data to a template part to be rendered
                while ($saleProducts->have_posts()) {
                    $saleProducts->the_post();
                    get_template_part('templates/product-item', null, array(
                        'permalink' => get_the_permalink(),
                        'title' => get_the_title(),
                        'image' => get_the_post_thumbnail_url(null, 'product-card-thumbnail'),
                        'rate' => get_field('rate'),
                        'price' => get_field('price'),
                        'on_sale' => get_field('on_sale'),
                        'sale_price' => get_field('sale_price')
                    ));
                }
                ?></div>
        </div>
    </div>

</main>

<?php get_footer(); ?>