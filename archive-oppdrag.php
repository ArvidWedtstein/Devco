<?php
  get_header();
?>
<article class="content px-3 py-5 p-md-5">
  <div class="flex flex-row flex-wrap">
    <?php
      if (have_posts()) {
        $args = array( 'post_type' => 'oppdrag' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) {
          the_post();
          if (get_the_ID()) {
            get_template_part("template-parts/content", "archive");
          }
    
          wp_reset_postdata();
        }
      }      
    ?>
  </div>
</article>
<?php
  get_footer();
?>