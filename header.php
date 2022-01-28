<html lang="en">
<head>
  <link rel="stylesheet" href="/wp-content/themes/Wordpress-Theme/style.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            dblack: '#141204',
            dgrey: "#5C6F68",
            dred: "#EF3E36",
            ddarkblue: "#0B1D51",
            dblue: "#5DB7DE",
            discord: "#202225",
            discord2: "#5865F2",
            discord: {
              900: "#202225",
              800: "#2f3136",
              700: "#36393f",
              600: "#4f545c",
              400: "#d4d7dc",
              300: "#e3e5e8",
              200: "#ebedef",
              100: "#f2f3f5"
            }
          },
          boxShadow: {
            'devco': '0 2.8px 2.2px hsl(200 50% 3% / calc(.3 + .03)), 0 6.7px 5.3px hsl(200 50% 3% / calc(.3 + .01)), 0 12.5px 10px hsl(200 50% 3% / calc(.3 + .02)),0 22.3px 17.9px hsl(200 50% 3% / calc(.3 + .02)),0 41.8px 33.4px hsl(200 50% 3% / calc(.3 + .03)), 0 100px 80px hsl(200 50% 3% / .3)',
          }
        }
      }
    }
  </script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo get_bloginfo('name') ?></title>
  <style>
    .menu-item {
      list-style-type: none;
      padding: 0.5rem;
      background: #36393f;
      border-radius: 0.25rem;
      color: #ffffff;
    }
  </style>
  <?php
    wp_head();
  ?>
</head>
<body>
  <header>
    <!--<div style="text-align: center" class="container mx-auto px-4">
      <div class='p-12 bg-ddarkblue text-white shadow-lg'>
        <h1 class='text-6xl'>Devco</h1>
        <p class='lead'>Devco spesialliserer seg innen webutvikling og mye annet</p>
        <hr class='my-4'>
        <p class='lead'></p>
      </div>
    </div>-->
    <nav class="bg-gray-800">
      <div class="w-full max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex-shrink-0 flex items-center">
              <?php
                $custom_logo_id = get_theme_mod( 'devco_theme_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if (has_custom_logo()) {
                  echo '<img class="mx-auto my-auto" width="30" src="' . get_theme_mod( 'devco_theme_logo' ) . '" alt="' . get_bloginfo('name') . '">';
                } 
                // echo get_option('my_setting_field');
              ?>
              <a class="text-white text-xl font-bold" href="index.php"><?php echo get_bloginfo('name') ?></a>
            </div>
            <div class="hidden sm:block sm:ml-6">
              <?php
                wp_nav_menu(
                  array(
                    'menu' => "header",
                    'container' => "",
                    'theme_location' => "header",
                    'items_wrap' => '<div id="" class="flex space-x-4">%3$s</div>'
                  )
                );
              ?>
          </div>
        </div>
      </div>
      <!--<?php
        dynamic_sidebar('sidebar-1');
      ?>-->  
      
    </nav>
  </header>
  <div class="main-wrapper">
    <div class="page-title">

    </div>