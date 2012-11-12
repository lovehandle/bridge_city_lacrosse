<?php
/*
 * The default template for displaying audio
 */
?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start featured image -->
<div class="featured_image">

</div><!-- End of featured image -->

<!-- Start of posted details -->
<div class="posted_details">

<!-- Start of postformattype -->
<div id="postformattypeaudio"><img src="<?php bloginfo('template_directory'); ?>/img/audioiconblog.png" height="29" width="15" alt="audio" />

</div><!-- End of postformattype -->

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
<p><?php the_content(); ?></p>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$readmoretext = get_option_tree( 'vn_readmore' );
} ?>

<a class="small" href="<?php the_permalink (); ?>"><?php echo stripslashes($readmoretext); ?></a> 

</div><!-- End of featured_text blog -->       

</article><!-- End of blog wrapper -->