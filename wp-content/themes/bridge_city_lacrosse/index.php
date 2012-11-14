<?php get_header(); ?>

<section id="content" role="main">
  <div id="content-wrapper" class="container">
    <div id="blog-sidebar" class="span3 sidebar">
      <?php bones_widgets('blog_sidebar_section') ?>
    </div>
    <div id="posts" class="span9">
      <?php bones_posts(); ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
