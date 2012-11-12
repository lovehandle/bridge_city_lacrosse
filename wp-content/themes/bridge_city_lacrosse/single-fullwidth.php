<?php
/*
Single Post Template: [Blog Single Full Width]
Description: This part is optional, but helpful for describing the Post Template
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
<div class="fullwidth_content">

<!-- Start of blog wrapper -->
<article class="blog_wrapper">         
<?php 
    if (has_post_format('video')) { ?>
         
<!-- Start featured image -->
<div class="featured_image">

<!-- Start of postformattype -->
<div id="postformattypevideo"><img src="<?php bloginfo('template_directory'); ?>/img/videoiconblog.png" height="24" width="31" alt="video" />

</div><!-- End of postformattype -->

</div><!-- End of featured image -->

<!-- Start of posted details -->
<div class="posted_details_video">

<h1 class="light"><?php the_title(); ?></h1>

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

<?php  ;} elseif (has_post_format('audio')) { ?>

<!-- Start featured image -->
<div class="featured_image">

</div><!-- End of featured image -->

<!-- Start of posted details -->
<div class="posted_details">

<!-- Start of postformattype -->
<div id="postformattypeaudio"><img src="<?php bloginfo('template_directory'); ?>/img/audioiconblog.png" height="29" width="15" alt="audio" />

</div><!-- End of postformattype -->

<h1 class="light"><?php the_title(); ?></h1>

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

<?php  ;} elseif (has_post_format('status')) { ?>

<!-- Start featured image -->
<div class="featured_image">

</div><!-- End of featured image -->

<!-- Start of posted details -->
<div class="posted_details">

<!-- Start of postformattype -->
<div id="postformattypestatus"><img src="<?php bloginfo('template_directory'); ?>/img/twittericonblog.png" height="21" width="25" alt="status" />

</div><!-- End of postformattype -->

<h1 class="light"><?php the_title(); ?></h1>

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

<?php  ;} elseif (has_post_format('quote')) { ?>

<!-- Start featured image -->
<div class="featured_image">

</div><!-- End of featured image -->

<!-- Start of posted details -->
<div class="posted_details">

<!-- Start of postformattype -->
<div id="postformattypequote2"><img src="<?php bloginfo('template_directory'); ?>/img/quoteiconblog.png" height="23" width="28" alt="quote" />

</div><!-- End of postformattype -->

<h1 class="light"><?php the_title(); ?></h1>

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



<?php ; } elseif (has_post_format('gallery')) { ?>

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

<?php the_post_thumbnail('slide'); ?>

<?php }?>

</div><!-- End of featured image --> 

<!-- Start of posted details -->
<div class="posted_details">

<h1 class="light"><?php the_title(); ?></h1>

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

<?php ; } elseif (has_post_format('link')) { ?>

<!-- Start featured image -->
<div class="featured_image">

<?php the_post_thumbnail('slide'); ?>

</div><!-- End of featured image -->

<!-- Start of posted details -->
<div class="posted_details">

<!-- Start of postformattype -->
<div id="postformattypelink"><img src="<?php bloginfo('template_directory'); ?>/img/linkiconblog.png" height="20" width="20" alt="quote" />

</div><!-- End of postformattype -->

<h1 class="light"><?php the_title(); ?></h1>

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

<div class="clear"></div>

</div><!-- End of posted details -->
         
<?php ; } else { ?>
<!-- Start featured image -->
<div class="featured_image">

<!-- Start of postformattype -->
<div id="postformattypestandard"><img src="<?php bloginfo('template_directory'); ?>/img/standardiconblog.png" height="29" width="29" alt="standard" />

</div><!-- End of postformattype -->

<!-- Start of featured imagea -->
<div id="featured_imagea">
<?php the_post_thumbnail('slide'); ?>

</div><!-- End of featured imagea -->

</div><!-- End of featured image -->
   
<!-- Start of posted details -->
<div class="posted_details">

<h1 class="light"><?php the_title(); ?></h1>

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

<div class="clear"></div>

</div><!-- End of posted details -->

<?php  }
	
 ;?>

<!-- Start of featured_text -->
<div class="featured_text_full">
<?php the_content('        '); ?> 

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'fitness' ); ?></p> 

<?php endif; ?>

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of featured_text --> 

</article><!-- End of blog wrapper -->

<!-- Start of clear fix --><div class="clear"></div>

<!-- Start of comment wrapper main -->
<div class="comment_wrapper_main">
<?php if ('open' == $post->comment_status) { ?>
<?php comments_template(); ?>
<?php } ?>

</div><!-- End of comment wrapper main -->

</div><!-- End of fullwidth content -->

<!-- Clear fix --><div class="clear"></div> 

</section><!-- End of main fullwidth wrapper -->

</div><!-- End of main fullwidth -->

<!-- Start of navigation -->
<div class="navigation">

<!-- Start of border-top --><div class="border-top"></div>

<!-- Start of alignleft -->
<div class="alignleft">

<!-- Start of button -->
<div class="buttontext">
<?php next_post('%', '', 'yes'); ?>

</div><!-- End of button -->

</div><!-- End of alignleft -->

<!-- Start of alignright -->
<div class="alignright">

<!-- Start of button -->
<div class="buttontextnext">
<?php previous_post('%', '', 'yes'); ?> 

</div><!-- End of button -->

</div><!-- End of alignright -->

<!-- Start of border-bottom --><div class="border-bottom"></div>

</div><!-- End of navigation --> 

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>