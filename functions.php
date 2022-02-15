<?php

function devco_menus() {

    register_nav_menus(
        array(
            'header' => "Desktop primary header",
            'footer' => "Footer Menu Items",
        )
    );
    // add_editor_style('editor-style');
}
add_action("init", 'devco_menus');

// add widgets
require get_template_directory() . '/inc/widgets.php';



function devco_theme_support() {
    add_theme_support('title-tag'); // Adds dynamic title tag support
    add_theme_support('custom-logo'); // Add custom logo

    /* Add Post Thumbnails */
    add_theme_support( 'post-thumbnails' );
	  set_post_thumbnail_size( 1568, 9999 );
    add_theme_support('dark-editor-style');
    add_theme_support(
      'custom-background',
      array(
        'default-color' => 'f5efe0',
      )
    );
    add_theme_support('wp-block-styles');
    add_theme_support( 'editor-styles' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-color-palette' );
    add_theme_support( 'block-templates' );
    add_theme_support('widgets-block-editor');
    add_theme_support( 'align-wide' );
    add_theme_support('widgets');
    add_theme_support('post-formats');
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support(
		'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
        'navigation-widgets',
      )
    );
}
add_action('after_theme_setup', 'devco_theme_support');

// Wordpress klare kje å handla rekkefølgen css loade, så detta tullet e nødvendig
function devco_register_styles() {
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style("Devco-style", get_template_directory_uri() . "/style.css", array(), $version, 'all');
    wp_enqueue_style( 'style', get_stylesheet_uri() );
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

// function devco_get_projects($url, $data = false) {
//   $curl = curl_init();

//   $url = sprintf("%s?%s", $url, http_build_query($data));


//   $result = curl_exec($curl);

//   curl_close();
//   $postarry = array();
//   foreach($result as &$value) {
//     array_push($postarry, {
//       'post_title' -> $value.
//     })
//   }
// }


// add custom roles
require get_template_directory() . '/inc/roles.php';


// Add custom posttype
require get_template_directory() . '/inc/oppdrag.php';

// Add Projects type
require get_template_directory() . '/inc/project.php';

/* Customizer Options */
require get_template_directory() . '/inc/customizer.php';


/* Devco Settings */
require get_template_directory() . '/inc/settings.php';


// Register blocks
require get_template_directory() . '/inc/blocks.php';

// Enable custom author infobox
require get_template_directory() . '/inc/author-info-box.php';


// Enable block patterns
require get_template_directory() . '/inc/block-patterns.php';

function mytheme_block_templates( $args, $post_type ) {

    // Only add template to 'post' post type
    // Change for your post type: eg 'page', 'event', 'product'
    if ( 'oppdrag' == $post_type ) {
  
      // Optionally lock templates from further changes
      // Change to 'insert' to allow adding other blocks, but lock defined blocks
      $args['template_lock'] = 'all';
  
      // Set the template
      $args['template'] = [
        [
          // Example of including a core image block
          // Optional alignment setting        
          'core/image', [
            'align' => 'left',
          ]
        ],
        [
          // Example of including a core paragraph block        
          // Optional alignment placeholder setting         
          'core/paragraph', [
            'placeholder' => 'The only thing you can add',
            'align' => 'right',
          ]
        ],
        [
          // Example of including a custom block        
          // Optional placeholder setting        
          'devco/oppdrag', [
            'placeholder' => 'Custom placeholder',
          ]
        ]
      ];
    }
  
    return $args;
  
  }
  // Hook function into post type arguments filter
  add_filter( 'register_post_type_args', 'mytheme_block_templates', 20, 2 );

// https://blog.templatetoaster.com/wordpress-settings-api-creating-theme-options/

?>

