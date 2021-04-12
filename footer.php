<!-- footer -->
<footer>
    <div class="bg-primary text-white px-4 py-8">
        <div class="container mx-auto grid grid-cols-2 md:grid-cols-3 gap-y-8">
            <div class="flex flex-col">
                <h1 class="pb-4 font-bold">CATEGORIES</h1>
                <div class="flex flex-col text-sm space-y-2">
                    <a href="#">blah</a>
                    <a href="#">blah blah</a>
                    <a href="#">blah blah blah</a>
                    <a href="#">blah blah blah blah</a>
                </div>
            </div>
            <div class="flex flex-col">
                <h1 class="pb-4 font-bold">INFORMATION</h1>
                <div class="flex flex-col text-sm space-y-2">
                    <a href="#">About us</a>
                    <a href="#">Contact us</a>
                </div>
            </div>
            <div class="flex flex-col col-span-2 md:col-span-1">
                <h1 class="pb-4 font-bold">NEWSLETTER</h1>
                <form action="" method="post" class="flex">
                    <input class="py-1 px-4 rounded-l-full focus:outline-none border border-red-400 focus:border-red-500 w-full md:w-auto" name="email" id="email" type="email" placeholder="Email">
                    <input class="py-1 px-4 rounded-r-full focus:outline-none bg-red-400 hover:bg-red-500 cursor-pointer" type="submit" value="Join">
                </form>
                <p class="my-4">©2021 <a href="#" class="font-bold">Zumra</a>. All rights reserved</p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer() ?>

</body>

</html>