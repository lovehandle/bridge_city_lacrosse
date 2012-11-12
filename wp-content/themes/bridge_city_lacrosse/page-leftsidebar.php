<?php
/*
Template Name: Left-Sidebar
*/
?>

<?php get_header(); ?>

<!-- Start of main -->
<section id="main">

<!-- Start of wrapper content right -->
<section id="wrapper_content_right">

<!-- Start of content right -->
<div id="content_right_page">
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

</div><!-- End of content right -->

</section><!-- End of wrapper content right -->

<!-- Start of wrapper content left -->
<aside id="wrapper_content_left">

<!-- Start of content left -->
<div id="content_left">
<?php get_sidebar ('page'); ?>            

</div><!-- End of right content -->

</aside><!-- End of right content wrapper -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>