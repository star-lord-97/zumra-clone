<?php

/** form submission handling */

// add to wishlist
if (isset($_POST['addToWishlist'])) {
    $existsInWishlist = false;

    foreach ($_SESSION['wishlist'] as $index => $wishlistItem) {
        if ($wishlistItem === $_POST['productId']) {
            $existsInWishlist = true;
        }
    }

    if (!$existsInWishlist) {
        $_SESSION['wishlist'][] = $_POST['productId'];
    }

    redirect(get_permalink(get_page_by_path('wishlist')));
}

// remove from wishlist
if (isset($_POST['removeFromWishlist'])) {
    $index = array_search($_POST['productId'], $_SESSION['wishlist']);
    array_splice($_SESSION['wishlist'], $index, 1);
    redirect(get_permalink(get_page_by_path('wishlist')));
}
?>

<?php get_header(); ?>

<main>
    <div class="px-4 pt-32 pb-8">
        <div class="container mx-auto space-y-8">
            <!-- wishlist -->
            <?php if (count($_SESSION['wishlist']) > 0) { ?>
                <div>
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg mb-4">Wishlist</h1>
                        <h1 class="font-bold text-lg mb-4"><?= count($_SESSION['wishlist']) ?> Item(s)</h1>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <?php
                        if (count($_SESSION['wishlist'])) {
                            $wishlistProducts = new WP_Query(array(
                                'posts_per_page' => 10,
                                'post_type' => 'product',
                                'post__in' => $_SESSION['wishlist']
                            ));
                            // sending the products data to a template part to be rendered
                            while ($wishlistProducts->have_posts()) {
                                $wishlistProducts->the_post();
                                get_template_part('templates/wishlist-item', null, array(
                                    'id' => get_the_ID(),
                                    'permalink' => get_the_permalink(),
                                    'title' => get_the_title(),
                                    'image' => get_the_post_thumbnail_url(null, 'product-card-thumbnail'),
                                    'rate' => get_field('rate'),
                                    'price' => get_field('price'),
                                    'on_sale' => get_field('on_sale'),
                                    'sale_price' => get_field('sale_price')
                                ));
                            };
                        }
                        ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="flex flex-col justify-center items-center space-y-8">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 90 112.5" style="enable-background: new 0 0 90 90" class="w-96 h-96" xml:space="preserve">
                        <path d="M12.6327953,45.9530945l31.660223,31.6605988c0.1875,0.1875,0.4419022,0.2929993,0.7070007,0.2929993  c0.2652016,0,0.5195999-0.1054993,0.7070999-0.2929993l9.7433014-9.7433014  c2.9409981,2.5754013,6.7790985,4.1501007,10.9861031,4.1501007c9.2148972,0,16.711998-7.4971008,16.711998-16.7118988  c0-4.2630005-1.6180038-8.1457977-4.2546997-11.1013031c2.739296-3.4720001,4.2546997-7.7916946,4.2546997-12.2824955  c0-5.3183994-2.053299-10.3008003-5.7813034-14.0298004c-7.7338943-7.7358999-20.320797-7.7358999-28.0565987,0  l-4.3106003,4.3110008l-4.3104973-4.3110008c-3.7406998-3.7411995-8.722702-5.8017998-14.0283012-5.8017998  c-5.3047009,0-10.286726,2.0606003-14.0284252,5.8017998c-3.7279997,3.7290001-5.7811999,8.711401-5.7811999,14.0298004  C6.8515954,37.2430954,8.9047956,42.2250938,12.6327953,45.9530945z M81.1485214,55.3085938  c0,8.1123009-6.5996017,14.7118988-14.711998,14.7118988c-8.1123047,0-14.7119026-6.5995979-14.7119026-14.7118988  s6.5995979-14.711998,14.7119026-14.711998C74.5489197,40.5965958,81.1485214,47.1962891,81.1485214,55.3085938z   M14.046895,19.3089943c3.3643007-3.3631992,7.8438253-5.2157993,12.6143255-5.2157993  c4.7714005,0,9.2509003,1.8526001,12.6142006,5.2157993l5.0175972,5.0181007c0.375,0.375,1.0391006,0.375,1.4141006,0  l5.0175018-5.0181007c6.9575996-6.9544992,18.2739983-6.9544992,25.2285957,0  c3.3500061,3.3511009,5.1953049,7.8316002,5.1953049,12.6158009c0,3.9621983-1.3091049,7.7745991-3.6802979,10.8632984  c-2.9468002-2.5997009-6.8025055-4.1914978-11.0317001-4.1914978c-9.2148018,0-16.7119026,7.497097-16.7119026,16.711998  c0,4.2891006,1.638298,8.1934013,4.3041,11.1554031l-9.0287018,9.028595l-30.953125-30.953598  c-3.3500996-3.3506012-5.1953001-7.830101-5.1953001-12.6141987C8.8515949,27.1405945,10.6967955,22.6600952,14.046895,19.3089943z" />
                        <path d="M69.2456207,43.8988953h-5.6180992c-0.5522995,0-1,0.4477005-1,1v10.9608994c0,0.5522995,0.4477005,1,1,1h5.6180992  c0.5522995,0,1-0.4477005,1-1V44.8988953C70.2456207,44.3465958,69.7979202,43.8988953,69.2456207,43.8988953z   M68.2456207,54.8597946h-3.618103v-8.9608994h3.618103V54.8597946z" />
                        <path d="M69.2456207,59.0995941h-5.6180992c-0.5522995,0-1,0.4476967-1,1v5.6185989c0,0.5522995,0.4477005,1,1,1h5.6180992  c0.5522995,0,1-0.4477005,1-1v-5.6185989C70.2456207,59.5472908,69.7979202,59.0995941,69.2456207,59.0995941z   M68.2456207,64.7181931h-3.618103v-3.6185989h3.618103V64.7181931z" />
                    </svg>
                    <h1 class="text-2xl font-bold">Sorry, your Wishlist is empty!!</h1>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>