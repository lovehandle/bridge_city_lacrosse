<?php
/*
Template Name: Index (Sidebar Left)
*/
?>
<?php get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div id="pre-content" style="background-image: url('<?php echo $image[0]; ?>')"></div>
<?php endif; ?>

<section id="content" role="main">
  <div id="content-wrapper" class="container">
    <div id="blog-sidebar" class="span3">
      <?php bones_widgets('blog_sidebar_section') ?>
    </div>
    <div id="posts" class="span9">
      <?php bones_posts(); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
