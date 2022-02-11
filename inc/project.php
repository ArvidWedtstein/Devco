<?php
function devco_create_projectposttype() {

    /* Project Taxonomy Category*/
    $taxonomieLabels = array(
        'name' => _x( 'Project Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Project Category', 'taxonomy singular name' ),
        'search_items' => __( 'Search Project Categories' ),
        'all_items' => __( 'All Project Categories' ),
        'parent_item' => __( 'Parent Project Category' ),
        'parent_item_colon' => __( 'Parent Project Category:' ),
        'edit_item' => __( 'Edit Project Category' ),
        'update_item' => __( 'Update Project Category' ),
        'add_new_item' => __( 'Add New Project Category' ),
        'new_item_name' => __( 'New Project Category' ),
        'menu_name' => __( ' Project Categories' ),
    );
    $taxonomieargs = array(
        'labels'            => $taxonomieLabels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project_category')
    );
    register_taxonomy( 'project_category', 'project', $taxonomieargs );


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
        'post-thumbnail'
    );
    $labels = array(
        'name' => _x('Project', 'plural'),
        'singular_name' => _x('Project', 'singular'),
        'menu_name' => _x('Projects', 'admin menu'),
        'name_admin_bar' => _x('Projects', 'admin bar'),
        'add_new' => _x('Create New Project', 'add new'),
        'add_new_item' => __('Add Project'),
        'new_item' => __('New project'),
        'edit_item' => __('Edit project'),
        'view_item' => __('View project'),
        'all_items' => __('All Projects'),
        'search_items' => __('Search in projects'),
        'not_found' => __('No project found.'),
        'update_item' => __('Update Project')
    );
    
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'show_ui' => true,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project'),
        'has_archive' => true,
        'hierarchical' => true,
        'taxonomies' => array('post_tag', 'thumbnail', 'project_category'),
        'menu_icon'           => get_bloginfo('template_url') . "/assets/images/devcoLogoTiny.png",
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true,
        'menu_position'       => 6,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'description'         => 'project'
    );

    register_post_type('project', $args);
}
add_action('init', 'devco_create_projectposttype');

?>