<?php 
/*
Plugin Name: Twitter
Plugin URI: http://www.zoonte.com/twitter/
Description: Fetching your tweets from Twitter.com
Author: Iuhas I. Daniel
License: GPL
Version: 1.2
Author URI: http://www.zoonte.com

Copyright 2010  Iuhas I. Daniel  (email : iuhas.daniel@igate.ro)

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
*/

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'load_twitter' );

function load_twitter() {
	register_widget( 'Twitter_Fetch' );
}

class Twitter_fetch extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Twitter_Fetch() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'twitter', 'description' => __('Fetch Twitter.com', 'twitter') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'twitter-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'twitter-widget', __('rsh-Twitter', 'twitter'), $widget_ops, $control_ops );
	}
	
	function timeSince($older_date, $newer_date = false){
	  $chunks = array(
	   'year'   => 60 * 60 * 24 * 365,  // 31,536,000 seconds
	   'month'  => 60 * 60 * 24 * 30,   // 2,592,000 seconds
	   'week'   => 60 * 60 * 24 * 7,    // 604,800 seconds
	   'day'    => 60 * 60 * 24,        // 86,400 seconds
	   'hour'   => 60 * 60,             // 3600 seconds
	   'minute' => 60,                  // 60 seconds
	   'second' => 1                    // 1 second
	  );
	
	 $newer_date = ($newer_date == false) ? (time()+(60*60*get_settings("gmt_offset"))) : $newer_date;
	 $since = $newer_date - $older_date;
	
	 foreach ($chunks as $key => $seconds)
	  if (($count = floor($since / $seconds)) != 0) break;
	
	 $messages = array(
	   'year'	=> _n('about %s year ago', '%s years ago', $count, 'mystique'),
	   'month'	=> _n('about %s month ago', '%s months ago', $count, 'mystique'),
	   'week'	=> _n('about %s week ago', '%s weeks ago', $count, 'mystique'),
	   'day'	=> _n('about %s day ago', '%s days ago', $count, 'mystique'),
	   'hour'	=> _n('about %s hour ago', '%s hours ago', $count, 'mystique'),
	   'minute'	=> _n('about %s minute ago', '%s minutes ago', $count, 'mystique'),
	   'second'	=> _n('about %s second ago', '%s seconds ago', $count, 'mystique'),
	  );
	  return sprintf($messages[$key],$count);
	}



	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );
		
		global $interval;
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$username = apply_filters('widget_username', $instance['username']);
		$count = $instance['count'];
		$interval = $instance['interval'];
		$displaydate = isset( $instance['display_date'] ) ? $instance['display_date'] : false;
		$displayavatar = isset( $instance['display_avatar'] ) ? $instance['display_avatar'] : false;
		
		/* getting data */
		$error = false;
		require_once( ABSPATH . 'wp-includes/class-snoopy.php');
		$snoopy = new Snoopy;
		$response = @$snoopy->fetch("http://twitter.com/users/show/".$username.".json");
		if ($response) $user_data = json_decode($snoopy->results, true); else $error = true;
		$response = @$snoopy->fetch("http://twitter.com/statuses/user_timeline/".$username.".json");
		if ($response) $tweets = json_decode($snoopy->results, true); else $error = true;
		#echo '<pre>';var_dump(json_decode($snoopy->results, true));echo '</pre>';
		if(!$error):
			$twit_data = array();
			
			$twit_data['user']['profile_image_url'] = $user_data['profile_image_url'];
			$twit_data['user']['name'] = $user_data['name'];
			$twit_data['user']['screen_name'] = $user_data['screen_name'];
			$twit_data['user']['followers_count'] = $user_data['followers_count'];
			$i = 0;
			foreach($tweets as $tweet):
				$twit_data['tweets'][$i]['text'] = $tweet['text'];
				$twit_data['tweets'][$i]['created_at'] = $tweet['created_at'];
				$twit_data['tweets'][$i]['id'] = $tweet['id'];
				if ($displayavatar) {
					$twit_data['tweets'][$i]['avatar'] = $tweet['user']['profile_image_url'];
					$twit_data['tweets'][$i]['name'] = $tweet['user']['screen_name'];
				}
				$i++;
			endforeach;
			#set_transient('twitter_'.$id, $twit_data, 60); // keep the data cached 60 seconds
			
		endif;
		
		/* Before widget (defined by themes). */
		echo $before_widget;
		
		// Set internal Wordpress feed cache interval, by default it's 12 hours or so
		add_filter('wp_feed_cache_transient_lifetime', array(&$this, 'setInterval'));
		$cachefile = dirname(__FILE__) . '/cache/twitter_' . $username . '.txt';
		/* Display the widget title if one was input (before and after defined by themes). */
		if ( !empty( $title ) ) echo $before_title . $title . $after_title;
		
		if (!file_exists($cachefile) || (file_exists($cachefile) && (filemtime($cachefile) + $interval) < time())) :	
			if(!$error && is_array($twit_data['tweets'])):
				$siteurl = get_option('siteurl');
				//$url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/images/icon.png';
				$result .= '<style type="text/css">@import url('.$siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/css/style.css);</style>';				
				$result .= '<div class="clear-block twitter-block"><div class="twitter-avatar"><img src="'.$twit_data['user']['profile_image_url'].'" alt="'.$twit_data['user']['name'].'" /></div><div class="twitter-info"><a href="http://www.twitter.com/'.$username.'">'.$twit_data['user']['name'].'</a><br /><span class="twitter-followers"> '.$twit_data['user']['followers_count'].' followers</span></div>';
				$result .= '</div><div class="clear-block"></div><div class="twitter-line"></div><div>';
				$i = 0;
				foreach($twit_data['tweets'] as $tweet):
					$pattern = '/\@(\w+)/';
					$replace = '<a rel="nofollow" href="http://twitter.com/$1">@$1</a>';
					$tweet['text'] = preg_replace($pattern, $replace , $tweet['text']);
					$tweet['text'] = make_clickable($tweet['text']);
					
					$tweettime = substr_replace($tweet['created_at'],'',strpos($tweet['created_at'],"+"),5);
					$link = "http://twitter.com/".$twit_data['user']['screen_name']."/statuses/".$tweet['id'];
					
					$result .= '<div class="twitter-tweet-'.$i.' twitter-tweet-display">';
					
					
					if ($displayavatar) {
						$result .= '<div class="twitter-text-avatar">';
						$result .= '<img src="'.$tweet['avatar'].'" alt="'.$tweet['name'].'" width="32" height="32" />';
						$result .= '</div>';
					}
					
					if ($displayavatar) {
						$result .= '<div class="twitter-tweet-no-img">';
					} else {
						$result .= '<div class="twitter-tweet">';
					}
					if ($displayavatar) {
						$result .= '<a href="http://www.twitter.com/'.$tweet['name'].'">'.$tweet['name'].'</a>&nbsp;';
					}
					$result .= '<strong>' . $tweet['text'] .'</strong>';
					
					
					if ($displaydate) {
						$result .= '<a class="twitter-date" href="'.$link.'" rel="nofollow">'.$this->timeSince(abs(strtotime($tweettime . " GMT")),time()). '</a></div>';
						
						$result .= '</div>';
					} else {
						$result .= '</div>';
					}
					$i++;
					if ($i == $count) break;
				endforeach;
				$result .= '</div>';
			
			else:
				$result .= '<p class="error"><?php _e("Error while retrieving tweets (Twitter down?)","twitter"); ?></p>';
			endif;
			
			// save to cahce
			@file_put_contents($cachefile, $result);
			
			// display the results
			echo $result;
		else :
			$result = @file_get_contents($cachefile);
			if (!empty($result)) : 
				echo $result; 
			else : 
				echo '<p>Error while loading Twitter feed from Cache file!Maybe it was not writen?.</p>';
			endif;
		endif;
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	function setInterval() {
		global $interval;
		
		return $interval;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['count'] = strip_tags( $new_instance['count'] );
		$instance['interval'] = strip_tags( $new_instance['interval'] );
		$instance['display_date'] = $new_instance['display_date'];
		$instance['display_avatar'] = $new_instance['display_avatar'];
		
		var_dump($instance);
		$cachedfile = dirname(__FILE__) . '/cache/twitter_' . $old_instance['username'] . '.txt';
		@unlink($cachefile);

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __('Twitter', 'twitter'), 
			'username' => __('brehash', 'twitter'), 
			'count' => __('5', 'twitter'), 
			'interval' => __('1800', 'twitter'), 
			'display_date' => true,
			'display_avatar' => false
			 );
			
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100px;" />
		</p>

		<!-- Your UserName: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Twitter username', 'twitter'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" style="width:100px;" />
		</p>

		<!-- Count: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('Count:', 'twitter'); ?></label> <br />
			<input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" size="2" />
		</p>
        
        <!-- Interval: Cache feed for interval seconds -->
		<p>
			<label for="<?php echo $this->get_field_id( 'interval' ); ?>"><?php _e('Update Interval (in seconds):', 'twitter'); ?></label> <br />
			<input id="<?php echo $this->get_field_id( 'interval' ); ?>" name="<?php echo $this->get_field_name( 'interval' ); ?>" value="<?php echo $instance['interval']; ?>" size="5" />
		</p>
        
        <!-- Display Date: true or false -->
        <p>
			<input class="checkbox" type="checkbox" <?php if ($instance['display_date']) echo 'checked="checked" '; ?>id="<?php echo $this->get_field_id('display_date'); ?>" name="<?php echo $this->get_field_name('display_date'); ?>" />
				<label for="<?php echo $this->get_field_id('display_date'); ?>"><?php _e('Display date?', 'twitter'); ?></label>

		</p>
        
        <!-- Display Date: true or false -->
        <p>
			<input class="checkbox" type="checkbox" <?php if ($instance['display_avatar']) echo 'checked="checked" '; ?>id="<?php echo $this->get_field_id('display_avatar'); ?>" name="<?php echo $this->get_field_name('display_avatar'); ?>" />
				<label for="<?php echo $this->get_field_id('display_avatar'); ?>"><?php _e('Display avatar?', 'twitter'); ?></label>

		</p>
	<?php
	}
}

?>