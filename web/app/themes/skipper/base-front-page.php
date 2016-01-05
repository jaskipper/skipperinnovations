<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <section id="landing" class="cover" style="background-image: url('<?php echo get_theme_mod('header_bg_image') ?>');">
      <div id="skipperlogo">
        <img src="<?php echo get_header_image(); ?>" width="650px">
      </div>

      <div id="fpnext">
        <span class="glyphicon glyphicon-hand-down" aria-hidden="true"></span>
        <a href="#" id="see-more" class="btn btn-default sk-smoothscroll" data-target="#fpdescription">See More</a>
      </div>
    </section>

    <section id="fpdescription" class="">
      <div class="container desc">
        <?php echo get_option('fp_description','Nothing') ?>
      </div>
    </section>

    <section id="fp-widgets" class="cover">
      <div id="fp-widgets-cover">
        <div class="container">
          <div class="row">
            
              <?php dynamic_sidebar( 'sidebar-fp-widgets' ); ?>

          </div>
        </div>
      </div>
    </section>

    <section id="fp-social" class="">
      <div class="wrap container">
        <div class="col-md-8 col-sm-8">
          <?php

          // The Query
          $recentPosts = new WP_Query();
          $recentPosts->query('showposts=3');

          while ($recentPosts -> have_posts()) : $recentPosts -> the_post(); ?>
            <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
          <?php endwhile;
          /* Restore original Post Data */
          wp_reset_postdata();

          ?>
        </div>
        <div class="col-md-4 col-sm-4">

          <?php dynamic_sidebar( 'sidebar-social' ); ?>

        </div>
      </div>
    </section>

    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
