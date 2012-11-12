<?php
/*
Template Name: Home-Widgets
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
<section id="midsection2">

<!-- Start of one third first -->
<article class="one_third_first">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home_one')) : ?>
<?php endif; ?>

</article><!-- End of one third first -->

<!-- Start of one third -->
<article class="one_third">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home_two')) : ?>
<?php endif; ?>

</article><!-- End of one third -->

<!-- Start of one third -->
<article class="one_third">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home_three')) : ?>
<?php endif; ?>

</article><!-- End of one third -->

<!-- Start of clear fix --><div class="clear"></div>

<!-- Start of line break --><div id="midsectionhr"></div>

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