<?php
/*
Template Name: Home-Loop
*/

get_header ();
?>

<!-- Start of main section home -->
<section id="main_section_home">

<!-- ******************************************************************** This is the slider ********************************************************************-->

<!-- Start of slider wrapper -->
<section class="slider_wrapper">

<!-- Start of slider -->
<section class="slider">   

<ul class="slides">

	<?php
    $temp = $my_query;
    $my_query = null;
    $my_query = new WP_Query('post_type=slider&showposts=10');
    $my_query->query('post_type=slider&showposts=10');
    ?>
        
    <?php while ( $my_query->have_posts() ) : $my_query->the_post(); sltws_post_meta(); ?>
    <?php $sliderlink = $meta[ 'subtitle' ] ?> 
        <li>
        <?php if ($sliderlink != ('')){ ?> 
        <a href="<?php echo $sliderlink; ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('slide'); ?></a>
        <?php } else { ?> 
        <?php the_post_thumbnail('slide'); ?>
        <?php } ?>
        </li>
        
        <?php endwhile; ?>
        
	</ul>
    
    <?php wp_reset_query(); ?>

</section><!-- End of slider -->

<!-- Start of clear fix --><div class="clear"></div>

</section><!-- End of slider wrapper -->

</section><!-- End of main section home -->

<!-- Start of main -->
<section id="main">





<!-- ******************************************************************** This is the message area under the slider ********************************************************************-->

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$todaymessage = get_option_tree( 'vn_todaymessage' );
} ?>

<?php if ($todaymessage != ('')){ ?> 

<!-- Start of message center -->
<section id="message_center">
<h1><?php echo stripslashes($todaymessage); ?></h1>

<!-- Start of clear fix --><div class="clear"></div>

</section><!-- End of message center -->

<?php } else { } ?>

<!-- Start of midsection -->
<section id="midsection">

<!-- Start of one third first -->
<article class="one_third_first">
<?php 
if ( function_exists( 'get_option_tree' ) ) {
$columntitleone = get_option_tree( 'vn_1stcolumntitle' );
} ?>

<?php if ($columntitleone != ('')){ ?> 

<h4><?php echo stripslashes($columntitleone); ?></h4>  

<?php } else { } ?>





<!-- ******************************************************************** This is the class loop ********************************************************************-->




<!-- Start of home content -->
<div class="home_content">
<?php
$featuredport = new WP_Query('showposts=1&post_type=class');
while ($featuredport->have_posts()) : $featuredport->the_post();
?> 

<img src="<?php bloginfo('template_directory'); ?>/img/classicon.png" height="27" width="21" alt="<?php the_title (); ?>" class="lefthome" /> 

<!-- Start of homeclass -->
<div class="homeclass">
<a href="<?php the_permalink (); ?>"><?php the_title (); ?></a>

<p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p>

</div><!-- End of homeclass -->

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$homeclassmore = get_option_tree( 'vn_homclassmore' );
} ?>

<?php if ($homeclassmore != ('')){ ?> 

<a class="small" href="<?php the_permalink (); ?>"><?php echo stripslashes($homeclassmore); ?></a>

<?php } else { } ?>

<?php endwhile; ?>
			
<?php wp_reset_query(); ?>

<hr />

</div><!-- End of home content -->

<!-- Start of home content bottom -->
<div class="home_content_bottom">
<?php
$featuredport = new WP_Query('showposts=1&post_type=class&offset=1');
while ($featuredport->have_posts()) : $featuredport->the_post();
?> 

<img src="<?php bloginfo('template_directory'); ?>/img/classicon.png" height="27" width="21" alt="<?php the_title (); ?>" class="lefthome" /> 

<!-- Start of homeclass -->
<div class="homeclass">
<a href="<?php the_permalink (); ?>"><?php the_title (); ?></a>

<p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p>

</div><!-- End of homeclass -->

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$homeclassmore = get_option_tree( 'vn_homclassmore' );
} ?>

<?php if ($homeclassmore != ('')){ ?> 

<a class="small" href="<?php the_permalink (); ?>"><?php echo stripslashes($homeclassmore); ?></a>

<?php } else { } ?>

<?php endwhile; ?>
			
<?php wp_reset_query(); ?>

</div><!-- End of home content bottom -->

</article><!-- End of one third first -->






<!-- ******************************************************************** This is 2nd column loop - category choice from the admin ********************************************************************-->





<!-- Start of one third -->
<article class="one_third">
<?php 
if ( function_exists( 'get_option_tree' ) ) {
$columntitletwo = get_option_tree( 'vn_2ndcolumntitle' );
} ?>

<?php if ($columntitletwo != ('')){ ?> 

<h4><?php echo stripslashes($columntitletwo); ?></h4>

<?php } else { } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$seccat = get_option_tree( 'vn_seccat' );
} ?>

<?php 
$featured_catnews1 = new WP_Query('cat=' . $seccat . '&showposts=1');

while ($featured_catnews1->have_posts()) : $featured_catnews1->the_post();
?>

<!-- Start of home content -->
<div class="home_content">
<h6><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h6>
<br />
<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('small'); ; ?></a>

<?php if (has_post_format('video')) {
         
		 
if ( has_post_format( 'video' )) {
$content = get_the_content();
$link_string = my_extract_from_string('<iframe src=', '/iframe>', $content);
$link_bits = explode('"', $link_string);
foreach( $link_bits as $bit ) {
	if( substr($bit, 0, 1) == '>') $link_text = substr($bit, 1, strlen($bit)-2);
	if( substr($bit, 0, 4) == 'http') $link_url = $bit;
} ?>

<iframe src="<?php echo $link_url;?>" frameborder="0" allowfullscreen width="960" height="380" style="z-index:999; position:relative;margin-top:-53px;"></iframe>

<p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p>

<?php }
else {
?>



<?php } ?> <?php 

    } elseif (has_post_format('audio')) {
         the_content ();
		 
    } elseif (has_post_format('quote')) { ?>
         <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p>
    
	<?php
    } elseif (has_post_format('link')) { ?>
         <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p>
    
	<?php } elseif (has_post_format('status')) {
         the_content ();
	
	} elseif (has_post_format('gallery')) {

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

<?php ?> <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p> <?php } else { ?> 

<?php }

    } else { ?>
         <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p>
         <?php 
    }

 ?>
 
 <?php 
if ( function_exists( 'get_option_tree' ) ) {
$readmoretext = get_option_tree( 'vn_readmore' );
} ?>

<a class="small" href="<?php the_permalink (); ?>"><?php echo stripslashes($readmoretext); ?></a> 

<hr />

</div><!-- End of home content -->


<?php endwhile; ?>
			
<?php wp_reset_query(); ?>



<?php 
if ( function_exists( 'get_option_tree' ) ) {
$seccata = get_option_tree( 'vn_seccat' );
} ?>

<?php 
$featured_catnews2 = new WP_Query('cat=' . $seccata . '&showposts=1&offset=1');

while ($featured_catnews2->have_posts()) : $featured_catnews2->the_post();
?>


<!-- Start of home content bottom -->
<div class="home_content_bottom">
<h6><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h6>
<br />
<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('small'); ; ?></a>

<?php if (has_post_format('video')) {
	
	
if ( has_post_format( 'video' )) {
$content = get_the_content();
$link_string = my_extract_from_string('<iframe src=', '/iframe>', $content);
$link_bits = explode('"', $link_string);
foreach( $link_bits as $bit ) {
	if( substr($bit, 0, 1) == '>') $link_text = substr($bit, 1, strlen($bit)-2);
	if( substr($bit, 0, 4) == 'http') $link_url = $bit;
} ?>

<iframe src="<?php echo $link_url;?>" frameborder="0" allowfullscreen width="960" height="380" style="z-index:999; position:relative;margin-top:-53px;"></iframe>

<p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p>

<?php }
else {
?>



<?php } ?> <?php 
    } elseif (has_post_format('audio')) {
         the_content ();
		 
    } elseif (has_post_format('quote')) { ?>
         <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p>
    
	<?php
    } elseif (has_post_format('link')) { ?>
         <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p>
    
	<?php } elseif (has_post_format('status')) {
         the_content ();
	
	} elseif (has_post_format('gallery')) {

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

<?php ?> <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p> 

 <?php 
if ( function_exists( 'get_option_tree' ) ) {
$readmoretext = get_option_tree( 'vn_readmore' );
} ?>

<a class="small" href="<?php the_permalink (); ?>"><?php echo stripslashes($readmoretext); ?></a> 

<?php } else { ?>

<?php }

    } else {
          ?>
         <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,10); ?></p>
         <?php 
    }

 ?>
 
 <?php 
if ( function_exists( 'get_option_tree' ) ) {
$readmoretext = get_option_tree( 'vn_readmore' );
} ?>

<a class="small" href="<?php the_permalink (); ?>"><?php echo stripslashes($readmoretext); ?></a> 

</div><!-- End of home content bottom -->

<?php endwhile; ?>
			
<?php wp_reset_query(); ?>

</article><!-- End of one third -->

<!-- Start of one third -->
<article class="one_third">


<!-- ******************************************************************** This is 3rd column loop - linkable upload image ********************************************************************-->

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$thdimg = get_option_tree( 'vn_3rdcolumntitle' );
} ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$thdimgurl = get_option_tree( 'vn_thdcat' );
} ?>

<!-- Start of home content image -->
<div class="home_content_image">

<a href="<?php echo ($thdimgurl); ?>"><img src="<?php echo ($thdimg); ?>" alt="Our Latest" /></a>

</div><!-- End of home content image -->

</article><!-- End of one third -->

<!-- Start of clear fix --><div class="clear"></div>





<!-- ******************************************************************** This is widget section - home widget 4, 5 and 6 ********************************************************************-->
<hr />




<!-- Start of one third first -->
<article class="one_third_first_bottom">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home_four')) : ?>
<?php endif; ?>

</article><!-- End of one third first -->

<!-- Start of one third -->
<article class="one_third_bottom">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home_five')) : ?>
<?php endif; ?>

</article><!-- End of one third -->

<!-- Start of one third -->
<article class="one_third_bottom">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home_six')) : ?>
<?php endif; ?>

</article><!-- End of one third -->

<!-- Start of clear fix --><div class="clear"></div>

</section><!-- End of midsection -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer(); ?>