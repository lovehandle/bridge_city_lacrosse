<?php
/*
Template Name: Class-Page
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

<!-- Start of fullwidth content -->
<div class="fullwidth_content">

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<!-- Start of trainer wrapper -->
<article class="trainer_wrapper">

<!-- Start of posted details -->
<div class="posted_details">

<h1 class="light"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

<div class="clear"></div>

</div><!-- End of posted details -->

<!-- Start of class post -->
<div class="class_post">

<!-- Start featured image -->
<div class="featured_image">
<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('slide'); ?></a>

</div><!-- End of featured image -->

<!-- Start of featured_text blog -->
<div class="featured_text_fullpost">
<p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,35); ?></p>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$readmoretext = get_option_tree( 'vn_readmore' );
} ?>

<a class="small" href="<?php the_permalink (); ?>"><?php echo stripslashes($readmoretext); ?></a> 

<hr />

<?php
$classtrainertitle = get_post_meta($post->ID, 'classtrainertitle', $single = true); 
$classtrainer = get_post_meta($post->ID, 'classtrainer', $single = true); 
$classdifficultytitle = get_post_meta($post->ID, 'classdifficultytitle', $single = true); 
$classdifficulty = get_post_meta($post->ID, 'classdifficulty', $single = true);   
?>

<?php
if ($classdifficulty) { ?>

<h6><?php echo ($classdifficultytitle); ?></h6>

<br />

<!-- Start of meter -->
<div class="meter">
<span style="width:<?php echo ($classdifficulty); ?>0%"></span>

</div><!-- End of meter -->

<?php } else { } ?>

<br />

<br />

<?php
if ($classtrainer) { ?>

<h6><?php echo ($classtrainertitle); ?></h6> <br /> <?php echo '<a class="small" href="'.get_permalink($classtrainer).'">'.get_the_title($classtrainer).'</a>'; ?>

<?php } else { } ?>
          
</div><!-- End of featured_text blog -->  

<!-- Start of clear fix --><div class="clear"></div>  

</div><!-- End of class post -->      

</article><!-- End of trainer wrapper -->

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'fitness' ); ?></p> 

<?php endif; ?>

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of fullwidth content -->

</section><!-- End of main fullwidth wrapper -->

</div><!-- End of main fullwidth -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>