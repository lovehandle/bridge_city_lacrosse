<?php bones_pre_content(); ?>

<section id="content" role="main">
  <div id="content-wrapper" class="container">

    <?php include(locate_template('sidebar.php')); ?>

    <div id="posts" class="span9">
      <?php bones_page_content(); ?>
    </div>

  </div>
</section>
