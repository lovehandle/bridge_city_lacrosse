<?php get_header(); ?>

<section id="content" role="main">
  <div id="content-wrapper" class="container">
    <div id="blog-sidebar" class="span3">
      <?php if ( is_active_sidebar( 'blog_sidebar_section' ) ) : ?>
        <?php dynamic_sidebar( 'blog_sidebar_section'); ?>
      <?php else : ?>
        <div class="alert help">
          <p>Please <a href="/wp-admin/widgets.php">activate</a> some widgets for Blog Sidebar Section.</p>
        </div>
      <?php endif; ?>
    </div>
    <div id="posts" class="span9">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('post'); ?>
        <?php get_template_part('comments'); ?>
      <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
