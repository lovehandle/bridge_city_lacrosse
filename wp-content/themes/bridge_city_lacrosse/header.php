<!DOCTYPE html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<title><?php wp_title(''); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
    <script type="text/javascript">
      WebFont.load({
        google: {
          families: ['Muli:400,300italic,300,400italic', 'IM+Fell+DW+Pica', 'Oswald']
        }
      });
    </script>

		<?php wp_head(); ?>

    <style type="text/css">
      <?php if ( function_exists('get_option_tree') ) {
        $body_background_url = get_option_tree('body_background_url');
      } ?>
      <?php if ( isset($body_background_url) ) { ?>
        body {
          background-image: url('<?php echo($body_background_url); ?>')
        } 
      <?php } ?>

      <?php if ( function_exists('get_option_tree') ) { 
        $accent_color = get_option_tree('accent_color');
      } ?>

      <?php if ( isset($accent_color) ) { ?>
        #header-top {
          background-color: <?php echo($accent_color); ?> 
        } 
      <?php } ?>
    </style>
	</head>

  <body <?php body_class(); ?>>
    <header id="header">
      <div id="header-top">
        <div id="header-top-wrapper" class="container">
          <a href="/">
            <h1 id="header-top-logo">
            
              <?php if ( function_exists('get_option_tree') ) { 
                $logo_url = get_option_tree('logo_url');
              } ?>
              <?php if ( isset($logo_url) ) { ?>
                <img src="<?php echo($logo_url); ?>"/>
              <?php } ?>
            </h1>
          </a>
        </div>
      </div>
      <div id="header-bottom">
        <div id="header-bottom-wrapper" class="container">
          <nav id="header-bottom-nav" role="navigation">
            <?php bones_main_nav(); ?>
          </nav>
          <div id="header-bottom-search">
            <form role="search" method="get" id="searchform" action="/">
              <input type="search" name="s" id="s" placeholder="Search the Site..." />
            </form>
          </div>
        </div>
      </div>
    </header>
