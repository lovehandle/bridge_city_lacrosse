<article class="post" role="article">
  <header class="post-header">
    <h1 class="post-title">
      <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
      </a>
    </h1>
    <div class="post-info">
      <span class="post-author"><?php the_author(); ?></span>
      <span class="post-date"><?php the_time("F jS, Y") ?></span>
      <span class="post-comments"><?php comments_popup_link('0', '1', '%'); ?> comments</span>
    </div>
  </header>

  <div class="post-content">
    <?php the_content(); ?>
  </div>
</article>
