<?php
/*
Template Name: Contact
*/

get_header ();
?>

<!-- Start of main -->
<section id="main">

<!-- Start of clear fix --><div class="clear"></div>


<!-- Start of map div -->
<div id="map_div">

<!-- ****************************THIS IS THE START OF THE CONTACT MAP WIDGET**************************** -->

<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('contact map')) : ?>
<?php endif; ?>

<!-- ****************************THIS IS THE END OF THE CONTACT MAP WIDGET**************************** -->





<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<!-- Start of left content wrapper -->
<section id="left_contact_wrapper">

<!-- Start of left content -->
<div id="left_content">
<?php the_content('        '); ?> 

<?php endwhile; ?> 

<?php else: ?> 
<p>There are no posts to display. Try using the search.</p> 

<?php endif; ?>

</div><!-- End of left content -->

</section><!-- End of left content wrapper -->

<!-- Start of right content wrapper -->
<aside id="right_contact_wrapper">

<!-- Start of right content -->
<div id="right_content">




<!-- ****************************THIS IS THE START OF THE CONTACT INFORMATION**************************** -->

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$contactsidebartitle = get_option_tree( 'vn_contactsidebartitle' );
} ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$contactphonesubheading = get_option_tree( 'vn_contactphonesubheading' );
} ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$contacthourssubheading = get_option_tree( 'vn_contacthourssubheading' );
} ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$contactlocationsubheading = get_option_tree( 'vn_contactlocationsubheading' );
} ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$companyaddress = get_option_tree( 'vn_companyaddress' );
} ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$companyemailaddress = get_option_tree( 'vn_companyemailaddress' );
} ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$companycity = get_option_tree( 'vn_companycity' );
} ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$companyphone = get_option_tree( 'vn_companyphone' );
} ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$companyfax = get_option_tree( 'vn_companyfax' );
} ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$companyhours = get_option_tree( 'vn_info_box' );
} ?>
<?php if ($companyphone != ('')){ ?> 

<h5><?php echo stripslashes($contactsidebartitle); ?></h5>

<!-- Start of textwidget -->
<div class="textwidget">

<ul class="contact">

<?php if ($contactphonesubheading != ('')){ ?> 
<li><span class="contact_title"><?php echo stripslashes($contactphonesubheading); ?></li>
<?php } else { } ?>

<li>T &nbsp; - &nbsp;<?php echo stripslashes($companyphone); ?></li>

<?php if ($companyfax != ('')){ ?> 
<li>F &nbsp; - &nbsp;<?php echo stripslashes($companyfax); ?></li>
<?php } else { } ?>

<?php if ($companyemailaddress != ('')){ ?> 
<li>E &nbsp; - &nbsp;<a href="mailto:<?php echo ($companyemailaddress); ?>"><?php echo stripslashes($companyemailaddress); ?></a></li>
<?php } else { } ?>

</ul>

<?php if ($companyhours != ('')){ ?> 

<ul class="contact">

<?php if ($contacthourssubheading != ('')){ ?>
<li><span class="contact_title"><?php echo stripslashes($contacthourssubheading); ?></span></li>
<?php } else { } ?>

<li><?php echo stripslashes($companyhours); ?></li>

</ul>   

<?php } else { } ?>

<?php if ($companyaddress != ('')){ ?> 

<ul class="contact">

<?php if ($contactlocationsubheading != ('')){ ?> 
<li><span class="contact_title"><?php echo stripslashes($contactlocationsubheading); ?></li>
<?php } else { } ?>

<li><?php echo stripslashes($companyaddress); ?></li>

<?php if ($companycity != ('')){ ?>
<li><?php echo stripslashes($companycity); ?></li>
<?php } else { } ?>

</ul> 

<?php } else { } ?>
        
</div><!-- End of textwidget -->

<?php } else { } ?>

<!-- ****************************THIS IS THE END OF THE CONTACT INFORMATION**************************** -->

<hr />


<!-- ****************************THIS IS THE START OF THE CONTACT BOTTOM WIDGET**************************** -->

<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('info')) : ?>
<?php endif; ?>

<!-- ****************************THIS IS THE END OF THE CONTACT BOTTOM WIDGET**************************** -->




</div><!-- End of right content -->

</aside><!-- End of right content wrapper -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of map div -->

</section><!-- End of main -->

<?php get_footer (); ?>