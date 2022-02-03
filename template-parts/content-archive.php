
<div class="p-4">
  <div class="p-8 bg-discord-800 rounded shadow-md text-white">
    <a class="text-2xl font-bold text-white" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <div class="flex justify-between">
      <span class="text-sm text-white"><?php the_date(); ?></span>
      <span class="inline-flex text-white">
        <?php comments_number(); ?>
      </span>
      <span class="inline-flex text-white">
        <img width="24" class="rounded-full" src="<?php 
          $get_author_id = get_the_author_meta('ID');
          $get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));
          echo $get_author_gravatar;
        ?>">
        <?php the_author_posts_link(); ?>
      </span>
    </div>
    <!-- <img class="object-fill h-48 w-full" src="<?php //the_post_thumbnail() ?>"> -->
    <img class="object-fill h-48 w-full" src="<?php echo the_post_thumbnail_url('thumbnail'); ?>">
    <?php 
      the_tags('<span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>');
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
