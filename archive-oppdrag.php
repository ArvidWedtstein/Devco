<?php
  get_header();
?>
<article class="content px-3 py-5 p-md-5">
  <?php
    $args = array( 'post_type' => 'oppdrag' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) {
      the_post();
      get_template_part("template-parts/content", "oppdrag");
    }            
  ?>
</article>
<?php
  get_footer();
?>
