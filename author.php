<?php
get_header();
?>

<section id="primary">
  <div id="content" role="main">
    <?php echo get_the_author() ?>
    <?php if ( have_posts() ) ?>
    <?php the_post(); ?>
  </div>
</section>
<?php
get_footer();
?>