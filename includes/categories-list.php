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
