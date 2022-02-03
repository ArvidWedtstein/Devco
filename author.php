<?php
get_header();
?>

<section id="primary">
  <div id="content" role="main">
    <?php
      echo get_the_author();
  
      
      $user = get_currentuserinfo();
      echo $user -> user_lastname;
      $user_id = $user->ID; // You can set $user_id to any users, but this gets the current users ID.
        
      $user_twitter = get_user_meta( $user_id, 'twitter', true);
      echo $user_twitter;
      $use_options = get_option( 'use_option_name' );
      $github_0 = $use_options['github_0'];
      $github_1 = $use_options['devco_admin_page_setting_section_delete'];
      echo $github_0;
      echo get_theme_mod("devco_project_post_page");
      echo get_theme_mod("devco_oppdrag_post_page");
    ?>
    <img width="24" class="rounded-full" src="<?php 
      $get_author_id = get_the_author_meta('ID');
      $get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));
      echo $get_author_gravatar;
    ?>">
    
  </div>
</section>
<?php
get_footer();
?>