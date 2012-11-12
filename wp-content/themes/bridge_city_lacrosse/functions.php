<?php

////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Media sizes     /////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

add_theme_support('post-thumbnails');
set_post_thumbnail_size(300, 300, true);
add_image_size( 'slide', 980, 389, true );
add_image_size( 'small', 75, 75, true );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Post Format     /////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


add_theme_support( 'post-formats', array( 'audio', 'link', 'gallery', 'video', 'quote', 'status' ) );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Prev & Next Buttons    //////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="button arrow_left"';
}
function posts_link_attributes_2() {
    return 'class="button arrow_right"';
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     2 WP Nav Menus     //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


register_nav_menus( array(  
  'primary' => __( 'Primary Navigation', 'fitness' ),  
  'secondary' => __('Secondary Navigation', 'fitness')  
) );  	


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Theme Options for widget     ////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


$include_path = TEMPLATEPATH . '/includes/';
require_once ($include_path . 'theme-options.php'); 


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Comments     ////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   
   <div class="comment-author-avatar">
   <?php echo get_avatar($comment,$size='50',$default='<path_to_url>' ); ?>
         
   </div>
   
   <div class="comment-main">
   
     <div class="comment-meta">
     <?php printf(__('<span class="comment-author">%s</span>'), get_comment_author_link()) ?> <br />
     <span class="comment-date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
	 <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a>
     &nbsp;- <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
     </span>
     </div>   
     
     </div>
     
     <div class="comment-content">      
     <?php if ($comment->comment_approved == '0') : ?>
     <p><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
     <?php comment_text() ?>
 
     </div> 
     
     
     <?php else : { ?>
 
     <?php comment_text() ?>  
     
     <?php } ?>  
     
	 <?php endif; ?>
	 
	 <?php
       }
				
	
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Content width set     ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


if ( ! isset( $content_width ) ) 
    $content_width = 980;
		
		
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Slider post type     ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


add_action('init', 'slider_register');
 
function slider_register() {
 
	$labels = array(
		'name' => __('Slider Images', 'post type general name'),
		'singular_name' => __('Slider Item', 'post type singular name'),
		'add_new' => __('Add New', 'slider item'),
		'add_new_item' => __('Add New Slider Item'),
		'edit_item' => __('Edit Slider Item'),
		'new_item' => __('New Slider Item'),
		'view_item' => __('View Slider Item'),
		'search_items' => __('Search Slider'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'slider' , $args );
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Slider meta box     /////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


function sltws_create_meta_box()
{
	add_meta_box(
		'sltws-meta-box-subtitle',
		__('URL goes here', 'fitness'),
		'sltws_meta_box_subtitle',
		'slider',
		'normal',
		'high'
	);
	
}

function sltws_meta_box_subtitle()
{
	global $meta; sltws_post_meta( $post->ID );
?>

	<input type="text" name="sltws_meta[subtitle]" value="<?php echo htmlspecialchars ($meta[ 'subtitle' ]); ?>" style="width:99%;" rows="5" /><br />
	<p><?php _e('Enter a URL here for this slider image to link to.  Leaving this blank will mean the slider image will not link at all.', 'fitness' ); ?></p>

<?php

}

add_action( 'admin_menu', 'sltws_create_meta_box' );

/**
 * Verify and save meta. Don't save if there is no specific meta, it is a revision,
 * or the current user can't edit posts.
 */
function sltws_save_meta_box( $post_id, $post )
{
	global $post, $type;

	$post = get_post( $post_id );

	if( !isset( $_POST[ "sltws_meta" ] ) )
		return;

	if( $post->post_type == 'revision' )
		return;

	$meta = apply_filters( 'sltws_post_meta', $_POST[ "sltws_meta" ] );

	foreach( $meta as $key => $meta_box )
	{
		$key = 'meta_' . $key;
		$curdata = $meta_box;
		$olddata = get_post_meta( $post_id, $key, true );

		if( $olddata == "" && $curdata != "" )
			add_post_meta( $post_id, $key, $curdata );
		elseif( $curdata != $olddata )
			update_post_meta( $post_id, $key, $curdata, $olddata );
		elseif( $curdata == "" )
			delete_post_meta( $post_id, $key );
	}

	do_action( 'sltws_saved_meta', $post );
}

add_action( 'save_post', 'sltws_save_meta_box', 1, 2 );

// check autosave
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
 return $post_id;
}

/**
 * Gathers all meta objects attached to a certain posts.
 * Excludes WordPress internal meta and creates an array of data.
 */
function sltws_post_meta( $post_id = '' )
{
	global $meta, $post, $wpdb;

	if( empty( $post_id ) )
		$post_id = $post->ID;

	$meta = array();
	$custom_field_keys = get_post_custom_keys( $post_id );

	if( $custom_field_keys )
	{
		foreach( $custom_field_keys as $key => $value )
		{
			$valuet = trim( $value );

			if ( '_' == $valuet{0} )
				continue;

			$value_short = str_replace( 'meta_', "", $valuet );

			$meta[ $value_short ] = get_post_meta( $post_id, $value, true );
		}
	}

	return $meta;
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Text Domain     /////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


load_theme_textdomain ('fitness');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Multi Language Ready     ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


load_theme_textdomain( 'fitness', TEMPLATEPATH.'/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH."/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Contact Form 7     //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


/**
 * Functions:	Optimize and style Contact Form 7 - WPCF7
 *
 */
// Remove the default Contact Form 7 Stylesheet
function remove_wpcf7_stylesheet() {
	remove_action( 'wp_head', 'wpcf7_wp_head' );
}

// Add the Contact Form 7 scripts on selected pages
function add_wpcf7_scripts() {
	if ( is_page('contact') )
		wpcf7_enqueue_scripts();
}

// Change the URL to the ajax-loader image
function change_wpcf7_ajax_loader($content) {
	if ( is_page('contact') ) {
		$string = $content;
		$pattern = '/(<img class="ajax-loader" style="visibility: hidden;" alt="ajax loader" src=")(.*)(" \/>)/i';
		$replacement = "$1".get_template_directory_uri()."/images/ajax-loader.gif$3";
		$content =  preg_replace($pattern, $replacement, $string);
	}
	return $content;
}

// If the Contact Form 7 Exists, do the tweaks
if ( function_exists('wpcf7_contact_form') ) {
	if ( ! is_admin() && WPCF7_LOAD_JS )
		remove_action( 'init', 'wpcf7_enqueue_scripts' );

	add_action( 'wp', 'add_wpcf7_scripts' );
	add_action( 'init' , 'remove_wpcf7_stylesheet' );
	add_filter( 'the_content', 'change_wpcf7_ajax_loader', 100 );
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Shortcodes    ///////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


//	blockquote
add_shortcode('quote', 'tws_quote');

function tws_quote($atts, $content = null) {
	return '<div class="quote">' .do_shortcode($content).'</div>';
}

//	intro
add_shortcode('intro', 'tws_intro');

function tws_intro($atts, $content = null) {
	return '<div class="intro">' .do_shortcode($content).'</div>';
}

//	hr
add_shortcode('hr', 'tws_hr');

function tws_hr($atts, $content = null) {
	return '<div class="hrr">' .do_shortcode($content).'</div>';
}

//	pullquoteleft
add_shortcode('pullquoteleft', 'tws_pullquoteleft');

function tws_pullquoteleft($atts, $content = null) {
	return '<div class="pullquoteleft">' .do_shortcode($content).'</div>';
}

//	pullquoteright
add_shortcode('pullquoteright', 'tws_pullquoteright');

function tws_pullquoteright($atts, $content = null) {
	return '<div class="pullquoteright">' .do_shortcode($content).'</div>';
}

//	alert_yellow
add_shortcode('alert_yellow', 'tws_alert_yellow');

function tws_alert_yellow($atts, $content = null) {
	return '<div class="alert_yellow">' .do_shortcode($content).'</div>';
}

//	alert_blue
add_shortcode('alert_blue', 'tws_alert_blue');

function tws_alert_blue($atts, $content = null) {
	return '<div class="alert_blue">' .do_shortcode($content).'</div>';
}

//	alert_green
add_shortcode('alert_green', 'tws_alert_green');

function tws_alert_green($atts, $content = null) {
	return '<div class="alert_green">' .do_shortcode($content).'</div>';
}

//	alert_red
add_shortcode('alert_red', 'tws_alert_red');

function tws_alert_red($atts, $content = null) {
	return '<div class="alert_red">' .do_shortcode($content).'</div>';
}

//	alert_standard
add_shortcode('alert_standard', 'tws_alert_standard');

function tws_alert_standard($atts, $content = null) {
	return '<div class="alert_standard">' .do_shortcode($content).'</div>';
}

//	highlight_text
add_shortcode('highlight_text', 'tws_highlight_text');

function tws_highlight_text($atts, $content = null) {
	return '<span class="highlight_text">' .do_shortcode($content).'</span>';
}

//	one_half
add_shortcode('one_half', 'tws_one_half');

function tws_one_half($atts, $content = null) {
	return '<div class="one_half">' .do_shortcode($content).'</div>';
}

//	one_third
add_shortcode('one_third', 'tws_one_third');

function tws_one_third($atts, $content = null) {
	return '<div class="one_third">' .do_shortcode($content).'</div>';
}

//	two_third
add_shortcode('two_third', 'tws_two_third');

function tws_two_third($atts, $content = null) {
	return '<div class="two_third">' .do_shortcode($content).'</div>';
}

//	one_fourth
add_shortcode('one_fourth', 'tws_one_fourth');

function tws_one_fourth($atts, $content = null) {
	return '<div class="one_fourth">' .do_shortcode($content).'</div>';
}

//	three_fourth
add_shortcode('three_fourth', 'tws_three_fourth');

function tws_three_fourth($atts, $content = null) {
	return '<div class="three_fourth">' .do_shortcode($content).'</div>';
}

//	one_fifth
add_shortcode('one_fifth', 'tws_one_fifth');

function tws_one_fifth($atts, $content = null) {
	return '<div class="one_fifth">' .do_shortcode($content).'</div>';
}

//	two_fifth
add_shortcode('two_fifth', 'tws_two_fifth');

function tws_two_fifth($atts, $content = null) {
	return '<div class="two_fifth">' .do_shortcode($content).'</div>';
}

//	three_fifth
add_shortcode('three_fifth', 'tws_three_fifth');

function tws_three_fifth($atts, $content = null) {
	return '<div class="three_fifth">' .do_shortcode($content).'</div>';
}

//	four_fifth
add_shortcode('four_fifth', 'tws_four_fifth');

function tws_four_fifth($atts, $content = null) {
	return '<div class="four_fifth">' .do_shortcode($content).'</div>';
}

//	one_sixth
add_shortcode('one_sixth', 'tws_one_sixth');

function tws_one_sixth($atts, $content = null) {
	return '<div class="one_sixth">' .do_shortcode($content).'</div>';
}

//	five_sixth
add_shortcode('five_sixth', 'tws_five_sixth');

function tws_five_sixth($atts, $content = null) {
	return '<div class="five_sixth">' .do_shortcode($content).'</div>';
}

//	one_half_first
add_shortcode('one_half_first', 'tws_one_half_first');

function tws_one_half_first($atts, $content = null) {
	return '<div class="one_half_first">' .do_shortcode($content).'</div>';
}

//	one_third_first
add_shortcode('one_third_first', 'tws_one_third_first');

function tws_one_third_first($atts, $content = null) {
	return '<div class="one_third_first">' .do_shortcode($content).'</div>';
}

//	one_fourth_first
add_shortcode('one_fourth_first', 'tws_one_fourth_first');

function tws_one_fourth_first($atts, $content = null) {
	return '<div class="one_fourth_first">' .do_shortcode($content).'</div>';
}

//	one_fifth_first
add_shortcode('one_fifth_first', 'tws_one_fifth_first');

function tws_one_fifth_first($atts, $content = null) {
	return '<div class="one_fifth_first">' .do_shortcode($content).'</div>';
}

//	one_sixth_first
add_shortcode('one_sixth_first', 'tws_one_sixth_first');

function tws_one_sixth_first($atts, $content = null) {
	return '<div class="one_sixth_first">' .do_shortcode($content).'</div>';
}

//	two_third_first
add_shortcode('two_third_first', 'tws_two_third_first');

function tws_two_third_first($atts, $content = null) {
	return '<div class="two_third_first">' .do_shortcode($content).'</div>';
}

//	three_fourth_first
add_shortcode('three_fourth_first', 'tws_three_fourth_first');

function tws_three_fourth_first($atts, $content = null) {
	return '<div class="three_fourth_first">' .do_shortcode($content).'</div>';
}

//	two_fifth_first
add_shortcode('two_fifth_first', 'tws_two_fifth_first');

function tws_two_fifth_first($atts, $content = null) {
	return '<div class="two_fifth_first">' .do_shortcode($content).'</div>';
}

//	three_fifth_first
add_shortcode('three_fifth_first', 'tws_three_fifth_first');

function tws_three_fifth_first($atts, $content = null) {
	return '<div class="three_fifth_first">' .do_shortcode($content).'</div>';
}

//	four_fifth_first
add_shortcode('four_fifth_first', 'tws_four_fifth_first');

function tws_four_fifth_first($atts, $content = null) {
	return '<div class="four_fifth_first">' .do_shortcode($content).'</div>';
}

//	button_active
add_shortcode('button', 'tws_button');

function tws_button($atts, $content = null) {
	return '<div class="button">' .do_shortcode($content).'</div>';
}

//	button_reverse_reverse
add_shortcode('button_reverse', 'tws_button_reverse');

function tws_button_reverse($atts, $content = null) {
	return '<div class="button_reverse">' .do_shortcode($content).'</div>';
}

//	active_button_map
add_shortcode('active_button_map', 'tws_active_button_map');

function tws_active_button_map($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button"><a class="map" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	active_button_mail
add_shortcode('active_button_mail', 'tws_active_button_mail');

function tws_active_button_mail($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button"><a class="mail" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	active_button_drink
add_shortcode('active_button_drink', 'tws_active_button_drink');

function tws_active_button_drink($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button"><a class="drink" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	active_button_book
add_shortcode('active_button_book', 'tws_active_button_book');

function tws_active_button_book($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button"><a class="book" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	active_button_ipod
add_shortcode('active_button_ipod', 'tws_active_button_ipod');

function tws_active_button_ipod($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button"><a class="ipod" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	active_button_gallery
add_shortcode('active_button_gallery', 'tws_active_button_gallery');

function tws_active_button_gallery($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button"><a class="gallery" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	active_button_headphones
add_shortcode('active_button_headphones', 'tws_active_button_headphones');

function tws_active_button_headphones($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button"><a class="headphones" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	active_button_download
add_shortcode('active_button_download', 'tws_active_button_download');

function tws_active_button_download($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button"><a class="download" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	active_button_information
add_shortcode('active_button_information', 'tws_active_button_information');

function tws_active_button_information($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button"><a class="information" href="'.$link.'"><span>' .do_shortcode($content).'</span></a><div class="clear"></div></div>';
}

//	reverse_button_map
add_shortcode('reverse_button_map', 'tws_reverse_button_map');

function tws_reverse_button_map($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button_reverse"><a class="map" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	reverse_button_mail
add_shortcode('reverse_button_mail', 'tws_reverse_button_mail');

function tws_reverse_button_mail($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button_reverse"><a class="mail" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	reverse_button_drink
add_shortcode('reverse_button_drink', 'tws_reverse_button_drink');

function tws_reverse_button_drink($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button_reverse"><a class="drink" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	reverse_button_book
add_shortcode('reverse_button_book', 'tws_reverse_button_book');

function tws_reverse_button_book($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button_reverse"><a class="book" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	reverse_button_ipod
add_shortcode('reverse_button_ipod', 'tws_reverse_button_ipod');

function tws_reverse_button_ipod($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button_reverse"><a class="ipod" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	reverse_button_gallery
add_shortcode('reverse_button_gallery', 'tws_reverse_button_gallery');

function tws_reverse_button_gallery($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button_reverse"><a class="gallery" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	reverse_button_headphones
add_shortcode('reverse_button_headphones', 'tws_reverse_button_headphones');

function tws_reverse_button_headphones($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button_reverse"><a class="headphones" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	reverse_button_download
add_shortcode('reverse_button_download', 'tws_reverse_button_download');

function tws_reverse_button_download($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button_reverse"><a class="download" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}

//	reverse_button_information
add_shortcode('reverse_button_information', 'tws_reverse_button_information');

function tws_reverse_button_information($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<div class="button_reverse"><a class="information" href="'.$link.'"><span>' .do_shortcode($content).'</span></a></div>';
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Include post, page and portfolio in search     //////////////////
////////////////////////////////////////////////////////////////////////////////////////////


function filter_search($query) {
    if ($query->is_search) {
	$query->set('post_type', array('post', 'page', 'event'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Remove the jump on read more     ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


function remove_more_jump_link($link) { 
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Description text on menu items     //////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


class My_Walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = '';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '<span>' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Include tiny mce for shortcode buttons     //////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


include('tinyMCE.php');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Load CSS Stylesheets     ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


function tws_css_loader() {
    wp_enqueue_style('style', get_template_directory_uri().'/style.css', false ,'1.1', 'all' );
  }
add_action('wp_enqueue_scripts', 'tws_css_loader');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Load JS Scripts     /////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


  function tws_js_loader() {
	   wp_enqueue_script('twitter', get_template_directory_uri().'/js/jquery.tweet.js', array('jquery'),'1.0', true );
	   wp_enqueue_script('slider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'),'1.0', true );
	   wp_enqueue_script('easing', get_template_directory_uri().'/js/jquery.easing.1.3.js', array('jquery'),'1.0', true );
	   wp_enqueue_script('hover', get_template_directory_uri().'/js/hoverIntent.js', array('jquery'),'1.0', true );
       wp_enqueue_script('respond', get_template_directory_uri().'/js/respond.min.js', array('jquery'),'1.0', true );
	   wp_enqueue_script('sfmenu', get_template_directory_uri().'/js/jquery.sfmenu.js', array('jquery'),'1.0', true );
       wp_enqueue_script('preloadimg', get_template_directory_uri().'/js/jquery.preloadcssimages.js', array('jquery'),'1.0', true );
  }
add_action('wp_enqueue_scripts', 'tws_js_loader');



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Remove shortcode from excerpt     ///////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_trim_excerpt');

function custom_trim_excerpt($text = '')
{
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
 
		//$text = strip_shortcodes( $text );
 
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = apply_filters('excerpt_length', 55);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}

add_filter('get_the_excerpt','do_shortcode');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Change excerpt length     ///////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}


////////////////////////////////////////////////////////////////////////////////////////////
/////////////////    Extract first occurance of text from a string     /////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

// Extract first occurance of text from a string
function my_extract_from_string($start, $end, $tring) {
	$tring = stristr($tring, $start);
	$trimmed = stristr($tring, $end);
	return substr($tring, strlen($start), -strlen($trimmed));
}


function get_content_link( $content = false, $echo = false )
{
    // allows using this function also for excerpts
    if ( $content === false )
        $content = get_the_content(); // You could also use $GLOBALS['post']->post_content;

    $content = preg_match_all( '/href\s*=\s*[\"\']([^\"\']+)/', $content, $links );
    $content = $links[1][0];
    $content = make_clickable( $content );

    // if you set the 2nd arg to true, you'll echo the output, else just return for later usage
    if ( $echo === true )
        echo $content;

    return $content;
}



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Allow Shortcodes in Widgets     /////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


add_filter('widget_text', 'do_shortcode');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Remove height/width on images for responsive     ////////////////
////////////////////////////////////////////////////////////////////////////////////////////


add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

function vn_formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Exclude thumbnail from gallery     //////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////


function exclude_thumbnail_from_gallery($null, $attr)
{
    if (!$thumbnail_ID = get_post_thumbnail_id())
        return $null; // no point carrying on if no thumbnail ID

    // temporarily remove the filter, otherwise endless loop!
    remove_filter('post_gallery', 'exclude_thumbnail_from_gallery');

    // pop in our excluded thumbnail
    if (!isset($attr['exclude']) || empty($attr['exclude']))
        $attr['exclude'] = array($thumbnail_ID);
    elseif (is_array($attr['exclude']))
        $attr['exclude'][] = $thumbnail_ID;

    // now manually invoke the shortcode handler
    $gallery = gallery_shortcode($attr);

    // add the filter back
    add_filter('post_gallery', 'exclude_thumbnail_from_gallery', 10, 2);

    // return output to the calling instance of gallery_shortcode()
    return $gallery;
}
add_filter('post_gallery', 'exclude_thumbnail_from_gallery', 10, 2);



// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'vn_formatter', 99);
add_filter('widget_text', 'vn_formatter', 99);

?>
