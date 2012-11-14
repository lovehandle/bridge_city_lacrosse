<?php
/*
Plugin Name: Twitter JS
Plugin URI: 
Description: Adds a widget with tweets from a public timeline - loaded in JS. It uses Remy' <a href="https://github.com/remy/twitterlib">twitterlib</a>.
Version: 0.2
Author: Timothé Leroy @ Milky Interactive
Author URI: http://www.milky.fr

Copyright 2011  Milky Interactive  (email : contact@milky.fr)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

~Changelog:
0.1
First release
0.2
Added english language
Included & minified Remys' twitterlib, gained 7Kb

*/

// Init the plugins directory
define('TWJS_ABS_URL', WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__)).'/');
define('TWJS_REL_URL', dirname( plugin_basename(__FILE__) ));
define('TWJS_ABS_PATH', WP_PLUGIN_DIR . '/' . plugin_basename(dirname(__FILE__)).'/' );

// Twitter Widget
class TwitterWidget extends WP_Widget {
    
    function TwitterWidget() {
			$widget_ops = array('classname' => 'widget_twitter', 'description' => 'Displays last tweets');
			$this->WP_Widget('TwitterWidget', "Twitter JS", $widget_ops);
    }

    function widget($args, $instance) {
			extract($args);
			if (get_locale() != "fr_FR") $lang = 'en';
			$tid = esc_attr($instance['tid']);
			$filter = esc_attr($instance['filter']);
			$limit = esc_attr($instance['limit']);
			$blank = esc_attr($instance['blank']);
			if ($blank == "") $blank = "true";
			?>
			<article class="widget widget_tweets span4 content">		
			  <h4 class="widget-title"><?php echo $instance['title'] ?></h4>
			  <div id="tweetslist">
			    <?php if ($lang == "en") { echo "Loading tweets"; } else { echo "Chargement des tweets"; } ?>...
 			  </div>
			</article>
			
			<script type="text/javascript" charset="utf-8">
				jQuery(document).ready(function(){
					getTweets('tweetslist', '<?php echo $tid; ?>', '<?php echo $filter; ?>', '<?php echo $limit; ?>', <?php echo $blank; ?>, '<?php echo $lang; ?>');
				});
			</script>
    	<?php
    }

    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    function form($instance) {		
        $title = esc_attr($instance['title']);
				$tid = esc_attr($instance['tid']);
				$filter = esc_attr($instance['filter']);
				$limit = esc_attr($instance['limit']);
				$blank = esc_attr($instance['blank']);
				if ($blank == "") $blank = "true";
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('tid'); ?>"><?php _e('Twitter ID:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('tid'); ?>" name="<?php echo $this->get_field_name('tid'); ?>" type="text" value="<?php echo $tid; ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Filter:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="text" value="<?php echo $filter; ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Limit:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label></p>
				<p><label for="<?php echo $this->get_field_id('blank'); ?>"><?php _e('Open links in a new window:'); ?> <input id="<?php echo $this->get_field_id('blank'); ?>" name="<?php echo $this->get_field_name('blank'); ?>" type="checkbox" value="true" <?php if ($blank == "true") echo "checked"; ?> /></label></p>

        <?php 
    }

}

function TwitterWidgetInit() {
	wp_register_script('milkytwitter', (TWJS_ABS_URL."/js/milkytwitter.js"), false, '', true);
	wp_enqueue_script('milkytwitter');
	wp_register_script('twitterlib', (TWJS_ABS_URL."/js/twitterlib.min.js"), false, '', true);
	wp_enqueue_script('twitterlib'); 

	return register_widget("TwitterWidget");
}

add_action('widgets_init', 'TwitterWidgetInit');

?>