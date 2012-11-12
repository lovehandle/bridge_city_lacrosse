<?php get_header(); ?>

<!-- Start of main -->
<section id="main">

<!-- Start of clear fix --><div class="clear"></div>

<!-- Start of left content wrapper -->
<section id="left_content_wrapper">

<!-- Start of left content -->
<div id="left_contentsearch">
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start of posted details -->
<div class="posted_details">

<h1 class="light"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

<!-- Start of post content first -->
<div class="post_content_first">
<?php the_author() ?>

</div><!-- End of post content first -->

<!-- Start of post content -->
<div class="post_content">
<?php the_time('F jS, Y') ?>

</div><!-- End of post content -->

<!-- Start of post content last -->
<div class="post_content_last">
<?php if ('open' == $post->comment_status) { ?>
<?php comments_popup_link('0', '1', '%', 'comments-link'); ?> comments
<?php } ?>

</div><!-- End of post content last -->

<br />

</div><!-- End of posted details -->

<!-- Start of featured_text blog -->
<div class="featured_text_full">
<p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,55); ?></p>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$readmoretext = get_option_tree( 'vn_readmore' );
} ?>

<a class="small" href="<?php the_permalink (); ?>"><?php echo stripslashes($readmoretext); ?></a> 

</div><!-- End of featured_text blog -->  

</article><!-- End of blog wrapper -->
        
<?php endwhile; ?> 
            
<?php else: ?> 
	<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'fitness' ); ?></p> 
<?php endif; ?> 

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of left content -->

</section><!-- End of left content wrapper -->

<!-- Start of right content wrapper -->
<aside id="right_content_wrapper">

<!-- Start of right content -->
<div id="right_content">
<?php get_sidebar ('page'); ?>

</div><!-- End of right content -->

</aside><!-- End of right content wrapper -->

<!-- Start of navigation -->
<div class="navigation">

<!-- Start of alignleft -->
<div class="alignleft">

<!-- Start of button -->
<div class="button">
<?php next_posts_link( __('older','fitness') ) ?>

</div><!-- End of button -->

</div><!-- End of alignleft -->

<!-- Start of alignright -->
<div class="alignright">

<!-- Start of button -->
<div class="button">
<?php previous_posts_link( __('newer','fitness') ) ?>

</div><!-- End of button -->

</div><!-- End of alignright -->

</div><!-- End of navigation --> 

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>
