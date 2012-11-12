<?php
/*
 * The default template for displaying gallery
 */
?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start featured image -->
<div class="featured_image_gallery">

<!-- Start of postformattype -->
<div id="postformattypegallery"><img src="<?php bloginfo('template_directory'); ?>/img/galleryiconblog.png" height="23" width="28" alt="gallery" />

</div><!-- End of postformattype -->

<?php
$attachments = get_children(
array(
'post_type' => 'attachment',
'post_mime_type' => 'image',
'post_parent' => $post->ID
));
if(count($attachments) > 1) { ?>

<!-- Start of slider -->
<section class="slider">   

<ul class="slides">
<?php 

$args = array(
'post_type' => 'attachment',
'numberposts' => -1,
'post_status' => null,
'post_parent' => $post->ID
);

$attachments = get_posts( $args );
if ( $attachments ) {
foreach ( $attachments as $attachment ) {
echo '<li>';
echo wp_get_attachment_image( $attachment->ID, 'slide' );
echo '</li>';
}
}

?>

</ul><!-- End of slides -->	

</section><!-- End of slider -->

<?php } else { ?>

<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('slide'); ?></a>

<?php }?>

</div><!-- End of featured image --> 

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
