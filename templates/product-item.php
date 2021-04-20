
<a href="<?php echo get_the_permalink();?>" class="flex flex-col items-center justify-center space-y-4 bg-white border rounded-b-xl hover:bg-gray-100">
    <div class="w-full" id="product card">
        <img src="<?= $args['image'] ?>" alt="" class="w-full">
        <h1 class="flex justify-center font-bold text-gray-600" id="product-name"><?php echo $args['title']; ?></h1>
        <div class="flex justify-center pt-2" id="rating">
            <div class="stars-outer">
                <div class="stars-inner"></div>
            </div>
        </div>
    </div>
    <div class="flex items-center w-full pb-4 justify-evenly">
        <h1 class="font-bold"><?= $args['price'] ?> EGP</h1>
        <?php if ($args['on_sale']) { ?>
            <h1 class="font-bold line-through"><?= $args['sale_price'] ?> EGP</h1>
        <?php } ?>
    </div>
</a>
<!--
<a href="<?= $args['permalink'] ?>" class="flex flex-col items-center justify-center space-y-4 bg-white border rounded-b-xl hover:bg-gray-100">
    <img src="<?= $args['image'] ?>" alt="" class="w-full h-full">
    <h1><?= $args['title'] ?></h1>
    <div class="flex space-x-1 md:space-x-2">
        <?php
        for ($i = 0; $i < $args['rate']; $i++) {
        ?>
            <svg class="w-5 h-5 text-yellow-300 fill-current md:h-6 md:w-6" viewBox="0 0 20 20">
                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
            </svg>
        <?php
        }
        for ($i = 5; $i > $args['rate']; $i--) {
        ?>
            <svg class="w-5 h-5 text-gray-400 fill-current md:h-6 md:w-6" viewBox="0 0 20 20">
                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
            </svg>
        <?php
        }
        ?>
    </div>
    <div class="flex items-center w-full pb-4 justify-evenly">
        <h1 class="font-bold"><?= $args['price'] ?> EGP</h1>
        <?php if ($args['on_sale']) { ?>
            <h1 class="font-bold line-through"><?= $args['sale_price'] ?> EGP</h1>
        <?php } ?>
    </div>
</a>
        -->