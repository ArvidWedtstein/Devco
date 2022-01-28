<?php
function devco_create_posttype() {
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats', // post formats
        'post-tags',
    );
    $labels = array(
        'name' => _x('oppdrag', 'plural'),
        'singular_name' => _x('oppdrag', 'singular'),
        'menu_name' => _x('Oppdrag', 'admin menu'),
        'name_admin_bar' => _x('Oppdrag', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New oppdrag'),
        'new_item' => __('New news'),
        'edit_item' => __('Edit oppdrag'),
        'view_item' => __('View oppdrag'),
        'all_items' => __('All Oppdrag'),
        'search_items' => __('Search oppdrag'),
        'not_found' => __('No oppdrag found.'),
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'show_ui' => true,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'oppdrag'),
        'has_archive' => true,
        'hierarchical' => false,
        'taxonomies' => array('category', 'post_tag', 'thumbnail'),
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );

    register_post_type('oppdrag', $args);
}
add_action('init', 'devco_create_posttype');

?>