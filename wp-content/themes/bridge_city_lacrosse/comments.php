<?php

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'fitness' ); ?></p>
<?php
return;
}
?>

<div id="comments">
 <?php if ( have_comments() ) : ?>

  <div class="comment-title"><?php comments_number('0', '1', '%' );?> comments</div>
  <div class="comment-list"><?php wp_list_comments('type=comment'); ?></div>

<?php else : ?>

  <?php if ('open' == $post->comment_status) : ?>
  <?php else : // comments are closed ?>
    <p class="nocomments"><?php _e( 'Comments are closed.', 'fitness' ); ?></p>
  <?php endif; ?>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<div id="respond">
  <div class="comment-title"><?php comment_form_title( __( 'Leave a Reply', 'Leave a Reply to %s', 'fitness' ) ); ?></div>

  <div class="cancel-comment-reply">
    <small><?php cancel_comment_reply_link(); ?></small>
  </div>

  <?php if ( get_option('comment-registration') && !$user_ID ) : ?>
    <p>
      You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> logged in</a> to post a comment.
    </p>
  <?php else : ?>
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

    <?php if ( $user_ID ) : ?>
      <p>
        Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"> Log out</a>
      </p>
    <?php else : ?>
      <p>
        <input type="text" placeholder="Your Name" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
      </p>
      <p>
        <input type="text" placeholder="Email" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2"/>
      </p>
      <p>
        <input type="text" placeholder="Website" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
      </p>
    <?php endif; ?>

    <p>
      <textarea name="comment" placeholder="Leave a Reply" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
    </p>

    <p>
      <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" class="btn btn-primary" />
      <?php comment_id_fields(); ?>
    </p>

    <?php do_action('comment_form', $post->ID); ?>

  </form>

  <div class="clear"></div>

<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
