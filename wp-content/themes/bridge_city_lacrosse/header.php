<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Muli:400,300italic,300,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

<!--[if IE 7 ]>    <html class= "ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class= "ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class= "ie9"> <![endif]-->

<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
<![endif]--><head>
<title><?php echo get_option('blogname'); ?><?php wp_title(); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

 <!-- *************************************************************************
*****************                FAVICON               ********************
************************************************************************** -->
<?php 
if ( function_exists( 'get_option_tree') ) {
  $favicon = get_option_tree( 'vn_custom_favicon' );
}
?>
<link rel="shortcut icon" href="<?php echo ($favicon); ?>" />

  <!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>

 <!-- *************************************************************************
*****************        RESPONSIVE MENU SELECT        ********************
************************************************************************** -->
<script type="text/javascript">
// DOM ready
jQuery(document).ready(function(){

// Create the dropdown base
jQuery("<select />").appendTo("#topmenu");

// Create default option "Go to..."
jQuery("<option />", {
 "selected": "selected",
 "value"   : "",
 "text"    : "Menu Selection..."
}).appendTo("#topmenu select");

// Populate dropdown with menu items
jQuery("#topmenu a").each(function() {
var el = jQuery(this);
jQuery("<option />", {
   "value"   : el.attr("href"),
   "text"    : el.text()
}).appendTo("#topmenu select");
});

// To make dropdown actually work
// To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
jQuery("#topmenu select").change(function() {
window.location = jQuery(this).find("option:selected").val();
});

});
</script>



 <!-- *************************************************************************
*****************              TWITTER FEED            ********************
************************************************************************** -->
<?php 
if ( function_exists( 'get_option_tree') ) {
  $twitter = get_option_tree( 'vn_twitter_username' );
}
?>
<script type='text/javascript'>
    jQuery(document).ready(function(){
        jQuery(".tweet").tweet({
            username: "<?php echo $twitter; ?>",
            join_text: "auto",
            avatar_size: 36,
            count: 3,
            auto_join_text_default: "we said,", 
            auto_join_text_ed: "we",
            auto_join_text_ing: "we were",
            auto_join_text_reply: "we replied to",
            auto_join_text_url: "we were checking out",
            loading_text: "loading tweets..."
        });
    });
</script>



<!-- *************************************************************************
******************   THIS IS THE SLIDER           ***********************
************************************************************************** -->
<script type="text/javascript">
jQuery(window).load(function() {
	jQuery('.slider').flexslider();
});
	
</script>



 <!-- *************************************************************************
*****************             ACCENT COLOR            ********************
************************************************************************** -->
<?php 
if ( function_exists( 'get_option_tree') ) {
  $accentcolor = get_option_tree( 'vn_accentcolor' );
}
?>

<style type="text/css">

h3 a:hover, h4 a:hover, h6 a:hover, .homeclass a:hover, a, a.more-link, a:hover, a:hover.more-link, a.small, a:hover.small, #footer_wrapper a, #footer_wrapper ul li a:hover, #footer_wrapper a:hover, .buttontext a:hover, .intro a, .intro a:hover, .buttontextnext a:hover, .comment-date a, .comment-date a:hover {
	color:<?php echo ($accentcolor); ?>;
	}
	
#outer_footer_wrapper {
	border-bottom:5px solid <?php echo ($accentcolor); ?>;
	}
	
#outer_wrapper, #main_section_home, input[type=submit], #postformattypequote, #postformattypequote2, #postformattypelink, #postformattypeaudio, #postformattypegallery, #postformattypevideo, #postformattypestandard, .button a, .button_reverse a:hover, #postformattypestatus {
	background-color:<?php echo ($accentcolor); ?>;
	}
	
.pullquoteleft, .pullquoteright {
	border-left:6px solid <?php echo ($accentcolor); ?>;
	color:<?php echo ($accentcolor); ?>;
	}

.quote {
	border-left:6px solid <?php echo ($accentcolor); ?>;
	}
	


</style>



<!-- *************************************************************************
*****************              CUSTOM CSS              ********************
************************************************************************** -->
<style type="text/css">
<?php 
if ( function_exists( 'get_option_tree') ) {
  $css = get_option_tree( 'vn_custom_css' );
}
?>
    <?php echo ($css); ?>
</style>

</head>

<?php $theme_options = get_option('option_tree'); ?>

<body <?php body_class(); ?>>

<!-- Start of bdywrapper -->
<div id="bdywrapper">

<!-- Start of outer wrapper -->
<header id="outer_wrapper">

<!-- Start of nav wrapper -->
<div id="nav_wrapper">

<!-- Start of top logo -->
<div id="top_logo">
<a href="<?php bloginfo('siteurl'); ?>"><?php 
if ( function_exists( 'get_option_tree' ) ) {
$logopath = get_option_tree( 'vn_logo' );
} ?><img src="<?php echo $logopath; ?>" alt="logo" /></a>

</div><!-- End of top logo -->

<!-- Start of info box -->
<div id="info_box">

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$headerphone = get_option_tree( 'vn_companyphone' );
} ?>

<?php if (isset($headerphone)) { ?>

<div class="header_phone"><?php echo stripslashes($headerphone); ?></div >

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$infobox = get_option_tree( 'vn_info_box' );
} ?>

<?php if (isset($infobox)) { ?>

<div  class="header_info"><?php echo stripslashes($infobox); ?></div >

<?php } ?>

</div><!-- End of info box -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of nav wrapper -->

<!-- Start of top -->
<div id="top">  

<!-- Start of topmenu wrapper -->
<div id="topmenu_wrapper">

<!-- Start of topmenu -->
<nav id="topmenu">  
<?php wp_nav_menu(array('menu_class'=>'sf-menu')); ?>

</nav><!-- End of topmenu -->

<!-- Start of searchbox -->
<div id="searchbox">
<?php get_search_form(); ?>

</div><!-- End of searchbox -->

</div><!-- End of topmenu wrapper -->

</div><!-- End of top -->

</header><!-- End of outer wrapper -->