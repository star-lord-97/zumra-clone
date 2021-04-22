<?php 
get_header();

?>
<main class="pt-20 bg-gray-100">
    <!-- product navigation -->
    <div class="m-4" >
        <nav class="grid justify-start grid-flow-col gap-4 text-justify" id="page-nav">
            <a class="hover:underline" href="<?php echo site_url();?>" id="home link">Home</a>
            <p class="text-red-500" id="category name">
                All Products
            </p>
        </nav>
    </div>
    <div class="grid grid-flow-col gap-4 m-4">
        <div>
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
                    foreach($categories as $categorie){
                ?>
                <a class="text-center hover:text-red-500" href="<?php echo get_term_link($categorie->term_id, $categorie->taxonomy);?>">
                    <?php echo $categorie->name; 
                    };
                    ?>
                </a>

            </div>
            <!-- filter by price -->
            <h1>FILTER BY PRICE</h1>
            <form method="get" action="">
                <div id="slider-handles"> 
                </div>
                <div id="slider-value">
                </div>
                
                <!-- hidden input tags to send the price ranges via get method -->
                <input name="lower" class="hidden" id="lower">
                <input name="upper" class="hidden" id="upper">
                <input name="orderby" class="hidden" id="sort-filter">
                <button class="w-full text-white bg-red-500 " id="filter-btn" type="submit">FILTER</button>
            </form>
        </div>
        <div>
            <!-- Sort-by panel -->
            <div>
                <form method="get" action="">
                    <select id="orderby-list" name="orderby" >
                    </select>
                    <!-- hidden input tags to send the sorting values via get method -->
                    <input name="lower" class="hidden" id="lower">
                    <input name="upper" class="hidden" id="upper">
                    <input class="hidden" id="sort-btn" type="submit">
                <form>
            </div>
            <!-- all products -->
            <div class="grid grid-cols-4 gap-4">
                <?php 
                // rendering the sort results 
                require get_theme_file_path('/includes/sortQuery-results.php');
                ?>

            </div>
        </div>
    </div>

</main>
<?php 
get_footer();
?>