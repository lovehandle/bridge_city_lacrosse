<article class="post" role="article">
  <header class="post-header">
    <h1 class="post-title">
      <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
      </a>
    </h1>
  </header>

  <div class="post-content">
    <?php the_content(); ?>
  </div>
</article>
