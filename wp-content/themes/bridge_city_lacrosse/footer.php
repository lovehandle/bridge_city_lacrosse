    <footer id="footer">
      <div id="footer-top">
        <div id="footer-top-wrapper" class="container">
          <nav id="footer-top-nav" role="navigation">
            <?php bones_footer_links(); ?>
          </nav>
          <nav id="footer-top-social" role="navigation">
            <ul>

              <?php if ( function_exists('get_option_tree') ) {
                $facebook_url = get_option_tree('facebook_url'); 
              }?>
              <?php if ( isset($facebook_url) ) { ?>
                <li>
                <a href="<?php echo($facebook_url); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/library/images/facebook.png" alt="Facebook" />
                  </a>
                </li>
              <?php } ?>

              <?php if ( function_exists('get_option_tree') ) {
                $google_plus_url = get_option_tree('google_plus_url'); 
              }?>
              <?php if ( isset($google_plus_url) ) { ?>
                <li>
                <a href="<?php echo($google_plus_url); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/library/images/google_plus.png" alt="Google +" />
                  </a>
                </li>
              <?php } ?>


              <?php if ( function_exists('get_option_tree') ) {
                $twitter_url = get_option_tree('twitter_url'); 
              }?>
              <?php if ( isset($twitter_url) ) { ?>
                <li>
                <a href="<?php echo($twitter_url); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/library/images/twitter.png" alt="Twitter" />
                  </a>
                </li>
              <?php } ?>

              <?php if ( function_exists('get_option_tree') ) {
                $flickr_url = get_option_tree('flickr_url'); 
              }?>
              <?php if ( isset($flickr_url) ) { ?>
                <li>
                <a href="<?php echo($flickr_url); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/library/images/flickr.png" alt="Flickr" />
                  </a>
                </li>
              <?php } ?>

            </ul>
          </nav>
        </div>
      </div>
      <div id="footer-bottom">
        <div id="footer-bottom-wrapper" class="container">
          <?php bones_widgets('footer_bottom_section') ?>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
	</body>
</html>
