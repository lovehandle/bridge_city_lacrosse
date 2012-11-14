<?php bones_pre_content(); ?>

<section id="content" role="main">
  <div id="content-wrapper" class="container">

    <div id="posts" class="span9">
      <?php bones_page_content(); ?>
    </div>

    <?php include(locate_template('sidebar.php')); ?>

  </div>
</section>
