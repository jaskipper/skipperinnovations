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

        $(document).ready(function () {

          function footerlogoheight() {
            logowidth = $('.footerlogo').width();
            $('.footerlogo').height(logowidth*0.2);
          }

          $(window).scroll(function(){
              showbranding();
          });

          $(window).resize(function () {
              showbranding();
              footerlogoheight();
          });

          footerlogoheight();

          //Social Feed
          var updateFeed = function() {
              //var initialQuery = $('#query').val();
              //initialQuery = initialQuery.replace(" ", "");
              //var queryTags = initialQuery.split(",");
              $('.social-feed-container').socialfeed({
                  // FACEBOOK
                  /*facebook:{
                      accounts: ['@skipperinnovations','!skipperinnovations'],  //Array: Specify a list of accounts from which to pull wall posts
                      limit: 5,                                   //Integer: max number of posts to load
                      access_token: '1709949575893557|00462da5d6e4c37442794ecea8d30843'  //String: "APP_ID|APP_SECRET"
                  },*/
                  // GOOGLEPLUS
                  /*google: {
                      accounts: queryTags,
                      limit: 2,
                      access_token: 'AIzaSyDAelFmJhg6BSUbSLe8UT7s-G53tL4_KRg'
                  },*/
                  // TWITTER
                  twitter:{
                      accounts: ['@jasonaskipper'],                      //Array: Specify a list of accounts from which to pull tweets
                      limit: 10,                                   //Integer: max number of tweets to load
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
                      limit: 5,
                      client_id: '',
                      access_token: '36291383.1677ed0.bcf5591964a34a7a80072831c68b695e'
                  },

                  // GENERAL SETTINGS
                  template: '/app/themes/skipper/templates/socialfeed-template.html', // a path to the template file
                  length: 200,
                  show_media: true,
                  update_period: 60000,
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

          $('[data-toggle="tooltip"]').tooltip();

        }); //Document Load

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

          if (Modernizr.cssvhunit) {
            // supported
          } else {
            $(window).bind('resizeEnd', function () {
              var height = window.innerHeight ? window.innerHeight : $(window).height();
              windowheight = height - $(".logged-in #wpadminbar").height();
              $("#landing").height(windowheight);
            });
          }

          function socialfeedheight() {
              var fpblogheight = $('#fp-blog').height() + $('.fpreadblog').height();
              var fpadheight = $('#fpads').height();
              $('.social-feed-container').height(fpblogheight - fpadheight);
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
    'hit_the_jackpot': {
      init: function() {
        // JavaScript to be fired on the hit the jackpot page
        //put results in variables, making these global
        $(document).ready(function(){

          viewport = document.querySelector("meta[name=viewport]");
          viewport.setAttribute('content', 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0');

          var holdResults = "";
          var holdPb = "";
          //setup the variable for the duplicate test
          var duptest = "";
          //PBActualResults
          var actualResults = [8, 27, 34, 4, 19];
          //var actualResults = [1, 2, 3, 4, 5];
          var actualPbResults = 10;
          var pbMatches = false;
          var wbMatches = "";
          var numMatches = 0;
          var pbMatch = false;
          var totalTries = 0;
          var thisWon = 0;
          var totalWon = 0;
          var totalSpent = 0;

          // Clean up Everything and Start over on "Clear"
          $("#btnClear").click(function() {
            $("#btnGet").html("Get Started!");
            $("#btnClear").css("display", "none");
            $(".num span").html("&nbsp;");
            $("#myResults h3").html("");
            $("#results").html("");
            $(".thiswon").html("");
            $("#tries").html(0);
            $("#tspent").html("$0.00");
            $("#twon").html("$0.00");
            holdResults = "";
            holdPb = "";
            totalWon = 0;
            totalTries = 0;
          });

          //Get a random whole number
          function getRandomNumber(max) {
            max = Math.floor((Math.random() * max) + 1);
            return max;
          }

          //function to sort and compare the #'s for duplicates
          function sortandcompare(thisnum) {
            //sort the array
            thisnum.sort( function(a, b){return a-b;} );
            //compare the array to see if there are any duplicates
            //this loops through each number and compares it with the next one. If there is a duplicate, it changes that number and then breaks out. Then this function is repeated/called again until all duplicates are gone.
            for (i = 0; i < thisnum.length - 1; i++) {
              if (thisnum[i + 1] === thisnum[i]) {
                //console.log("Uh oh, There's a Duplicate! [" + thisnum + "] Fixing...");
                thisnum[i] = getRandomNumber(69);
                duptest = "duplicate";
                //return duptest;
                //break and exit if there is
                return false;
              }
            }
            //if all went well, there are no duplicates
            duptest = "no";
            //console.log("Your # is: " + thisnum);
            //return duptest;
          }

          function addAnimatedClass(element) {
            $(element).removeClass('animated').hide().show(0).addClass('animated');
          }

          //Show the Previous Results below the actual numbers
          function getPrevRes() {
            //declare the res var and set it to ""
            res = "";
            //loop through it and put each num in a <span>#</span>
            for (i = 0; i < holdResults.length; i++) {
              res = res + "<span>" + holdResults[i] + "</span>";
            }
            //add the Powerball number in at the end
            res = res + ("<span class=\"numsm pbsm\">" + holdPb + "</span>");
            //return the final string
            return res;
          }

          function testActualResults(thisnum, pb) {

            actualResults = [];
            //get the results from top inputs
            for (i = 0; i < 5; i++) {
              thistext = $(".numsm:nth-of-type(" + (i + 1) + ") input").val();
              thistext = parseInt(thistext);
              actualResults.push(thistext);
            }

            var matches = [];
            for (i = 0; i < thisnum.length; i++) {
              if ( ($.inArray(thisnum[i], actualResults)) >= 0 ) {
                matches.push(thisnum[i]);
                addAnimatedClass( "#num" + (i + 1) );
              }
            }
            if (matches.length > 0) {
              addAnimatedClass(".wbmatch");
            } else {
            }
            actualPbResults = parseInt( $(".pbsm input").val() );
            if (pb === actualPbResults) {
              pbMatches = "Powerball";
              pbMatch = true;
              $('.pbmatch').html("Matches!");
              addAnimatedClass("#num6, .pbmatch");
            } else {
              pbMatches = "";
              pbMatch = false;
              $('.pbmatch').html("Doesn't Match");
            }
            if (matches.length > 0) {
              var matchNum = matches.length;
              var matchName = "";
              if (matches.length === 1) {
                matchName = "Match";
              } else {
                matchName = "Matches!";
              }
              wbMatches = "Matches: (" + matches + ")  ";
              $(".wbmatch").text(matches.length + " " + matchName + " (" + matches + ")" );
            } else {
              wbMatches = "";
              $(".wbmatch").html("0 Matches");
            }
            numMatches = matches.length;
          }

          function getWinnings(numMatches,pbMatch) {
            thisWon = 0;
            if (pbMatch === true) {
                if (numMatches <= 1){
                  thisWon = 4;
                } else if (numMatches === 2) {
                  thisWon = 7;
                } else if (numMatches === 3) {
                  thisWon = 100;
                } else if (numMatches === 4) {
                  thisWon = 50000;
                } else if (numMatches === 5) {
                  thisWon = 1500000000;
                }
            } else {
              if (numMatches < 3) {
                thisWon = 0;
              } else if (numMatches === 3) {
                thisWon = 7;
              } else if (numMatches === 4) {
                thisWon = 100;
              } else if (numMatches === 5) {
                thisWon = 1000000;
              }
            }
            $(".thiswon").html(thisWon);
          }

          //The Function that runs in pushing the get numbers button
          $("#btnGet").click(function()/*{function getNumbers() */{

              function repeat() {

                totalTries = totalTries + 1;
                $("#tries").html(totalTries);
                totalSpent = totalTries * 2;
                $("#tspent").html(totalSpent);

                //change the text to "Get More" and show the "Clear" button
                $("#btnGet").html("Get More");
                $("#btnClear").css("display", "inline-block");

                //setup the variable array for our 5 numbers
                var thisnum = [];

                //get the 5 numbers
                for (i = 0; i < 5; i++) {
                  thisnum.push( getRandomNumber(69) );
                }

                //Send the array off to sort and to check on duplicates. If there are duplicicates send it off again until it returns with no duplicates.
                do {
                  sortandcompare(thisnum);
                } while ( duptest === "duplicate" );

                //print out the first 5 numbers
                for (i = 0; i < 5; i++) {
                  $("#num" + (i + 1) + " span").html( thisnum[i] );
                }

                //get the random powerball whole number
                var pb = getRandomNumber(26);
                //print out the powerball number
                $(".pb span").html(pb);

                //Check to see if we already had some results and if so post them
                if (holdResults !== "") {
                  $("#myResults h3").html("Previous Results:");
                  //I want the last numbers to show up on the top of the list, pushing everything else down. That's why we are adding "prepend".
                  $("#results").prepend(getPrevRes() + holdWbMatches + holdPbMatches + "<br>");
                }

                testActualResults(thisnum, pb);

                getWinnings(numMatches,pbMatch);
                totalWon = totalWon + thisWon;
                $("#twon").html(totalWon);

                //hold the 5 number array and the powerball number
                holdResults = thisnum;
                holdPb = pb;
                holdWbMatches = wbMatches;
                holdPbMatches = pbMatches;
                $(".number").number(true, 2);
                $(".number").prepend("$");

              }
              //var RepeatNumber = 500;
              //$('body').css('cursor', 'progress');
              //for ( i = 0; i < RepeatNumber; i++) {
                //setTimeout(repeat, 500);
                //(function() {
                  setTimeout(repeat, 010);
                 //})(i);
                    //if (i === (RepeatNumber - 1) ) {
                      //$('body').css('cursor', 'auto');
                    //}
              //}

          });


          $("#share-results").click(function() {
            // calling the API ...
            totalWinnings = totalWon - totalSpent;
            if (totalWinnings < 0) {
              wonlost = "Lost";
              totalWinnings = totalWinnings * -1;
            } else {
              wonlost = "Won";
            }
            numTotalWinnings = $.number(totalWinnings,2,'.',',');
            numTotalWinnings = "$" + numTotalWinnings;

            FB.ui({
              method: 'share',
              href: 'https://www.skipperinnovations.com/hit-the-jackpot',
              caption: "I WOULD have " + wonlost + " " + numTotalWinnings + " playing the Powerball Lottery " + totalTries + " times!",
            }, function(response){});
           });

        }); //Document Ready
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
