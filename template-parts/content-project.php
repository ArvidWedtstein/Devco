
<section>
  <div class="container w-full min-w-full">
    <div class="rounded-xl shadow-lg bg-discord-900 text-white">
      <!-- <img class="w-full" src="" alt="Sunset in the mountains"> -->
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2 text-white"><?php the_title(); ?></div>
        <p class="text-white text-base">
          <?php the_author(); ?>
        </p>
        <?php 
          $tags = get_the_tags();
          $html = '<div class="">';
          if ($tags) {
            foreach ( $tags as $tag ) {
              $tag_link = get_tag_link( $tag->term_id );
          
              $html .= "<a href='{$tag_link}' title='{$tag->name}' class='inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2'>";
              $html .= "#{$tag->name}</a>";
            }
            $html .= '</div>';
            echo $html;
          }
        ?>
        <hr class="my-3">
        <?php 

            $phrase = get_the_content();
            // This is where wordpress filters the content text and adds paragraphs
            $phrase = apply_filters('the_content', $phrase);
            echo 
            $replace = '<p class="text-white text-base">';

            echo str_replace('<p class="text-white text-base">', $replace, $phrase);

        ?>
        <article>
          <input type="radio" name="switch-pos" id="pos-0">
          <input type="radio" name="switch-pos" id="pos-1">
          <input type="radio" name="switch-pos" id="pos-2" checked>
          <input type="radio" name="switch-pos" id="pos-3">
          <div class="chart">
            <div class="bar bar-30 white">
              <div class="face top">
                  <div class="growing-bar"></div>
              </div>
              <div class="face side-0">
                  <div class="growing-bar"></div>
              </div>
              <div class="face floor">
                  <div class="growing-bar"></div>
              </div>
              <div class="face side-a"></div>
              <div class="face side-b"></div>
              <div class="face side-1">
                  <div class="growing-bar"></div>
              </div>
            </div>
          </div>
          <p>Try another position :)</p>
          <nav class="actions">
              <label for="pos-0">1/4</label>
              <label for="pos-1">2/4</label>
              <label for="pos-2">3/4</label>
              <label for="pos-3">Full</label>
          </nav>
        </article>
        <hr class="my-3">
        <?php echo get_option( 'devco_color' ); ?>
        <?php comments_template(); ?>
      </div>
    </div>
  </div>
</section>