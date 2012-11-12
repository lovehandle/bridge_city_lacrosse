<?php
/*
Template Name: Right-Sidebar
*/
?>

<?php get_header(); ?>

<!-- Start of main -->
<section id="main">

<!-- Start of left content wrapper -->
<section id="left_content_wrapper">

<!-- Start of left content -->
<div id="left_content_page">
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<!-- Start of blog wrapper -->
<div class="blog_wrapper">

<h1 class="dark"><?php the_title(); ?></h1>

<!-- Start of featured text full -->
<div class="featured_text_full">

<?php the_content('        '); ?> 

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'fitness' ); ?></p> 

<?php endif; ?>

</div><!-- End of featured text full -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of blog wrapper -->

</div><!-- End of left content -->

</section><!-- End of left content wrapper -->

<!-- Start of right content wrapper -->
<aside id="right_content_wrapper">

<!-- Start of right content -->
<div id="right_content">
<?php get_sidebar ('page'); ?>            

</div><!-- End of right content -->

</aside><!-- End of right content wrapper -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>