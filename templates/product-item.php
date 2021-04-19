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