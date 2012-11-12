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
<div class="fullwidth_content_page">

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start featured image -->
<div class="featured_image">
        
</div><!-- End of featured image -->

<h1 class="dark"><?php the_title (); ?></h1>

<!-- Start of featured_text -->
<div class="featured_text_fullpostspecial">

<?php
 $montimes = get_post_meta($post->ID, 'montimes', $single = true);
 $tuetimes = get_post_meta($post->ID, 'tuetimes', $single = true);
 $wedtimes = get_post_meta($post->ID, 'wedtimes', $single = true);
 $thutimes = get_post_meta($post->ID, 'thutimes', $single = true);
 $fritimes = get_post_meta($post->ID, 'fritimes', $single = true);
 $sattimes = get_post_meta($post->ID, 'sattimes', $single = true);
 $suntimes = get_post_meta($post->ID, 'suntimes', $single = true);  
 $timetabletitle = get_post_meta($post->ID, 'timetabletitle', $single = true);  
?>

<!-- Start of two third first -->
<div class="two_third_first">
<?php
if ($timetabletitle) { ?>
<h6><?php echo ($timetabletitle); ?></h6>

<br />

<?php } else { } ?>

<?php if (($montimes) !="" || ($tuetimes) !="" || ($wedtimes) !="" || ($thutimes) !="" || ($fritimes) !="" || ($sattimes) !="" || ($suntimes) !="") { ?>

<!-- Start of time table -->
<ul class="timetable">

<li class="gray">
<div class="timeleft"><?php _e( 'Monday', 'fitness' ); ?></div><div class="timeright"><?php echo ($montimes); ?></div>
</li>

<li class="light">
<div class="timeleft"><?php _e( 'Tuesday', 'fitness' ); ?></div><div class="timeright"><?php echo ($tuetimes); ?></div>
</li>

<li class="gray">
<div class="timeleft"><?php _e( 'Wednesday', 'fitness' ); ?></div><div class="timeright"><?php echo ($wedtimes); ?></div>
</li>

<li class="light">
<div class="timeleft"><?php _e( 'Thursday', 'fitness' ); ?></div><div class="timeright"><?php echo ($thutimes); ?></div>
</li>

<li class="gray">
<div class="timeleft"><?php _e( 'Friday', 'fitness' ); ?></div><div class="timeright"><?php echo ($fritimes); ?></div>
</li>

<li class="light">
<div class="timeleft"><?php _e( 'Saturday', 'fitness' ); ?></div><div class="timeright"><?php echo ($sattimes); ?></div>
</li>

<li class="gray">
<div class="timeleft"><?php _e( 'Sunday', 'fitness' ); ?></div><div class="timeright"><?php echo ($suntimes); ?></div>
</li>

<!-- Start of clear fix --><div class="clear"></div>

</ul><!-- End of time table -->

</div><!-- End of two third first -->

<!-- Start of one third -->
<div class="one_third">

<?php
 $classdifficulty = get_post_meta($post->ID, 'classdifficulty', $single = true);
 $classdifficultytitle = get_post_meta($post->ID, 'classdifficultytitle', $single = true);  
?>
<?php
if ($classdifficultytitle) { ?>

<h6><?php echo ($classdifficultytitle); ?></h6>

<br />

<!-- Start of meter -->
<div class="meter">
<span style="width:<?php echo ($classdifficulty); ?>0%"></span>

</div><!-- End of meter -->

<br />

<?php } else { } ?>

<?php
 $classtrainer = get_post_meta($post->ID, 'classtrainer', $single = true); 
 $classtrainertitle = get_post_meta($post->ID, 'classtrainertitle', $single = true);  
?>
<?php
if ($classtrainer) { ?>

<h6><?php echo ($classtrainertitle); ?></h6>

<br />

<?php echo get_the_post_thumbnail($classtrainer).'<div class="clearbig"></div><a href="'.get_permalink($classtrainer).'">'.get_the_title($classtrainer).'</a>'; ?>

<br />

<?php } else { } ?>

</div><!-- End of one third -->

<div class="clear"></div>

</div><!-- End of featured_text --> 

<!-- Start of featured_text -->
<div class="featured_text_full">

<?php the_content('        '); ?> 

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of featured_text --> 

<?php } else { ?>

<?php the_content('        '); ?> 

</div><!-- End of two third first -->

<!-- Start of one third -->
<div class="one_third">

<?php
 $classdifficulty = get_post_meta($post->ID, 'classdifficulty', $single = true);
 $classdifficultytitle = get_post_meta($post->ID, 'classdifficultytitle', $single = true);  
?>
<?php
if ($classdifficultytitle) { ?>

<h6><?php echo ($classdifficultytitle); ?></h6>

<br />

<?php } else { } ?>

<?php
if ($classdifficulty) { ?>

<!-- Start of meter -->
<div class="meter">
<span style="width:<?php echo ($classdifficulty); ?>0%"></span>

</div><!-- End of meter -->

<br />

<?php } else { } ?>

<?php
 $classtrainer = get_post_meta($post->ID, 'classtrainer', $single = true); 
 $classtrainertitle = get_post_meta($post->ID, 'classtrainertitle', $single = true);  
?>
<?php
if ($classtrainertitle) { ?>

<h6><?php echo ($classtrainertitle); ?></h6>

<br />

<?php } else { } ?>

<?php
if ($classtrainer) { ?>

<?php echo get_the_post_thumbnail($classtrainer).'<div class="clearbig"></div><a href="'.get_permalink($classtrainer).'">'.get_the_title($classtrainer).'</a>'; ?>

<br />

<?php } else { } ?>

</div><!-- End of one third -->

<div class="clear"></div>

</div><!-- End of featured_text --> 

<?php } ?>

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'fitness' ); ?></p> 

<?php endif; ?>

</article><!-- End of blog wrapper -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of fullwidth content -->

<!-- Clear fix --><div class="clear"></div> 

</section><!-- End of main fullwidth wrapper -->

</div><!-- End of main fullwidth -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>