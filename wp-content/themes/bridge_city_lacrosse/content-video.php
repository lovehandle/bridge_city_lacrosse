<?php
/*
 * The default template for displaying video
 */
?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start featured image -->
<div class="featured_image">

<!-- Start of postformattype -->
<div id="postformattypevideo"><img src="<?php bloginfo('template_directory'); ?>/img/videoiconblog.png" height="24" width="31" alt="video" />

</div><!-- End of postformattype -->

<?php if ( has_post_format( 'video' )) {
$content = get_the_content();
$link_string = my_extract_from_string('<iframe src=', '/iframe>', $content);
$link_bits = explode('"', $link_string);
foreach( $link_bits as $bit ) {
	if( substr($bit, 0, 1) == '>') $link_text = substr($bit, 1, strlen($bit)-2);
	if( substr($bit, 0, 4) == 'http') $link_url = $bit;
}?>

<iframe src="<?php echo $link_url;?>" frameborder="0" allowfullscreen width="960" height="380" style="z-index:999; position:relative;margin-top:-53px;"></iframe>

<?php }
else {
?>

<?php } ?>

</div><!-- End of featured image -->

<!-- Start of posted details -->
<div class="posted_details_video">

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
