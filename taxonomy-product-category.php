<?php 
get_header();
// query taxonomy objects
$taxonomy = get_queried_object();
?>
<main class="pt-32 bg-gray-100">
    <!-- product navigation -->
    <div class="m-4" >
        <nav class="grid justify-start grid-flow-col gap-4 text-justify" id="page-nav">
            <a class="hover:underline" href="<?php echo site_url();?>" id="home link">Home</a>
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
                    require get_theme_file_path('/includes/categories-list.php');
                ?>
            </div>
            <!-- filter by price -->
            <?php get_template_part('templates/price-filter');?>
        </div>
        <div class="">
            <!-- Sort-by panel -->
            <?php get_template_part('templates/sortby-list');?>
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