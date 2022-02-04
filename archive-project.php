<?php
  get_header();
?>
<article class="content px-3 py-5 p-md-5 penoi">
  <div class="flex flex-row flex-wrap">
  <?php

$projectspost = array( 'post_type' => 'project', );
$loop = new WP_Query( $projectspost );

?>
<?php while ( $loop->have_posts() ) : $loop->the_post();?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content"><?php get_template_part("template-parts/content", "archive");?></div>
</article>

<?php endwhile; ?>
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
