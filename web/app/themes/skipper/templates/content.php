<article <?php post_class(); ?>>
  <header>
    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div class="skipper-post-thumbnail">
      <?php the_post_thumbnail('thumbnail'); ?>
    </div>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary clearfix">
    <?php the_excerpt(); ?>
  </div>
</article>
