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
    add_theme_support('post-thumbnails', array( 'post', 'oppdrag' ));
    add_theme_support('dark-editor-style');
    add_theme_support('custom-background');
    add_theme_support('wp-block-styles');
    add_theme_support( 'editor-styles' );
    add_theme_support( 'html5', array('style','script', ) );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-color-palette' );
    add_theme_support( 'block-templates' );
    add_theme_support('widgets-block-editor');
    add_theme_support('widgets');
    add_theme_support('post-formats');
}
//add_action('after_theme_setup', 'devco_theme_support');


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
require get_template_directory() . '/inc/oppdrag.php';

/* Customizer Options */
require get_template_directory() . '/inc/customizer.php';


/* Devco Settings */
require get_template_directory() . '/inc/settings.php';


// https://blog.templatetoaster.com/wordpress-settings-api-creating-theme-options/
?>

