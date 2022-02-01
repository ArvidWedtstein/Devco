
<section>
  <div class="container w-full min-w-full">
    <div class="rounded-xl shadow-lg bg-discord-900">
      <!-- <img class="w-full" src="" alt="Sunset in the mountains"> -->
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2 text-white"><?php the_title(); ?></div>
        <p class="text-white text-base">
          <?php the_author(); ?>
        </p>
        <?php 
          $tags = get_the_tags();
          $html = '<div class="">';
          foreach ( $tags as $tag ) {
              $tag_link = get_tag_link( $tag->term_id );
          
              $html .= "<a href='{$tag_link}' title='{$tag->name}' class='inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2'>";
              $html .= "#{$tag->name}</a>";
          }
          $html .= '</div>';
          echo $html;
        ?>
        <hr class="my-3">
        <?php 

            $phrase = get_the_content();
            // This is where wordpress filters the content text and adds paragraphs
            $phrase = apply_filters('the_content', $phrase);
            $replace = '<p class="text-white text-base">';

            echo str_replace('<p>', $replace, $phrase);

        ?>
        <hr class="my-3">
        <?php echo get_option( 'devco_color' ); ?>
        <?php comments_template(); ?>
      </div>
    </div>
  </div>
</section>