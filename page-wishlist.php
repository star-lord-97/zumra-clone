<?php get_header(); ?>

<main>
    <div class="px-4 pt-32 pb-8 bg-gray-100">
        <div class="container mx-auto space-y-8">
            <!-- wishlist -->
            <div>
                <h1 class="font-bold text-lg mb-4">Wishlist</h1>
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
                    <?php
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
                        echo $index;
                        array_splice($_SESSION['wishlist'], $index, 1);
                        redirect(get_permalink(get_page_by_path('wishlist')));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>