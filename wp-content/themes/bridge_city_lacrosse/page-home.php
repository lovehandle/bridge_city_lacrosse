<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<?php if (function_exists('responsive_slider') ) { ?>
  <div id="slider">
    <div id="slider-wrapper" class="container">
      <?php responsive_slider();  ?>
    </div>
  </div>
<?php } ?>

<section id="content" role="main">

  <?php if ( function_exists('get_option_tree') ) {
    $home_tagline = get_option_tree('home_tagline');
  } ?>

  <?php if ( isset($home_tagline) ) { ?>
    <div id="message">
      <div id="message-wrapper" class="container">
        <h1><?php echo($home_tagline); ?></h1>
      </div>
    </div>
  <?php } ?>

  <div id="middle-section">
    <div id="middle-section-wrapper" class="container">
      <?php bones_widgets('home_middle_section') ?>
    </div>
  </div>

  <div class="container">
    <hr />
  </div>

  <div id="bottom-section">
    <div id="bottom-section-wrapper" class="container">
      <?php bones_widgets('home_bottom_section') ?>
    </div>
  </div>
</section>



<?php get_footer(); ?>
