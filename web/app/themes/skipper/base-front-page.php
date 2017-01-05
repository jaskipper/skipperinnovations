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
    <section id="landing" class="parallax-window" data-parallax="scroll" data-speed="0.2" data-image-src="<?php echo get_theme_mod('header_bg_image') ?>">
      <div id="skipperlogo" class="grow">
        <!--<a href="#" class="sk-smoothscroll" data-target="body"><img src="<?php echo get_header_image(); ?>" alt="Skipper Innovations Logo - Premium Web Design| Audio/Video/Lighting Solutions"></a>-->
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
    <section id="fp-widgets" class="parallax-window" data-parallax="scroll" data-speed="0.6" data-image-src="/app/uploads/2015/01/skipperinnovations-mix-4-sm.jpg">
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
          <h2>Blog</h2>
          <div id="fp-blog">
            <?php

            // The Query
            $recentPosts = new WP_Query();
            $recentPosts->query(array ('posts_per_page' => 3) );

            while ($recentPosts -> have_posts()) : $recentPosts -> the_post(); ?>
              <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
            <?php endwhile; ?>
            <?php
            /* Restore original Post Data */
            wp_reset_postdata();

            ?>
          </div>
          <a href="/skipperblog"><h3 class="fpreadblog"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Read more from the Blog...</h3></a>
        </div>

        <div class="col-md-4 col-sm-4 socialwrap">

          <h2>Jason's Instagram</h2>
          <div id="instafeed"></div>
        </div>
      </div>
    </section>

    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//www.skipperinnovations.com/piwik/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 1]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <noscript><p><`img src="//www.skipperinnovations.com/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
    <!-- End Piwik Code -->
  </body>
</html>
