<?php

function devco_menus() {
    $locations = array(
        'header' => "Desktop primary header",
        'footer' => "Footer Menu Items",
    );

    register_nav_menus($locations);
    add_editor_style('editor-style');
}
add_action("init", 'devco_menus');


function devco_widget_areas() {
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="ml-auto flex items-center">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar widget area',
        )
    );

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer widget area',
        )
    );
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Front Page Area',
            'id' => 'front-1',
            'description' => 'Front Page widget area',
        )
    );
}
add_action('widgets_init', 'devco_widget_areas');


function devco_theme_support() {

    // Adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    /*add_theme_support('custom-background');*/
    add_theme_support('wp-block-styles');
    add_theme_support( 'editor-styles' );
    add_theme_support( 'html5', array('style','script', ) );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-color-palette' );
    add_theme_support( 'block-templates' );
}
add_action('after_theme_setup', 'devco_theme_support');


// Wordpress klare kje å handla rekkefølgen css loade, så detta tullet e nødvendig
function devco_register_styles() {
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style("Devco-style", get_template_directory_uri() . "/style.css", array(), $version, 'all');
    
    // Font Awesome Icons
    wp_enqueue_style("Devco-fontawesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", array(), '4.7.0', 'all');
    
    /// Disabled Bootstrap
    // wp_enqueue_style("Devco-bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css", array(), '5.0.2', 'all');
    
}

add_action('wp_enqueue_scripts', "devco_register_styles");


function devco_register_scripts() {
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style("Devco-tailwind", "https://cdn.tailwindcss.com", array(), "3.0.12", false);
    wp_enqueue_style("Devco-tailwindconfig", get_template_directory_uri()."/tailwind.config.js", array(), $version, false);

    // For test purposes only.
    wp_enqueue_style("Devco-alpinejs", "https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js", array(), "3", false);
    wp_enqueue_style("Devco-mainscript", get_template_directory_uri()."/assets/js/main.js", array(), $version, true);
    
}
add_action('wp_enqueue_scripts', "devco_register_scripts");


// Add custom posttype
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
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'oppdrag'),
        'has_archive' => true,
        'hierarchical' => false,
    );

    register_post_type('oppdrag', $args);
}
add_action('init', 'devco_create_posttype');

/* Customizer Options */
require get_template_directory() . '/inc/customizer.php';

function devco_add_settings() {
    //add_theme_page("Theme Customization", "Theme Customization", "manage_options", "theme_options", "theme_option_page", null, 99);
    add_menu_page(
        __( 'Devco', 'my-textdomain' ),
        __( 'Devco', 'my-textdomain' ),
        'manage_options',
        'sample-page',
        'theme_option_page',
        'dashicons-schedule',
        3
    );
    // add_submenu_page('themes.php', 'testsubpage', 'test sub page', "manage_options", "theme-options", null, 0);
}

add_action('admin_menu', 'devco_add_settings' );


function theme_option_page() {
    ?>
    <div class="wrap">
    <h1>Custom Theme Options Page</h1>
    <form method="post" action="options.php">
    <?php
        // display all sections for theme-options page

        settings_fields( 'sample-page' );
        do_settings_sections( 'sample-page' );
        submit_button();
    ?>
    </form>
    </div>
    <?php
}
function my_setting_markup() {
    ?>
    <label for="my-input"><?php _e( 'My Input' ); ?></label>
    <input type="text" id="my_setting_field" name="my_setting_field" value="<?php echo get_option( 'my_setting_field' ); ?>">
    <?php
}
function my_setting_section_callback_function() {
    echo '<p>Intro text for our settings section</p>';
}
    //admin-init hook to create settings section with title “New Theme Options Section”.
function test_theme_settings(){
    add_settings_section(
        'sample_page_setting_section',
        __( 'Custom settings', 'my-domain'),
        'my_settings_callback_function',
        'sample-page'
    );
    add_settings_field(
        'my_setting_field',
        __( 'My custom setting field', 'my-textdomain' ),
        'my_setting_markup',
        'sample-page',
        'sample_page_setting_section'
    );

    register_setting( 'sample-page', 'my_setting_field' );
}
add_action('admin_menu','test_theme_settings');

// https://blog.templatetoaster.com/wordpress-settings-api-creating-theme-options/
?>

