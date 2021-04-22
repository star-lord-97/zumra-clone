<?php 

// filter prices between ranges 
if (isset($_GET['upper']) && isset($_GET['lower'])){
    $upper = $_GET['upper'];
    $lower = $_GET['lower'];

    // if the products have any sorting values sent via GET method
    if (isset($_GET['orderby'])){

        // create the sorting values sent via GET 
        $splitGET = explode(" ", $_GET['orderby']);
        $orderGET = $splitGET[0];
        $compare_keyGET = $splitGET[1];

        // if the sorting is made by a product custom field then make the meta_key equal to this custom field name
        // else make meta_key equal to default value(null) and set the orderby property to this sorting value 
        if($compare_keyGET=='price'){
            $orderBy = 'meta_value_num';
        }else {
            $orderBy = $splitGET[1];
            $compare_keyGET = null;
        }

        // if the sorting is done by values and price ranges then create this WP_Query
        if ($args['is_taxonomy']){
            $results = new WP_Query(array(
                'posts_per_page' => 4,
                'post_type' => 'product',
                'meta_key' => $compare_keyGET,
                'orderby' => $orderBy,
                'order' => $orderGET,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product-category',
                        'field'    => 'name',
                        'terms'    => $args['taxonomy']->name,
                    )
                ),
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
                'meta_key' => $compare_keyGET,
                'orderby' => $orderBy,
                'order' => $orderGET,
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
        
    }else{
        // if the sorting is done only by price ranges then create this query
        // if this page is custom taxonomy add a filter tax_query to render only this category products

        if($args['is_taxonomy']){
            $results = new WP_Query(array(
                'posts_per_page' => 4,
                'post_type' => 'product',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product-category',
                        'field'    => 'name',
                        'terms'    => $args['taxonomy']->name,
                    )
                ),
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
        
    }
    // render the product filter and sorting 
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
    // if there are no sorting or filtering of any kind then render all the products
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