<?php  
/* 
Template Name: Sitemap 
*/  
?>

<?php get_header(); ?>	

<!-- Start of main -->
<section id="main">

<!-- Start of left content wrapper -->
<section id="left_content_wrapper">

<!-- Start of left content -->
<div id="left_contentsearch">

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start of posted details -->
<div class="posted_details">

<h1 class="light"><?php _e( 'Pages', 'fitness' ); ?></h1>

</div><!-- End of posted details -->

<!-- Start of featured_text blog -->
<div class="featured_text_full">

<ul><?php wp_list_pages("title_li=" ); ?></ul>

</div><!-- End of featured_text blog -->  

</article><!-- End of blog wrapper -->

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start of posted details -->
<div class="posted_details">

<h1 class="light"><?php _e( 'Feeds', 'fitness' ); ?></h1>

</div><!-- End of posted details -->

<!-- Start of featured_text blog -->
<div class="featured_text_full">

<ul>

<li><a title="<?php _e( 'Full content', 'fitness' ); ?>" href="feed:<?php bloginfo('rss2_url'); ?>"><?php _e( 'Main RSS', 'fitness' ); ?></a></li>
<li><a title="<?php _e( 'Comment Feed', 'fitness' ); ?>" href="feed:<?php bloginfo('comments_rss2_url'); ?>"><?php _e( 'Comment Feed', 'fitness' ); ?></a></li>

</ul>

</div><!-- End of featured_text blog -->  

</article><!-- End of blog wrapper -->

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start of posted details -->
<div class="posted_details">

<h1 class="light"><?php _e( 'Categories', 'fitness' ); ?></h1>

</div><!-- End of posted details -->

<!-- Start of featured_text blog -->
<div class="featured_text_full">

<ul>

<?php $args = array(
    'show_option_all'    => '',
    'orderby'            => 'name',
    'order'              => 'ASC',
    'style'              => 'list',
    'show_count'         => 1,
    'hide_empty'         => 1,
    'use_desc_for_title' => 0,
    'child_of'           => 0,
    'feed'               => '',
    'feed_type'          => '',
    'feed_image'         => '',
    'exclude'            => '',
    'exclude_tree'       => '',
    'include'            => '',
    'hierarchical'       => true,
    'title_li'           => '',
    'show_option_none'   => __('No categories'),
    'number'             => NULL,
    'echo'               => 1,
    'depth'              => 0,
    'current_category'   => 0,
    'pad_counts'         => 0,
    'taxonomy'           => 'category',
    'walker'             => 'Walker_Category' ); ?> 
	
	<?php wp_list_categories( $args ); ?>
    
</ul>

</div><!-- End of featured_text blog -->  

</article><!-- End of blog wrapper -->

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start of posted details -->
<div class="posted_details">

<h1 class="light"><?php _e( 'All Blog Posts', 'fitness' ); ?></h1>

</div><!-- End of posted details -->

<!-- Start of featured_text blog -->
<div class="featured_text_full">

<ul>

<?php $archive_query = new WP_Query('showposts=1000&cat=-8');
while ($archive_query->have_posts()) : $archive_query->the_post(); ?>

<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'fitness' ); ?><?php the_title(); ?>"><?php the_title(); ?></a>
(<?php comments_number('0', '1', '%'); ?>)
</li>

<?php endwhile; ?>
    
</ul>

</div><!-- End of featured_text blog -->  

</article><!-- End of blog wrapper -->

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start of posted details -->
<div class="posted_details">

<h1 class="light"><?php _e( 'Archives', 'fitness' ); ?></h1>

</div><!-- End of posted details -->

<!-- Start of featured_text blog -->
<div class="featured_text_full">

<ul>

<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
    
</ul>

</div><!-- End of featured_text blog -->  

</article><!-- End of blog wrapper -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of left content -->

</section><!-- End of left content wrapper -->

<!-- Start of right content wrapper -->
<aside id="right_content_wrapper">

<!-- Start of right content -->
<div id="right_content">
<?php get_sidebar ('page'); ?>   

</div><!-- End of right content -->

</aside><!-- End of right content wrapper -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>