
<div class="container">
  <div class="m-4 lg:flex lg:flex-wrap">
    <div class="p-4 md:w-1/3">
      <div class="p-8 bg-discord-800 rounded shadow-md text-white">
        <a class="text-2xl font-bold text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        <div class="flex justify-between">
          <span class="text-sm text-white"><?php the_date(); ?></span>
          <span class="inline-flex text-white">
            <?php comments_number(); ?>
          </span>
          <span class="inline-flex text-white">
            <svg xmlns="http://www.w3.org/2000/svg"
              class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <?php the_author(); ?>
          </span>
        </div>
        <img class="object-fill h-48 w-96" src="<?php the_post_thumbnail_url('thumbnail'); ?>">
        <?php 
          the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>');
        ?>
        <p class="text-justify">
          <?php
            the_excerpt();
          ?>
        </p>
        <div class="flex items-center mt-4">
          <a href="<?php the_permalink(); ?>" class="inline-flex items-center px-4 py-2 text-indigo-800 bg-indigo-200 cursor-pointer md:mb-2 lg:mb-0">
            Read More
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-1" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>