<div class="flex flex-col items-center justify-center space-y-4">
    <a href="<?= $args['permalink'] ?>" class="bg-white border rounded-b-xl flex flex-col justify-center items-center space-y-4 hover:bg-gray-100">
        <img src="<?= $args['image'] ?>" alt="" class="w-full h-full">
        <h1><?= $args['title'] ?></h1>
        <div class="flex space-x-1 md:space-x-2">
            <?php
            for ($i = 0; $i < $args['rate']; $i++) {
            ?>
                <svg class="fill-current text-yellow-300 md:h-6 md:w-6 h-5 w-5" viewBox="0 0 20 20">
                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                </svg>
            <?php
            }
            for ($i = 5; $i > $args['rate']; $i--) {
            ?>
                <svg class="fill-current text-gray-400 md:h-6 md:w-6 h-5 w-5" viewBox="0 0 20 20">
                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                </svg>
            <?php
            }
            ?>
        </div>
        <div class="w-full flex justify-evenly items-center pb-4">
            <h1 class="font-bold"><?= $args['price'] ?> EGP</h1>
            <?php if ($args['on_sale']) { ?>
                <h1 class="font-bold line-through"><?= $args['sale_price'] ?> EGP</h1>
            <?php } ?>
        </div>
    </a>
    <form action="<?= get_permalink(get_page_by_path('cart')) ?>" method="post" class="flex items-center space-x-4">
        <div class="flex space-x-4 items-center" x-data="{ quantity: <?= $args['quantity'] ?> }">
            <div class="flex">
                <input type="hidden" name="productId" value="<?php the_ID(); ?>">
                <button class="text-white focus:outline-none font-bold text-xl bg-red-500 rounded-l-md hover:text-black px-3" @click.prevent="if(quantity > 1) { quantity-- }">-</button>
                <input type="text" name="quantity" id="quantity" class="text-center bg-white py-1 w-16" :value="quantity" />
                <button class="text-white focus:outline-none font-bold text-xl bg-red-500 rounded-r-md hover:text-black px-3" @click.prevent="if(quantity < <?= $args['units'] ?>) quantity++">+</button>
            </div>
            <button class="focus:outline-none text-white bg-gray-600 rounded-md py-1 hover:text-gray-300 px-2" type="submit" name="updateQuantity">Update quantity</button>
        </div>
    </form>
    <form action="<?= get_permalink(get_page_by_path('cart')) ?>" method="post">
        <input type="hidden" name="productId" value="<?= $args['id'] ?>">
        <button type="submit" class="focus:outline-none py-1 px-4 border bg-red-500 hover:bg-red-300 rounded-xl text-white" name="removeFromCart">Remove from cart</button>
    </form>
</div>