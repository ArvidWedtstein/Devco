<html lang="en">
<head>
  <!-- <link rel="stylesheet" href="/wp-content/themes/Wordpress-Theme/style.css"> -->
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
  <title>Devco</title>
  <?php
    wp_head();
  ?>
</head>
<body>
  <header>
    <div style="text-align: center" class="container mx-auto px-4">
      <div class='p-12 bg-ddarkblue text-white shadow-lg'>
        <h1 class='text-6xl'>Devco</h1>
        <p class='lead'>Devco spesialliserer seg innen webutvikling og mye annet</p>
        <hr class='my-4'>
        <p class='lead'></p>
      </div>
    </div>
  </header>
  <div class="main-wrapper">
    <div class="page-title">
      <h1 class="heading">Page Title</h1>
    </div>