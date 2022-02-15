    <footer class="">
      <p class="">Copyright © Arvid Wedtstein</p>
      <?php
        wp_nav_menu(
          array(
            'menu' => "footer",
            'container' => "",
            'theme_location' => "footer",
            'items_wrap' => '<div id="" class="flex space-x-4">%3$s</div>'
          )
        );
      ?>
      <?php
        dynamic_sidebar('footer-1');
        $curl = curl_init();

        $url = sprintf("%s?%s", $url, http_build_query($data));


        $result = curl_exec($curl);

        echo $result
        curl_close();
      ?>
    </footer>
  </div>
<?php
  wp_footer();
?>
</body>
</html>