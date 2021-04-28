<div class="">
    <form class="grid grid-cols-3" method="get" action="<?php echo site_url('/');?>">
        <div class="bg-white rounded-l-xl">
            <div class='grid grid-flow-row bg-red-200 rounded-l-lg'>
                <select class="grid grid-flow-row" id="cat-search">
                    <option value="All Categories">
                        All Categories
                    </option>
                    <?php 
                        $categories = get_categories(array(
                            'taxonomy' => 'product-category',
                            'orderby' => 'name',
                            'order' => 'ASC', 
                            'parent' => 0,
                            'hide_empty' => 0 //change to 1 to hide categores not having a single post
                        ));
                        foreach($categories as $categorie){?>
                    <option value="<?php echo $categorie->name;?>">
                        <?php echo $categorie->name;?>
                    </option>
                        <?php }?>
                </select>
            </div>
        </div>
        <!-- <input class="hidden" name="taxonomy" type="search"> -->
        <input class="" name="s" type="search" placeholder="What are you looking for ?">
        <input id='cat-search-btn' class="hidden" name="taxonomy">
        <a href="<?php echo site_url('/search');?>">
            <button type="submit" class="bg-red-400 rounded-r-xl"><i class="fas fa-search"></i></button>
        </a>
    </form>
</div>