<?php
  get_header();
?>
<article class="content px-3 py-5 p-md-5">
  <div class="flex flex-row flex-wrap">
    <?php    
    echo "proooooooooooooject";
    // list categories wp_list_categories();
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          get_template_part("template-parts/content", "archive");
        }
      }         
    ?>
  </div>
</article>
<?php
  get_footer();
?>