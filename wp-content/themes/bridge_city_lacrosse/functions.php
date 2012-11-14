<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
    - head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
    - custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/bones.php'); // if you remove this, bones will break
/*
2. library/custom-post-type.php
    - an example custom post type
    - example custom taxonomy (like categories)
    - example custom taxonomy (like tags)
*/
// require_once('library/custom-post-type.php'); // you can disable this if you like
/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
/*
4. library/translation/translation.php
    - adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
	'id' => 'footer_bottom_section',
	'name' => 'Footer Bottom Section',
	'description' => 'The bottom section of the Footer.',
	'before_widget' => '<article id="%1$s" class="widget %2$s span4 content">',
	'after_widget' => '</article>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
    ));

    register_sidebar(array(
	'id' => 'home_middle_section',
	'name' => 'Home Middle Section',
	'description' => 'The middle section on the Home Page.',
	'before_widget' => '<article id="%1$s" class="widget %2$s span4 content">',
	'after_widget' => '</article>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
    ));

    register_sidebar(array(
	'id' => 'home_bottom_section',
	'name' => 'Home Bottom Section',
	'description' => 'The bottom section on the Home Page.',
	'before_widget' => '<article id="%1$s" class="widget %2$s span4 content">',
	'after_widget' => '</article>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
    ));

     register_sidebar(array(
	'id' => 'blog_sidebar_section',
	'name' => 'Blog Sidebar Section',
	'description' => 'The sidebar section of the Blog.',
	'before_widget' => '<article id="%1$s" class="widget %2$s span4">',
	'after_widget' => '</article>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
    ));

    register_sidebar(array(
	'id' => 'contact_sidebar_section',
	'name' => 'Contact Sidebar Section',
	'description' => 'The sidebar section of the Contact.',
	'before_widget' => '<article id="%1$s" class="widget %2$s span4">',
	'after_widget' => '</article>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
    ));

    /*
    to add more sidebars or widgetized areas, just copy
    and edit the above sidebar code. In order to call
    your new sidebar just use the following code:

    Just change the name to whatever your new
    sidebar's id is, for example:

    register_sidebar(array(
	'id' => 'sidebar2',
	'name' => 'Sidebar 2',
	'description' => 'The second (secondary) sidebar.',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widgettitle">',
	'after_title' => '</h4>',
    ));

    To call the sidebar in your template, you can just copy
    the sidebar.php file and rename it to your sidebar's name.
    So using the above example, it would be:
    sidebar-sidebar2.php

    */
} // don't remove this bracket!

function bones_widgets($widget_name) {
  ?>
    <?php if ( is_active_sidebar( $widget_name ) ) : ?>
      <?php dynamic_sidebar( $widget_name ); ?>
    <?php else : ?>
      <?php if (function_exists('get_option_tree')) {
        $display_widget_activation_alert = get_option_tree('widget_activation_alert');
      }?>

      <?php if ( $display_widget_activation_alert == "true" ) : ?>
        <div class="alert help no-widgets">
          <p>Please <a href="/wp-admin/widgets.php">activate</a> some widgets for this section.</p>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  <?php
}

function bones_posts() {
  ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part('post'); ?>
  <?php endwhile; ?>
  <?php else : ?>
    <p>There are no posts to display. Try using the search.</p>
  <?php endif; ?>
  <?php
}

?>
