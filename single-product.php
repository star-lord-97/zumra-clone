<?php get_header(); ?>

<?php the_post(); ?>

<main>
    <div class="px-4 pt-32 pb-8 ">
        <div class="container mx-auto space-y-8">
            <!-- product navigation -->
            <div class="flex items-center space-x-1 text-sm md:text-base">
                <a class="hover:underline" href="<?= get_site_url(); ?>">Home </a>
                <svg viewBox="0 0 24 24" class="fill-current h-4 w-4 inline">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                </svg>
                <?php $terms = get_the_terms(get_the_ID(), 'product-category')[0] ?>
                <a class="hover:underline" href="<?= site_url('categories/' . $terms->slug) ?>"><?= $terms->name ?></a>
                <svg viewBox="0 0 24 24" class="fill-current h-4 w-4 inline">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M10.02 6L8.61 7.41 13.19 12l-4.58 4.59L10.02 18l6-6-6-6z" />
                </svg>
                <h1 class="text-red-500"><?php the_title() ?></h1>
            </div>

            <!-- product info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex justify-center">
                    <img class="border-2" src="<?= get_the_post_thumbnail_url(null, 'product-thumbnail') ?>">
                </div>
                <div class="flex flex-col space-y-4">
                    <h4 class="text-3xl font-bold"><?php the_title() ?></h4>
                    <?php if (get_field('on_sale') == 1) { ?>
                        <div class="flex items-center">
                            <span class="mr-8 text-3xl font-bold text-primary"><?= get_field('sale_price') . ' EGP' ?></span>
                            <span class="ml-8 text-3xl font-bold text-primary line-through"><?= get_field('price') . ' EGP' ?></span>
                        </div>
                    <?php } else { ?>
                        <span class="text-3xl font-bold text-primary"><?= get_field('price') . ' EGP' ?></span>
                    <?php } ?>
                    <?php if (get_field('available_units') > 0) { ?>
                        <h1 class="text-gray-500">In Stock</h1>
                    <?php } else { ?>
                        <h1 class="text-red-500">Out of stock</h1>
                    <?php } ?>
                    <p><?php the_content() ?></p>
                    <?php if (get_field('available_units') > 0) { ?>
                        <h1 class="text-gray-500"><?= get_field('available_units') . ' in stock' ?></h1>
                        <form action="<?= get_permalink(get_page_by_path('cart')) ?>" method="post" class="flex items-center space-x-4">
                            <div class="grid grid-cols-3 w-1/2 md:w-1/5" x-data="{ quantity: 1 }">
                                <input type="hidden" name="productId" value="<?php the_ID(); ?>">
                                <button class="text-white focus:outline-none font-bold text-xl bg-red-500 rounded-l-md hover:text-black" @click.prevent="if(quantity > 1) { quantity-- }">-</button>
                                <input type="text" name="quantity" id="quantity" class="text-center bg-white py-1" :value="quantity" />
                                <button class="text-white focus:outline-none font-bold text-xl bg-red-500 rounded-r-md hover:text-black" @click.prevent="if(quantity < <?= get_field('available_units') ?>) quantity++">+</button>
                            </div>
                            <button class="focus:outline-none w-1/2 md:w-1/5 text-white bg-gray-600 rounded-md py-1 hover:text-gray-300" type="submit" name="addToCart">Add To Cart</button>
                        </form>
                    <?php } ?>
                    <form action="<?= get_permalink(get_page_by_path('wishlist')) ?>" method="post">
                        <input type="hidden" name="productId" value="<?php the_ID(); ?>">
                        <button class="focus:outline-none w-full md:w-5/12 text-white bg-gray-600 rounded-md py-1 flex justify-center items-center space-x-2 hover:text-gray-300" type="submit" name="addToWishlist">
                            <span>Add To Wishlist</span>
                            <svg class="fill-current w-6 h-6 inline" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- you may also like -->
            <div>
                <h1 class="font-bold text-lg mb-4">YOU MAY ALSO LIKE</h1>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php
                    // query to get 4 random products excluding the current one
                    $newProducts = new WP_Query(array(
                        'posts_per_page' => 4,
                        'post_type' => 'product',
                        'orderby' => 'rand',
                        'post__not_in' => array(
                            get_the_ID()
                        )
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
                    };

                    // resetting the global post variable
                    wp_reset_postdata();
                    ?>
                </div>
            </div>

            <!-- reviews -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- product old reviews -->
                <div class="bg-white md:col-span-2">
                    <h1 class="font-bold text-xl text-center my-8">3 review(s) for <span class="text-red-500"><?php the_title() ?></span></h1>
                    <div class="flex flex-col my-8">
                        <div class="flex flex-col items-center space-y-4 my-4">
                            <h1>
                                <span class="font-bold">Ahmed Mahmoud</span>
                                –
                                <span class="text-xs"><?= date('F j, Y') ?></span>
                            </h1>
                            <p>good</p>
                            <div class="flex space-x-1">
                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <svg class="fill-current text-yellow-300 md:h-5 md:w-5 h-4 w-4" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="flex flex-col items-center space-y-4 my-4">
                            <h1>
                                <span class="font-bold">Ahmed Mahmoud</span>
                                –
                                <span class="text-xs"><?= date('F j, Y') ?></span>
                            </h1>
                            <p>very good</p>
                            <div class="flex space-x-1">
                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <svg class="fill-current text-yellow-300 md:h-5 md:w-5 h-4 w-4" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="flex flex-col items-center space-y-4 my-4">
                            <h1>
                                <span class="font-bold">Ahmed Mahmoud</span>
                                –
                                <span class="text-xs"><?= date('F j, Y') ?></span>
                            </h1>
                            <p>so good</p>
                            <div class="flex space-x-1">
                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <svg class="fill-current text-yellow-300 md:h-5 md:w-5 h-4 w-4" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                    </svg>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add a new review -->
                <div class="bg-white md:col-span-1 px-4">
                    <form class="my-8 space-y-4" method="post">
                        <h1 class="font-bold text-xl my-8">Add a review</h1>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <h1 class="font-bold">Your rating * </h1>
                        <div class="flex space-x-1">
                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                <svg class="fill-current text-gray-300 hover:text-yellow-300 md:h-5 md:w-5 h-4 w-4" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                            <?php } ?>
                        </div>
                        <h1 class="font-bold">Your review *</h1>
                        <textarea class="w-full focus:outline-none border focus:border-blue-300 p-2"></textarea>
                        <h1 class="font-bold">Your name *</h1>
                        <input type="text" name="name" id="name" class="w-full focus:outline-none border focus:border-blue-300 p-2" />
                        <h1 class="font-bold">Your email *</h1>
                        <input type="email" name="email" id="email" class="w-full focus:outline-none border focus:border-blue-300 p-2" />
                        <button class="py-2 px-6 text-white bg-gray-700 hover:text-gray-300" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>