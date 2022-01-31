<?php
if ( post_password_required() )
  return;
?>
 
<div id="comments" class="comments-area text-white">
 
  <?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
      <?php
        printf( _nx( 'One thought on "%2$s"', '%1$s thoughts on "%2$s"', get_comments_number(), 'comments title', 'devco' ),
          number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
      ?>
    </h2>
 
    <ol class="bg-discord-800 rounded border-2 border-white p-3 my-3">

      <?php
        wp_list_comments( array(
          'style'       => 'ol',
          'format'      => 'html5',
          'short_ping'  => true,
          'avatar_size' => 74,
          'per_page' => 10,
        ) );
      ?>
    </ol>
 
    <?php
      if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation">
      <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'devco' ); ?></h1>
      <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'devco' ) ); ?></div>
      <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'devco' ) ); ?></div>
    </nav><!-- .comment-navigation -->
    <?php endif; // Check for comment navigation ?>
 
    <?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="no-comments"><?php _e( 'Comments are closed.' , 'devco' ); ?></p>
    <?php endif; ?>
 
  <?php endif; // have_comments() ?>
  <div class="comment-form bg-discord-800 rounded border-2 border-white p-3">
    <h2 class="comments-wrapper-heading"> Leave a comment </h2>
    <form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
      <div class="commentform-element mt-2 text-black">
        <input class="border p-2 rounded" id="author" name="author" type="text" placeholder="Full Name" value=""/>
      </div>
      <div class="commentform-element text-black mt-2">
        <input class="border p-2 rounded" id="email" name="email" type="text" placeholder="Email" value=""/>
      </div>
      <div class="my-3 w-full text-black">
        <textarea rows="3" class="border p-2 rounded w-full" placeholder="Write something..."></textarea>
      </div>
      <input name="submit" class="form-submit-button px-4 py-1 bg-gray-800 text-white rounded font-light hover:bg-gray-700" type="submit" id="submit-comment" value="Post comment">
      <input type="hidden" name="comment_post_ID" value="22" id="comment_post_ID">
      <input type="hidden" name="comment_parent" id="comment_parent" value="0">
    </form>
  </div>
  

</div><!-- #comments -->