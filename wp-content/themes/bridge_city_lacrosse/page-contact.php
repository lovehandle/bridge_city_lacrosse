<?php
/*
Template Name: Contact Page
*/
?>

<?php get_header(); ?>

<section id="content" role="main">
  <div id="content-wrapper" class="container content">
    <div id="contact-content" class="span8">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
      <?php else : ?>
        <p>There are no posts to display. Try using the search.</p>
      <?php endif; ?>
    </div>
    <div id="sidebar" class="span3">
      <?php if ( is_active_sidebar( 'contact_sidebar_section' ) ) : ?>
        <?php dynamic_sidebar( 'contact_sidebar_section'); ?>
      <?php else : ?>
        <div class="alert help">
          <p>Please <a href="/wp-admin/widgets.php">activate</a> some widgets for Contact Sidebar Section.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>



<?php get_footer(); ?>
