<?php

/** form submission handling */

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

<?php get_header(); ?>

<main>
    <div class="px-4 pt-32 pb-8 ">
        <div class="container mx-auto space-y-8">
            <!-- cart -->
            <?php if (count($_SESSION['cart'])) { ?>
                <div class="grid grid-cols-4 gap-8">
                    <div class="col-span-3">
                        <div class="flex justify-between">
                            <h1 class="font-bold text-lg mb-4 border-t-2 border-b-2 border-black">Cart</h1>
                            <h1 class="font-bold text-lg mb-4"><?= count($_SESSION['cart']) ?> Item(s)</h1>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <?php
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
                        </div>
                    </div>
                    <div class="col-span-1">
                        <h1 class="font-bold text-lg mb-4 border-t-2 border-b-2 border-black">Order summary</h1>
                        <div class="flex justify-between">
                            <h1 class="font-bold text-lg mb-4"><?= count($_SESSION['cart']) ?> Item(s)</h1>

                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="flex flex-col justify-center items-center space-y-8">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 54 42.8625" class="w-96 h-96">
                        <g data-name="Layer 2">
                            <g data-name="Layer 1">
                                <path class="cls-1" d="M53.44,5.3l.13-.15A2.32,2.32,0,0,0,54,3.41l-.25-1.46A2.34,2.34,0,0,0,51,0L26.69,4.19a2.35,2.35,0,0,0-.38.1H2.59A2.59,2.59,0,0,0,0,6.88V7.7a2.59,2.59,0,0,0,2.59,2.59H4.05L8.87,31.36A4.41,4.41,0,0,0,13,34.29H42c1.66,0,2.72-1.2,3.13-2.94l4.81-21.06h1.47A2.59,2.59,0,0,0,54,7.7V6.88A2.56,2.56,0,0,0,53.44,5.3Zm-50.86,3A.59.59,0,0,1,2,7.7V6.88a.59.59,0,0,1,.59-.59H24.77a2.33,2.33,0,0,0,0,.59L25,8.29H2.59ZM43.19,30.9a1.7,1.7,0,0,1-1.57,1.4H12.38a1.69,1.69,0,0,1-1.57-1.39L6.11,10.29H47.89ZM52,7.7a.59.59,0,0,1-.59.59H39.25L51,6.29h.45a.59.59,0,0,1,.59.59Z" />
                                <path class="cls-1" d="M27.26,27.29A8.35,8.35,0,0,1,19.2,22a1,1,0,1,0-1.89.66,10.35,10.35,0,0,0,9.94,6.67,10.35,10.35,0,0,0,9.95-6.67A1,1,0,1,0,35.31,22,8.35,8.35,0,0,1,27.26,27.29Z" />
                                <path class="cls-1" d="M20,19a1,1,0,0,0,1.41,0l1.29-1.29L24,19a1,1,0,0,0,1.41-1.41l-1.29-1.29L25.45,15A1,1,0,0,0,24,13.59l-1.29,1.29-1.29-1.29A1,1,0,0,0,20,15l1.29,1.29L20,17.59A1,1,0,0,0,20,19Z" />
                                <path class="cls-1" d="M29,19a1,1,0,0,0,1.41,0l1.29-1.29L33,19a1,1,0,0,0,1.41-1.41l-1.29-1.29L34.45,15A1,1,0,0,0,33,13.59l-1.29,1.29-1.29-1.29A1,1,0,0,0,29,15l1.29,1.29L29,17.59A1,1,0,0,0,29,19Z" />
                            </g>
                        </g>
                    </svg>
                    <h1 class="text-2xl font-bold">Sorry, your Cart is empty!!</h1>
                </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>