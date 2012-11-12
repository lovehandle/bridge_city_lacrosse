<?php $path = get_template_directory_uri();
if(!isset($_REQUEST['error']))  $error_code = '404';
else  $error_code = $_REQUEST['error'];
?>

<?php get_header(); ?>

<!-- Start of main -->
<section id="main">

<!-- Start of left content wrapper -->
<section id="left_content_wrapper">

<!-- Start of left content -->
<div id="left_contentsearch">

<!-- Start of blog wrapper -->
<div class="blog_wrapper">

<!-- Start of posted details -->
<div class="posted_details">

<h1 class="light"><?php _e( 'Page Not Found', 'fitness' ); ?></h1>

</div><!-- End of posted details -->

<!-- Start of featured text full -->
<div class="featured_text_full">
<p><?php _e( 'No worries you probably mistyped something, looked for something that does not exist anymore or just downright broke stuffs - just carry on with the menu at the top!', 'fitness' ); ?></p>

</div><!-- End of featured text full -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of blog wrapper -->

</div><!-- End of left content -->

</section><!-- End of left content wrapper -->

<!-- Start of right content wrapper -->
<aside id="right_content_wrapper">

<!-- Start of right content -->
<div id="right_content">
<?php get_sidebar ('page'); ?>            

</div><!-- End of right content -->

</aside><!-- End of right content wrapper -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>