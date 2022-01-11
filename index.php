<?php


?>
<html lang="en">
<head>
  <!-- <link rel="stylesheet" href="/wp-content/themes/Wordpress-Theme/style.css"> -->
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            dblack: '#141204',
            dgrey: "#5C6F68",
            dred: "#EF3E36",
            ddarkblue: "#0B1D51",
            dblue: "#5DB7DE"
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
</head>
<body>
  <div style="text-align: center" class="container mx-auto px-4">
    <div class='p-12 bg-ddarkblue text-white shadow-lg'>
      <h1 class='text-6xl'>Devco</h1>
      <p class='lead'>Devco spesialliserer seg innen webutvikling og mye annet</p>
      <hr class='my-4'>
      <p class='lead'></p>
    </div>
    <div class="w-100 p-3 bg-dblue">
      <h3 class="text-3xl">Våre tjenester:</h3>
      <div class="columns-3">
        <div class="bg-dgrey text-white rounded-md mx-auto p-1 transition ease-in-out delay-0 hover:shadow-devco duration-200 border-solid border-2 border-black-800">
          <p class="text-white-600">Webutvikling</p>
        </div>
        <div class="bg-dgrey text-white rounded-md mx-auto p-1 transition ease-in-out delay-0 hover:shadow-devco duration-200 border-solid border-2 border-black-800">
          <p class="text-white-600">Webutvikling</p>
        </div>
        <div class="bg-dgrey text-white rounded-md mx-auto p-1 transition ease-in-out delay-0 hover:shadow-devco duration-200 border-solid border-2 border-black-800">
          <p class="text-white-600">Webutvikling</p>
        </div>
      </div>
    </div>
  </div>
  <?php
    wp_footer();
  ?>
</body>
</html>