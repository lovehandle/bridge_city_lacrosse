<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of bdywrapper -->

<!-- Start of outer footer wrapper -->
<footer id="outer_footer_wrapper">

<!-- Start of top -->
<div id="top"> 

<!-- Start of bottom nav wrap -->
<div id="bottom_nav_wrap">

<!-- Start of social -->
<section class="social">

<ul class="icons">

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$pinterest = get_option_tree( 'vn_pinterest' );
} ?>

<?php if (isset($pinterest)) { ?>

<li><a href="<?php echo $pinterest; ?>"><img src="<?php bloginfo('template_directory'); ?>/img/pinterest.png" height="18" width="13" alt="pinterest" /></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$flickrlink = get_option_tree( 'vn_flickr' );
} ?>

<?php if (isset($flickrlink)) { ?>

<li><a href="<?php echo $flickrlink; ?>"><img src="<?php bloginfo('template_directory'); ?>/img/flickr.png" height="18" width="20" alt="flickr" /></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$googlelink = get_option_tree( 'vn_googlelink' );
} ?>

<?php if (isset($googlelink)) { ?>

<li><a href="<?php echo $googlelink; ?>"><img src="<?php bloginfo('template_directory'); ?>/img/googleplus.png" height="15" width="16" alt="google plus" /></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$twitter = get_option_tree( 'vn_twitter' );
} ?>

<?php if (isset($twitter)) { ?>

<li><a href="<?php echo $twitter; ?>"><img src="<?php bloginfo('template_directory'); ?>/img/twitter.png" height="13" width="17" alt="twitter" /></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$facebook = get_option_tree( 'vn_facebook' );
} ?>

<?php if (isset($facebook)) { ?>

<li><a href="<?php echo $facebook; ?>"><img src="<?php bloginfo('template_directory'); ?>/img/facebook.png" height="18" width="9" alt="facebook" /></a></li>

<?php } ?>

</ul>

</section><!-- End of social -->

<!-- Start of bottom nav -->
<nav id="bottom_nav">
<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?> 

<!-- Start of clear fix --><div class="clear"></div>

</nav><!-- end of bottom nav -->

</div><!-- end of bottom nav wrap -->

</div><!-- End of top -->

<!-- Start of footer wrapper -->
<div id="footer_wrapper">

<!-- Start of two third first -->
<div class="two_third_first">

<!-- Start of one half first -->
<div class="one_half_first">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer_one') ) : else : ?>		
<?php endif; ?>

</div><!-- end of one half first -->

<!-- Start of one half -->
<div class="one_half">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer_two') ) : else : ?>		
<?php endif; ?>

</div><!-- end of one half -->

</div><!-- End of two third first -->

<!-- Start of one third -->
<div class="one_third">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer_three') ) : else : ?>		
<?php endif; ?>

</div><!-- End of one third -->

<!-- Start of copyright message -->
<div class="copyright_message">
<?php 
if ( function_exists( 'get_option_tree' ) ) {
$copyright = get_option_tree( 'vn_copyright' );
} ?>     
 
&copy;<?php echo stripslashes($copyright); ?>

</div><!-- End of copyright message -->

<div class="clear"></div>

</div><!-- End of footer wrapper -->

</footer><!-- End of outer footer wrapper -->

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$analytics = get_option_tree( 'vn_google_analytics' );
} ?>     

<?php echo stripslashes($analytics); ?>

</body>
</html>

<?php wp_footer(); ?>