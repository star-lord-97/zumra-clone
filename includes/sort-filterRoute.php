<!-- the entire file is new -->

<?php
// create new custom rest api
add_action('rest_api_init', 'products_sort_filter');

function products_sort_filter()
{
    register_rest_route('api/v1', 'products', [
        'methods' => WP_REST_Server::READABLE, // this is like sending get requist
        'callback' => 'sort_filter_results' // function we want to use to return the data

    ]);
}

function sort_filter_results($data)
{
    // get the search, sort and filter parameters
    $searchTerm = $data->get_param('term');
    $lower = $data->get_param('lower');
    $upper = $data->get_param('upper');
    $orderBy = $data->get_param('orderby');
    $taxonomy = $data->get_param('taxonomy');
    $page = $data->get_param('page');
    if (!$page) {
        $page = 1;
    }
    $post_per_page = 4;

    // filter prices between ranges 
    if (isset($lower) && isset($upper)) {

        // if the products have any sorting values sent via GET method
        if (isset($orderBy)) {
            // create the sorting values sent via GET 
            $splitGET = explode(" ", $orderBy);
            $order = $splitGET[0];
            $compare_key = $splitGET[1];

            // if the sorting is made by a product custom field then make the meta_key equal to this custom field name
            // else make meta_key equal to default value(null) and set the orderby property to this sorting value 
            if ($compare_key == 'price') {
                $orderBy = 'meta_value_num';
            } else {
                $orderBy = $splitGET[1];
                $compare_keyGET = null;
            }

            // if the sorting is done by values and price ranges then create this WP_Query
            if (isset($taxonomy)) {
                $mainQuery = new WP_Query(
                    array(
                        'post_type' => 'product',
                        'posts_per_page' => $post_per_page,
                        'paged' => $page,
                        's' => sanitize_text_field($searchTerm),
                        'meta_key' => $compare_key,
                        'orderby' => $orderBy,
                        'order' => $order,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product-category',
                                'field'    => 'name',
                                'terms'    => $taxonomy,
                            )
                        ),
                        'meta_query' => array(
                            array(
                                'key' => 'price',
                                'value' =>  array($lower, $upper),
                                'compare' => 'BETWEEN',
                                'type' => 'NUMERIC'
                            )
                        )
                    )
                );
            } else {
                $mainQuery = new WP_Query(
                    array(
                        'post_type' => 'product',
                        'posts_per_page' => $post_per_page,
                        'paged' => $page,
                        's' => sanitize_text_field($searchTerm),
                        'meta_key' => $compare_key,
                        'orderby' => $orderBy,
                        'order' => $order,
                        'meta_query' => array(
                            array(
                                'key' => 'price',
                                'value' =>  array($lower, $upper),
                                'compare' => 'BETWEEN',
                                'type' => 'NUMERIC'
                            )
                        )
                    )
                );
            }
        } else {
            // if the sorting is done only by price ranges then create this query
            // if this page is custom taxonomy add a filter tax_query to render only this category products
            if ($taxonomy) {
                $mainQuery = new WP_Query(
                    array(
                        'post_type' => 'product',
                        'posts_per_page' => $post_per_page,
                        'paged' => $page,
                        's' => sanitize_text_field($searchTerm),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product-category',
                                'field'    => 'name',
                                'terms'    => $taxonomy,
                            )
                        ),
                        'meta_query' => array(
                            array(
                                'key' => 'price',
                                'value' =>  array($lower, $upper),
                                'compare' => 'BETWEEN',
                                'type' => 'NUMERIC'
                            )
                        )
                    )
                );
            } else {
                $mainQuery = new WP_Query(
                    array(
                        'post_type' => 'product',
                        'posts_per_page' => $post_per_page,
                        'paged' => $page,
                        's' => sanitize_text_field($searchTerm),
                        'meta_query' => array(
                            array(
                                'key' => 'price',
                                'value' =>  array($lower, $upper),
                                'compare' => 'BETWEEN',
                                'type' => 'NUMERIC'
                            )
                        )
                    )
                );
            }
        }
    } else {
        if (isset($taxonomy)) {
            $mainQuery = new WP_Query(
                array(
                    'post_type' => 'product',
                    'posts_per_page' => $post_per_page,
                    'paged' => $page,
                    's' => sanitize_text_field($searchTerm),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product-category',
                            'field'    => 'name',
                            'terms'    => $taxonomy,
                        )
                    ),
                )
            );
        } else {
            $mainQuery = new WP_Query(
                array(
                    'post_type' => 'product',
                    'posts_per_page' => $post_per_page,
                    'paged' => $page,
                    's' => sanitize_text_field($searchTerm)
                )
            );
        }
    }
    $results = [
        'Products' => [],
        'paginationInfo' => []
    ];

    while ($mainQuery->have_posts()) {
        $mainQuery->the_post();
        $product_taxonomy = get_the_terms(get_the_ID(), 'product-category');
        array_push(
            $results['Products'],
            [
                'permalink' => get_the_permalink(),
                'title' => get_the_title(),
                'image' => get_the_post_thumbnail_url(null, 'product-card-thumbnail'),
                'rate' => get_field('rate'),
                'price' => get_field('price'),
                'on_sale' => get_field('on_sale'),
                'sale_price' => get_field('sale_price'),
                'taxonomy' => $product_taxonomy[0]->name,
            ]
        );
    }
    // pagination varibles sent to front-end to be rendered
    $show_start = 1;
    if ($page > 1) {
        $show_start = ((intval($page) - 1) * $post_per_page) + 1;
    }
    if (intval($page) == $mainQuery->max_num_pages) {
        $show_end = $mainQuery->found_posts;
    } else {
        $show_end = $page * $post_per_page;
    }
    $prev_pageCount = intval($page) - 1;
    $next_pageCount = intval($page) + 1;
    if (isset($taxonomy)) {
        $taxonomy_link = get_term_link($taxonomy, 'product-category');
        array_push($results['paginationInfo'], [
            'pagination' => paginate_links(array(
                'base' => $taxonomy_link . '%_%',
                'format' => '?page=%#%',
                'total' => $mainQuery->max_num_pages,
                'current' => $page,
                'show_all' => False,
                'prev_next' => True,
                'type' => 'plain',
            )),
            'total_posts' => $mainQuery->found_posts,
            'show_start' => $show_start,
            'show_end' => $show_end
        ]);
    } else {
        array_push($results['paginationInfo'], [
            'pagination' => paginate_links(array(
                'base' => site_url('/products') . '%_%',
                'format' => '?page=%#%',
                'total' => $mainQuery->max_num_pages,
                'current' => $page,
                'show_all' => False,
                'prev_next' => True,
                'type' => 'plain',
            )),
            'total_posts' => $mainQuery->found_posts,
            'show_start' => $show_start,
            'show_end' => $show_end
        ]);
    }

    return $results;
}
