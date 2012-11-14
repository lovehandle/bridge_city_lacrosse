<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<section id="content" role="main">
  <div id="slider">
    <div id="slider-wrapper" class="container">
      <ul>
        <?php
          $temp = $my_query;
          $my_query = null;
          $my_query = new WP_Query('post_type=slider&showposts=10');
          $my_query->query('post_type=slider&showposts=10');
        ?>
            
        <?php while ( $my_query->have_posts() ) : $my_query->the_post(); sltws_post_meta(); ?>
          <?php $sliderlink = $meta[ 'subtitle' ] ?> 
          <li>
            <?php if ($sliderlink != ('')){ ?> 
              <a href="<?php echo $sliderlink; ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('slide'); ?></a>
            <?php } else { ?> 
              <?php the_post_thumbnail('slide'); ?>
            <?php } ?>
          </li>
        <?php endwhile; ?>

      </ul>

      <?php wp_reset_query(); ?>

    </div>
  </div>

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
