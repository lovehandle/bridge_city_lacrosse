<?php
/*
Template Name: Trainer-Page
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

<?php
$temp = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$wp_query->query('post_type=trainer' . '&paged=' . $paged . '&posts_per_page=600000000');
?>
	
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

<!-- Start of trainer wrapper -->
<article class="trainer_wrapper">

<!-- Start of posted details -->
<div class="posted_details">

<h1 class="light"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

<div class="clear"></div>

</div><!-- End of posted details -->

<!-- Start of trainer post -->
<div class="trainer_post">

<!-- Start featured image -->
<div class="featured_image">
<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('slide'); ?></a>

</div><!-- End of featured image -->

<!-- Start of featured_text blog -->
<div class="featured_text_fullpost">
<p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,20); ?></p>
          
</div><!-- End of featured_text blog -->

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$readmoretext = get_option_tree( 'vn_readmore' );
} ?>

<a class="small" href="<?php the_permalink (); ?>"><?php echo stripslashes($readmoretext); ?></a>  

<hr />

<?php
$skill_leveltitle = get_post_meta($post->ID, 'skill_leveltitle', $single = true);  
$skill_level = get_post_meta($post->ID, 'skill_level', $single = true);
?>
<?php
if ($skill_level) { ?>

<h6><?php echo ($skill_leveltitle); ?></h6>

<p><?php echo ($skill_level); ?></p>

<?php } else { } ?>

<!-- Start of clear fix --><div class="clear"></div>  

</div><!-- End of trainer post -->   

</article><!-- End of trainer wrapper -->

<?php endwhile; ?> 

</div><!-- End of fullwidth content -->

</section><!-- End of main fullwidth wrapper -->

</div><!-- End of main fullwidth -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>