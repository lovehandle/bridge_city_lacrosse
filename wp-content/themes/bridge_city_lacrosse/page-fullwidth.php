<?php
/*
Template Name: Full-Width
*/
?>

<?php get_header(); ?>

<!-- Start of main -->
<section id="main">

<!-- Start of main fullwidth -->
<div id="main_fullwidth">

<!-- Start of clear fix --><div class="clear"></div>

<!-- Start of main fullwidth wrapper -->
<section id="main_fullwidth_wrapper">
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<!-- Start of fullwidth content -->
<div class="fullwidth_content_page">

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

</div><!-- End of fullwidth content -->

</section><!-- End of main fullwidth wrapper -->

</div><!-- End of main fullwidth -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>