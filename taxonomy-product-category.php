<!-- the entire file is new -->
<!-- category archive -->

<?php
get_header();
// query taxonomy objects
$taxonomy = get_queried_object();
?>
<main class="pt-20 bg-gray-100">
    <!-- product navigation -->
    <div class="m-4">
        <nav class="grid justify-start grid-flow-col gap-4 text-justify" id="page-nav">
            <a class="hover:underline" href="<?php echo site_url(); ?>" id="home link">Home</a>
            <p class="text-red-500" id="category name">
                <?php echo $taxonomy->name; ?>
            </p>
        </nav>
    </div>
    <div class="grid gap-4 m-4 sm:grid-flow-col">
        <div class="w-full sm:w-52">
            <!-- All Categoires Panel-->
            <div class="grid grid-flow-row divide-y divide-gray-400">
                <a href="<?php echo site_url('/products'); ?>" class="text-center text-white bg-gray-500">ALL CATEGORIES</a>
                <?php
                $categories = get_categories(array(
                    'taxonomy' => 'product-category',
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'parent' => 0,
                    'hide_empty' => 0 //change to 1 to hide categores not having a single post
                ));
                foreach ($categories as $categorie) {
                ?>
                    <a class="text-center hover:text-red-500" href="<?php echo get_term_link($categorie->term_id, $categorie->taxonomy); ?>">
                    <?php echo $categorie->name;
                };
                    ?>
                    </a>

            </div>
            <!-- filter by price -->
            <div class="">
                <h1 class="text-center">FILTER BY PRICE</h1>
                <form class="" method="get" action="">
                    <div class="flex justify-center h-2" id="slider-handles">
                    </div>
                    <div class="text-center" id="slider-value">
                    </div>

                    <!-- hidden input tags to send the price ranges via get method -->
                    <input name="lower" class="hidden" id="lower">
                    <input name="upper" class="hidden" id="upper">
                    <input name="orderby" class="hidden" id="sort-filter">
                    <button class="w-full text-white bg-red-500 " id="filter-btn" type="submit">FILTER</button>
                </form>
            </div>
        </div>
        <div class="">
            <!-- Sort-by panel -->
            <div class="grid grid-flow-col bg-white">
                <div id="results-counter" class="relative pt-1 m-2"></div>
                <div class="grid justify-self-end">
                    <form class="h-8 m-2 border-2 w-52" method="get" action="">
                        <select id="orderby-list" name="orderby">
                        </select>
                        <!-- hidden input tags to send the sorting values via get method -->
                        <input name="lower" class="hidden" id="lower">
                        <input name="upper" class="hidden" id="upper">
                        <input class="hidden" id="sort-btn" type="submit">
                    </form>
                </div>
            </div>
            <!-- all products -->
            <div id="product-results" class="grid grid-cols-1 gap-4 pt-4 sm:grid-cols-4">
            </div>
            <div id="paginate-links">
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>