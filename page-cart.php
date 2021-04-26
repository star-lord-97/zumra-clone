<?php get_header(); ?>

<main>
    <div class="px-4 pt-32 pb-8 bg-gray-100">
        <div class="container mx-auto space-y-8">
            <!-- cart -->
            <div>
                <h1 class="font-bold text-lg mb-4">Cart</h1>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <?php
                    // $_SESSION['cart'] = array();
                    if (count($_SESSION['cart'])) {
                        $cartProductsIds = array();
                        foreach ($_SESSION['cart'] as $cartItem) {
                            $cartProductsIds[] = $cartItem['id'];
                        }

                        $cartProducts = new WP_Query(array(
                            'posts_per_page' => 10,
                            'post_type' => 'product',
                            'post__in' => $cartProductsIds
                        ));

                        // sending the products data to a template part to be rendered
                        while ($cartProducts->have_posts()) {
                            $cartProducts->the_post();
                            $itemQuantity;
                            foreach ($_SESSION['cart'] as $cartItem) {
                                if ($cartItem['id'] == get_the_ID()) {
                                    $itemQuantity = $cartItem['quantity'];
                                }
                            };
                            get_template_part('templates/cart-item', null, array(
                                'id' => get_the_ID(),
                                'permalink' => get_the_permalink(),
                                'title' => get_the_title(),
                                'image' => get_the_post_thumbnail_url(null, 'product-card-thumbnail'),
                                'rate' => get_field('rate'),
                                'price' => get_field('price'),
                                'on_sale' => get_field('on_sale'),
                                'units' => get_field('available_units'),
                                'sale_price' => get_field('sale_price'),
                                'quantity' => $itemQuantity
                            ));
                        };
                    }
                    ?>
                    <?php
                    // add to cart
                    if (isset($_POST['addToCart'])) {
                        $existsInCart = false;

                        foreach ($_SESSION['cart'] as $index => $cartItem) {
                            if ($cartItem['id'] === $_POST['productId']) {
                                $existsInCart = true;
                                $_SESSION['cart'][$index]['quantity'] = $cartItem['quantity'] + $_POST['quantity'];
                            }
                        }

                        if (!$existsInCart) {
                            $_SESSION['cart'][] = array(
                                'id' => $_POST['productId'],
                                'quantity' => $_POST['quantity']
                            );
                        }

                        redirect(get_permalink(get_page_by_path('cart')));
                    }

                    // remove from cart
                    if (isset($_POST['removeFromCart'])) {
                        $index;
                        foreach ($_SESSION['cart'] as $key => $cartItem) {
                            if ($cartItem['id'] === $_POST['productId']) {
                                $index = $key;
                            }
                        }
                        array_splice($_SESSION['cart'], $index, 1);
                        redirect(get_permalink(get_page_by_path('cart')));
                    }

                    // update quantity
                    if (isset($_POST['updateQuantity'])) {
                        foreach ($_SESSION['cart'] as $key => $cartItem) {
                            if ($cartItem['id'] === $_POST['productId']) {
                                $_SESSION['cart'][$key]['quantity'] = $_POST['quantity'];
                            }
                        }
                        redirect(get_permalink(get_page_by_path('cart')));
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>