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
        <a href="#" class="sk-smoothscroll" data-target="body"><img src="<?php echo get_header_image(); ?>"></a>
      </div>

      <div id="fpnext">
        <span class="glyphicon glyphicon-hand-down" aria-hidden="true"></span>
        <a href="#" id="see-more" class="btn btn-default sk-smoothscroll" data-target="#fpdescription">See More</a>
      </div>
    </section>

    <section id="fpdescription" class="">
      <div class="container desc">
        <div class="skipperfptitle">
          <h1>Premium Web Design & Audio/Video/Lighting Solutions for your Church or Business</h1>
        </div>
        <?php //echo get_option('fp_description','Nothing') ?>
        I am a Bilingual (English/Spanish) Freelance Web Designer and Audio Engineer. I'm passionate about helping Churches and Businesses grow, reach and make an impact in their communities through powerful audio/visual environments and a strategic online presence.
      </div>
    </section>

    <section id="fp-widgets" class="cover">
      <div id="fp-widgets-cover">
        <div class="container">
          <div class="row">

            <?php //dynamic_sidebar( 'sidebar-fp-widgets' ); ?>

            <section class="widget skipper_fp_widget-7 widget_skipper_fp_widget">
              <aside id="fptext_widget-info" class="col-md-3 col-sm-3 skipper-text-widget">
                <a href="/Skipper" class="aglyph" data-target=""><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
                <h3 class="home-widget-title"><a href="/skipper">About Me</a></h3>
                <div class="textwidget">
                  Learn about me (Jason Skipper) and my experience over the years in missions, multiple church plants, technology, business and @ Apple!          </div>
                <a href="/Skipper" class="btn btn-info btn-lg" data-target="">
                  Learn More
                </a>
              </aside>
            </section>
            <section class="widget skipper_fp_widget-8 widget_skipper_fp_widget">
              <aside id="fptext_widget-danger" class="col-md-3 col-sm-3 skipper-text-widget">
                <a href="/website-development-design/" class="aglyph
                  " data-target=""><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></a>
                <h3 class="home-widget-title"><a href="/skipper">What I Do</a></h3>
                <div class="textwidget">
                  Many things! Web Development/Design, Sound, Lighting, and more. My goal is to help you touch lives through the creative use of technology.          </div>
                <a href="/website-development-design/" class="btn
                  btn-danger            btn-lg
                  " data-target="">
                  Learn More
                </a>
              </aside>
            </section>
            <section class="widget skipper_fp_widget-9 widget_skipper_fp_widget">
              <aside id="fptext_widget-warning" class="col-md-3 col-sm-3 skipper-text-widget">
                <a href="#" class="aglyph
                  sk-smoothscroll" data-target="#fp-social"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></a>
                <h3 class="home-widget-title"><a href="/skipper">Blog</a></h3>
                <div class="textwidget">
                  Read my Blog where I share my thoughts, ideas, experience, secrets, rants and everything else about business, ministry, life and technology!          </div>
                <a href="#" class="btn
                  btn-warning            btn-lg
                  sk-smoothscroll" data-target="#fp-social">
                  Read Now          </a>
              </aside>
            </section>
            <section class="widget skipper_fp_widget-10 widget_skipper_fp_widget">
              <aside id="fptext_widget-success" class="col-md-3 col-sm-3 skipper-text-widget">
                <a href="/contact" class="aglyph
                  " data-target=""><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a>
                <h3 class="home-widget-title"><a href="/skipper">Contact</a></h3>
                <div class="textwidget">
                  Maximize the impact that your church or business has on this world. Let me know your dream, and I'll help you find a solution! Call or E-mail me today!          </div>
                <a href="/contact" class="btn
                  btn-success            btn-lg
                  " data-target="">
                  Contact Us!
                </a>
              </aside>
            </section>
          </div>
        </div>
      </div>
    </section>

    <section id="fp-social" class="">
      <div class="wrap container">
        <div class="col-md-8 col-sm-6">
          <h2>Blog</h2>
          <div id="fp-blog">
            <?php

            // The Query
            $recentPosts = new WP_Query();
            $recentPosts->query(array ('posts_per_page' => 4) );

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

        <div class="col-md-4 col-sm-6 socialwrap">

          <?php //dynamic_sidebar( 'sidebar-social' ); ?>
          <h2>Social Media</h2>
          <div id="fp-social" class="social-feed-container"></div>
          <!-- <div id="fpads">
            <h2>Sponsored Links</h2>
            <div id="fp-sponsored-links" >
              <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
              <ins class="adsbygoogle"
                   style="display:block"
                   data-ad-client="ca-pub-8170675797595742"
                   data-ad-slot="4889040857"
                   data-ad-format="auto"></ins>
              <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
          </div>
          </div>-->
        </div>
      </div>
    </section>

    <?php
      do_action('get_footer');
      //get_template_part('templates/footer');?>
      <footer class="content-info">
        <div class="container">
          <div class="row">
            <section class="widget text-2 widget_text col-sm-4 col-md-4"><h3>About</h3>
              <div class="textwidget"><img style="float: left; padding-right: 5px; padding-bottom: 5px" width="100" height="94" src="/app/uploads/2014/05/DSC_0076-1-300x281.jpg" class="attachment-medium size-medium" alt="DSC_0076 (1)">Having been missionaries in Bolivia for 15 years and planted two tremendously successful churches there, Jason Skipper and his family now live in Rome, GA where they are working with another world changing church, "<a href="http://www.journeyrome.com" target="blank">Journey</a>". Jason is a successful entrepreneur, organization builder and church planter, and has gained extensive knowledge and experience over the years in all things tech. Jason is an Apple Certified Technician and Trainer, and is an extremely talented web designer/developer and Sound Engineer.</div>
      		  </section>
            <section class="widget text-5 widget_text col-sm-4 col-md-4"><h3>Links</h3>
              <div class="textwidget"><p>Below are some websites that are useful or meaningful to me in some way.</p>
                <ul>
                  <li><a target="_blank" data-toggle="tooltip" title="" href="http://www.journeyrome.com" data-original-title=" The website of the Church that we pastor at in Rome, GA">Journey Church of Rome, GA</a></li>
                  <li><a target="_blank" data-toggle="tooltip" title="" href="http://es.journeyrome.com" data-original-title=" El sitio web de nuestra Iglesia en Español en Rome, GA">Journey en Español - Rome, GA</a></li>
                  <li><a target="_blank" data-toggle="tooltip" title="" href="https://www.hohnet.com" data-original-title="Our Mission's Organization">The Hand of Hur</a></li>
                  <li><a target="_blank" data-toggle="tooltip" title="" href="http://www.skipperstrings.com" data-original-title="My Dad, Roger Skipper's Business website.">Skipper Custom Instruments</a></li>
                  <li><a target="_blank" data-toggle="tooltip" title="" href="https://www.facebook.com/norahskipper" data-original-title="My Wife Norah's Facebook Page">Norah's Facebook Page</a></li>
                  <li><a target="_blank" data-toggle="tooltip" title="" href="https://www.youtube.com/user/eebeeproductions/videos" data-original-title="Erynn's (my daughter) Youtube Channel">Erynn &amp; Bella's YouTube Channel</a></li>
                  <li><a target="_blank" data-toggle="tooltip" title="" href="https://www.youtube.com/channel/UCubhwe8_rhKrDu_PjSHBXAQ" data-original-title="Jordan's (my son) Youtube Channel">Jordan's YouTube Channel</a></li>
                </ul>
                <div class="clearfix">
                  <ul id="menu-social-items" class="nav navbar-nav menu-item"><li class="menu-item menu-twitter"><a target="_blank" href="http://www.twitter.com/jasonaskipper"><span class="sr-only">Twitter</span></a></li>
                    <li class="menu-item menu-facebook"><a target="_blank" href="http://facebook.com/jasonaskipper"><span class="sr-only">Facebook</span></a></li>
                    <li class="menu-item menu-instagram"><a target="_blank" href="http://www.instagram.com/jasonaskipper"><span class="sr-only">Instagram</span></a></li>
                    <li class="menu-item menu-google-plus"><a target="_blank" href="https://plus.google.com/+JasonSkipperImpact/"><span class="sr-only">Google Plus</span></a></li>
                    <li class="menu-item menu-youtube"><a target="_blank" href="https://www.youtube.com/user/jasonaskipper"><span class="sr-only">YouTube</span></a></li>
                    <li class="menu-item menu-linkedin"><a target="_blank" href="http://www.linkedin.com/in/jasonaskipper/"><span class="sr-only">LinkedIn</span></a></li>
                  </ul>
                </div>
              </div>
      		  </section>
            <section class="widget text-3 widget_text col-sm-4 col-md-4"><h3>Contact Us!</h3>
              <div class="textwidget"><img src="/app/uploads/2016/02/SkipperInnovationsWebDesign.png" alt="" width="100%">
                <p>3 Foliage Way NE<br>
                Rome, GA  30165</p>
                <p><a href="mailto: jason@skipperinnovations.com" class="encrypted-email">jason@skipperinnovations.com</a>
                  <br>
                  615-900-0757
                </p>
              </div>
      		  </section>
          </div>
          <div id="copyright" class="row">
            <p class="col-md-6 col-sm-6">Copyright © 2016 - <a href="https://skipperinnovations.com">Skipper Innovations</a> <i><a href="/privacy-policy"> (Privacy Policy)</a></i></p>
            <p class="col-md-6 col-sm-6 copy-right"><span class="glyphicon glyphicon-leaf brand-primary" aria-hidden="true"></span> Skipper Theme - Designed by <a href="https://www.facebook.com/jasonaskipper" target="_blank">Jason Skipper</a></p>
          </div>
        </div>
      </footer>
      <?php
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
