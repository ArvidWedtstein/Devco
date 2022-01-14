
 <section>
  <div class="m-4 lg:flex lg:flex-wrap">
    <div class="p-4 md:w-1/3">
      <div class="p-8 bg-blue rounded shadow-md">
        <div class="flex justify-between">
          <span class="text-sm text-gray-500"><?php the_date(); ?></span>
          <span class="inline-flex text-gray-500"><?php the_author(); ?></span>
        </div>
        <?php 
          the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>');
        ?>
        <p class="text-justify text-gray-600">
          <?php
            the_content();
          ?>
        </p>
        <div class="flex items-center mt-4">
          <a
            class="inline-flex items-center px-4 py-2 text-indigo-800 bg-indigo-200 cursor-pointer md:mb-2 lg:mb-0">Read
            More
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-1" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
          </a>
          <a class="inline-flex items-center px-4 py-2 text-indigo-800 bg-indigo-200 cursor-pointer md:mb-2 lg:mb-0"><?php comments_number(); ?></a>
          <?php comments_template(); ?>
        </div>
      </div>
    </div>
  </div>
</section>