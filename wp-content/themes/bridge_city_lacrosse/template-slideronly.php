<?php
/*
Template Name: Home-SliderOnly
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

<!-- Start of main fullwidth -->
<div id="main_fullwidth">

<!-- Start of clear fix --><div class="clear"></div>

<!-- Start of main fullwidth wrapper -->
<section id="main_fullwidth_wrapper">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- Start of fullwidth content -->
<div class="fullwidth_content_home">

<!-- Start of blog wrapper -->
<div class="blog_wrapper">

<h1 class="dark"><?php the_title(); ?></h1>

<!-- Start of featured text full -->
<div class="featured_text_full">

<?php the_content('        '); ?> 

<?php endwhile; endif; ?>

<?php wp_reset_query(); ?>

</div><!-- End of featured text full -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of blog wrapper -->

</div><!-- End of fullwidth content -->

</section><!-- End of main fullwidth wrapper -->

</div><!-- End of main fullwidth -->

<!-- Start of clear fix --><div class="clear"></div>

</section><!-- End of main -->
           

<?php get_footer(); ?>