<?php
/*
 * The default template for displaying quote
 */
?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start of featured_text -->
<div class="featured_text_quote">

<!-- Start of postformattype -->
<div id="postformattypequote"><img src="<?php bloginfo('template_directory'); ?>/img/quoteiconblog.png" height="23" width="28" alt="quote" />

</div><!-- End of postformattype -->

<blockquote><?php the_content(); ?></blockquote>

</div><!-- End of featured_text -->      

</article><!-- End of blog wrapper -->
