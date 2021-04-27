<div class="">
    <form class="grid grid-cols-3" method="get" action="<?php echo site_url('/');?>">
        <div class="bg-white rounded-l-xl" x-data="{ categoryDropdownMenu: false }" @click="categoryDropdownMenu = !categoryDropdownMenu">
            <div class='grid grid-flow-row bg-red-200 rounded-l-lg'>
                <ul x-show="categoryDropdownMenu" @click.away="categoryDropdownMenu = false" class="grid grid-flow-row">
                    <?php 
                        $categories = get_categories(array(
                            'taxonomy' => 'product-category',
                            'orderby' => 'name',
                            'order' => 'ASC', 
                            'parent' => 0,
                            'hide_empty' => 0 //change to 1 to hide categores not having a single post
                        ));
                        foreach($categories as $categorie){?>
                
                    <li>
                        <?php echo $categorie->name;?>
                        <input class="hidden" name="taxonomy" type="search" value="<?php $categorie->name;?>">
                    </li>
                        <?php }?>
                </ul>
            </div>
        </div>
        <!-- <input class="hidden" name="taxonomy" type="search"> -->
        <input class="" name="s" type="search" placeholder="What are you looking for ?">
        <a href="<?php echo site_url('/search');?>">
            <button type="submit" class="bg-red-400 rounded-r-xl"><i class="fas fa-search"></i></button>
        </a>
    </form>
</div>