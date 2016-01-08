/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        function scrollTo(selector){
            myoffset = $('#wpadminbar').height() + $('.navbar-fixed-top').height();
            console.log(myoffset);
            $('html, body').animate({
                easing: 'easeInOutCubic',
                scrollTop: $(selector).offset().top - myoffset
             }, 1600);
        }

        $('.sk-smoothscroll').click(function(){
            scrollTo( $(this).attr('data-target') );
        });

        function showbranding() {
          if($(window).width() < 768) {
            if ($(this).scrollTop() > 60) {
                $('#skipperbrand').fadeIn(500);
            } else {
                $('#skipperbrand').fadeOut(500);
            }
          } else {
            $('#skipperbrand').css('display','none');
          }
        }

        $('.navbar-toggle').click(function() {
          if($(window).scrollTop() <= 60) {
            if ( $('.navbar-collapse').attr('aria-expanded') === 'true' ) {
              $('#skipperbrand').css('display','none');
            } else {
              $('#skipperbrand').css('display','block');
            }
          }
        });

        $(window).scroll(function(){
            showbranding();
        });

        $(window).resize(function () {
            showbranding();
        });

        //Social Feed
        var updateFeed = function() {
            //var initialQuery = $('#query').val();
            //initialQuery = initialQuery.replace(" ", "");
            //var queryTags = initialQuery.split(",");
            $('.social-feed-container').socialfeed({
                // FACEBOOK
                facebook:{
                    accounts: ['@skipperinnovations','!skipperinnovations'],  //Array: Specify a list of accounts from which to pull wall posts
                    limit: 3,                                   //Integer: max number of posts to load
                    access_token: '1709949575893557|00462da5d6e4c37442794ecea8d30843'  //String: "APP_ID|APP_SECRET"
                },
                // GOOGLEPLUS
                /*google: {
                    accounts: queryTags,
                    limit: 2,
                    access_token: 'AIzaSyDAelFmJhg6BSUbSLe8UT7s-G53tL4_KRg'
                },*/
                // TWITTER
                twitter:{
                    accounts: ['@jasonaskipper'],                      //Array: Specify a list of accounts from which to pull tweets
                    limit: 3,                                   //Integer: max number of tweets to load
                    consumer_key: 'DfUEjfcnRDgQYxpwsN4Nhj47e',          //String: consumer key. make sure to have your app read-only
                    consumer_secret: 'KYPHOaLP9i73vhCpM1FR48upO0o7rm2orCeCmkjZKmHUPHeKPo' //String: consumer secret key. make sure to have your app read-only
                },
                // VKONTAKTE
                /*vk: {
                    accounts: queryTags,
                    limit: 2,
                    source: 'all'
                }, */
                // INSTAGRAM
                instagram: {
                    accounts: ['@jasonaskipper'],
                    limit: 3,
                    client_id: '',
                    access_token: '36291383.1677ed0.bcf5591964a34a7a80072831c68b695e'
                },

                // GENERAL SETTINGS
                template: '/app/themes/skipper/templates/socialfeed-template.html', // a path to the template file
                length: 200,
                show_media: true,
                update_period: 5000,
                // When all the posts are collected and displayed - this function is evoked
                callback: function() {
                    console.log('all posts are collected');
                }
            });
        };

        updateFeed();
        $('#button-update').click(function() {
            //first, get rid of old data/posts.
            $('.social-feed-container').html('');

            //then load new posts
            updateFeed();
        });

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home
    'home': {
      init: function() {
        // JavaScript to be fired on the home page

        $(document).ready(function () {

          $(window).bind('resizeEnd', function () {
            windowheight = $(window).height() - $(".logged-in #wpadminbar").height();
            $("#landing").height(windowheight);
          });

          function socialfeedheight() {
              var fpblogheight = $('#fp-blog').height() + $('.fpreadblog').height();
              $('.social-feed-container').height(fpblogheight);
          }
          socialfeedheight();

          $(window).resize(function () {
              socialfeedheight();
          });

          $(window).resize(function () {
            if (this.resizeTO) { clearTimeout(this.resizeTO); }
            this.resizeTO = setTimeout(function () {
              $(this).trigger('resizeEnd');
            }, 300);
          }).trigger("resize");

        }); //Document Ready

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
