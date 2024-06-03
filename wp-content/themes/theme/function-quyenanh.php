<?php
define('DISALLOW_FILE_MODS', true);


function getimage($id, $size = 'full', $true = '')
{

    if ($true == 'post') {
        if (get_the_post_thumbnail($id) != null) {
            return get_the_post_thumbnail_url($id, $size);
        }
    } else {
        $attachment_url = wp_get_attachment_image_url($id, $size);
        if ($attachment_url) {
            return $attachment_url;
        }
    }
    return get_field('image_no_image', 'option');
}


if (function_exists('acf_add_options_page')) {
    // add parent
    $parent = acf_add_options_page(array(
        'page_title' => 'Cấu hình chung',
        'menu_title' => 'Cấu hình chung',
        'redirect' => false
    ));
}

show_admin_bar(false);
// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '6.4.3') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}

add_action('admin_head', 'fix_svg');

// get category product
function get_all_category_product()
{
    $category = get_term_by('slug', 'product_categories');
    if ($category === null) {
        echo json_encode(array('error' => 'No category found with provided slug'));
        die();
    }
    $category_child = get_terms(array(
        'taxonomy' => 'product_categories',
        'hide_empty' => false,
        'parent' => $category->term_id
    ));
    $data = array();
    foreach ($category_child as $key => $value) {
        $data[$key]['id'] = $value->term_id;
        $data[$key]['name'] = $value->name;
        $data[$key]['slug'] = $value->slug;
        $subcategories = get_terms(array(
            'taxonomy' => 'product_categories',
            'hide_empty' => false,
            'parent' => $value->term_id
        ));

        foreach ($subcategories as $subKey => $subValue) {
            $data[$key]['subcategories'][$subKey]['id'] = $subValue->term_id;
            $data[$key]['subcategories'][$subKey]['name'] = $subValue->name;
            $data[$key]['subcategories'][$subKey]['slug'] = $subValue->slug;
        }
    }
    echo json_encode($data);
    die();
}

add_action('wp_ajax_get_all_category_product', 'get_all_category_product');
add_action('wp_ajax_nopriv_get_all_category_product', 'get_all_category_product');


function get_product_by_category()
{
    $slug = $_POST['slug'];
    $paged = isset($_POST['paged']) ? $_POST['paged'] : 1;

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 15,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_categories',
                'field' => 'slug',
                'terms' => $slug
            )
        )
    );
    $query = new WP_Query($args);
    $data = array();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $data['products'][] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'image' => getimage(get_post_thumbnail_id()),
                'link' => get_the_permalink()
            );
        }
    }
    if (empty($data['products'])) {
        echo json_encode(null);
        die();
    }

    // Thêm thông tin phân trang
    $data['pagination'] = array(
        'total_pages' => $query->max_num_pages,
        'current_page' => $paged
    );

    echo json_encode($data);
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_get_product_by_category', 'get_product_by_category');
add_action('wp_ajax_nopriv_get_product_by_category', 'get_product_by_category');

function get_all_product(){
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 15,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish'
    );

    $query_all = new WP_Query($args);
    $data = array(
        'products' => array(),
        'pagination' => array(
            'total_pages' => 1,
            'current_page' => $paged
        )
    );

    if ($query_all->have_posts()) {
        while ($query_all->have_posts()) {
            $query_all->the_post();
            $data['products'][] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                'link' => get_the_permalink()
            );
        }

        $data['pagination']['total_pages'] = $query_all->max_num_pages;
    }

    wp_reset_postdata();

    echo json_encode($data);
    wp_die();
}
add_action('wp_ajax_get_all_product', 'get_all_product');
add_action('wp_ajax_nopriv_get_all_product', 'get_all_product');

// get category post
function get_all_category_post()
{
    $category = get_term_by('slug', 'category');
    if ($category === null) {
        echo json_encode(array('error' => 'No category found with provided slug'));
        die();
    }
    $category_child = get_terms(array(
        'taxonomy' => 'category',
        'hide_empty' => false,
        'parent' => $category->term_id
    ));
    $data = array();
    foreach ($category_child as $key => $value) {
        if ($value->slug == 'khong-phan-loai' || $value->slug == 'bai-viet-noi-bat') {
            continue;
        }
        $data[$key]['id'] = $value->term_id;
        $data[$key]['name'] = $value->name;
        $data[$key]['slug'] = $value->slug;
    }
    echo json_encode($data);
    die();
}
add_action('wp_ajax_get_all_category_post', 'get_all_category_post');
add_action('wp_ajax_nopriv_get_all_category_post', 'get_all_category_post');


function get_all_post(){
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 8,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish'
    );

    $query_all = new WP_Query($args);
    $data = array(
        'posts' => array(),
        'pagination' => array(
            'total_pages' => 1,
            'current_page' => $paged
        )
    );

    if ($query_all->have_posts()) {
        while ($query_all->have_posts()) {
            $query_all->the_post();
            $data['posts'][] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'image' => getimage(get_post_thumbnail_id()),
                'link' => get_the_permalink(),
                'date' => get_the_date('d/m/Y')
            );
        }

        $data['pagination']['total_pages'] = $query_all->max_num_pages;
    }

    wp_reset_postdata();

    echo json_encode($data);
    wp_die();
}
add_action('wp_ajax_get_all_post', 'get_all_post');
add_action('wp_ajax_nopriv_get_all_post', 'get_all_post');

function get_post_by_category()
{
    $slug = $_POST['slug'];
    $paged = isset($_POST['paged']) ? $_POST['paged'] : 1;

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 8,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'category_name' => $slug
    );
    $query = new WP_Query($args);
    $data = array();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $data['posts'][] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'image' => getimage(get_post_thumbnail_id()),
                'link' => get_the_permalink(),
                'date' => get_the_date('d/m/Y')
            );
        }
    }
    if (empty($data['posts'])) {
        echo json_encode(null);
        die();
    }

    $data['pagination'] = array(
        'total_pages' => $query->max_num_pages,
        'current_page' => $paged
    );

    echo json_encode($data);
    wp_reset_postdata();
    die();
}
add_action('wp_ajax_get_post_by_category', 'get_post_by_category');
add_action('wp_ajax_nopriv_get_post_by_category', 'get_post_by_category');














