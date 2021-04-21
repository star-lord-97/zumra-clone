<?php 
get_header();
?>
<main class="bg-gray-100">
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
                <input name="lower" class="hidden" id="lower">
                <input name="upper" class="hidden" id="upper">
                <button class="w-full text-white bg-red-500 " id="filter-btn" type="submit">FILTER</button>
            </form>
        </div>
        <div>
            <!-- Sort-by panel -->
            <div>
                <form method="get" action="">
                    <select name="orderby" >
                        <option value="ASC" >sort by price low to high</option>
                        <option value="DESC" >sort by price high to low</option>
                        <input name="lower" class="hidden" id="lower">
                        <input name="upper" class="hidden" id="upper">
                    </select>
                    <input id="sort-btn" type="submit" value="submit">
                <form>
            </div>
            <!-- all products -->
            <div class="grid grid-cols-4 gap-4">
                <?php 
                // filter between prices
                if (isset($_GET['upper']) && isset($_GET['lower'])){
                    $upper = $_GET['upper'];
                    $lower = $_GET['lower'];
                    if (isset($_GET['orderby'])){
                        $priceSort = $_GET['orderby'];
                        $results = new WP_Query(array(
                            'posts_per_page' => 4,
                            'post_type' => 'product',
                            'meta_key' => 'price',
                            'orderby' => 'meta_value_num',
                            'order' => $priceSort,
                            'meta_query' => array(array(
                                'key' => 'price',
                                'value' =>  array($lower,$upper),
                                'compare' => 'BETWEEN',
                                'type' => 'NUMERIC'
                            )
                            )
                        )
                        );
                    }else{
                        $results = new WP_Query(array(
                            'posts_per_page' => 4,
                            'post_type' => 'product',
                            'meta_query' => array(array(
                                'key' => 'price',
                                'value' =>  array($lower,$upper),
                                'compare' => 'BETWEEN',
                                'type' => 'NUMERIC'
                            )
                            )
                        )
                        );
                    }
                    
                    while($results->have_posts()){
                        $results->the_post();
                        get_template_part('templates/product-item', null, array(
                            'title' => get_the_title(),
                            'image' => get_the_post_thumbnail_url(null, 'product-thumbnail'),
                            'rate' => 4.7,
                            'price' => get_field('price'),
                            'on_sale' => get_field('on_sale'),
                            'sale_price' => get_field('sale_price')
                        ));
                    }
                }else{
                    while(have_posts()){
                        the_post();
                        get_template_part('templates/product-item', null, array(
                            'title' => get_the_title(),
                            'image' => get_the_post_thumbnail_url(null, 'product-thumbnail'),
                            'rate' => 4.7,
                            'price' => get_field('price'),
                            'on_sale' => get_field('on_sale'),
                            'sale_price' => get_field('sale_price')
                        ));
                    }

                }
                
                ?>

            </div>
        </div>
    </div>
</main>
<?php 
get_footer();
?>