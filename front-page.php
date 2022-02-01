<?php
  get_header();
?>
<article class="content px-3 py-5 p-md-5">
  <h1>Front-Page</h1>
  <?php 
    the_posts_pagination(); 
  ?>
</article>
<?php
  get_footer();
?>