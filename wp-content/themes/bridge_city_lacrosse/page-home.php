<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<section id="content" role="main">
  <div id="slider">
    <div id="slider-wrapper" class="container">

    </div>
  </div>

  <div id="message">
    <div id="message-wrapper" class="container">
      <h1>Some fantastic tagline that we'll think of later.</h1>
    </div>
  </div>

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
