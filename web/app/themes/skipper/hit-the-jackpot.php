<?php
/**
 * Template Name: Hit The Jackpot
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page-noshare'); ?>
<?php endwhile; ?>

      <div id="pb-container">
        <img class="size-full wp-image-429 aligncenter" src="https://skipperinnovations.com/app/uploads/2016/01/POWERBALL_PP-1.png" alt="POWERBALL_PP" width="80%" height="395" style="width: 100%; max-width: 400px;">
        <div id="num-to-match">
          <b>Numbers to Match</b>
          <div class="numsm-container">
            <div class="numsm"><input type="text" value="4" data-toggle="tooltip" title="You can change this number by simply clicking on it and typing in a new one."></input></div>
            <div class="numsm"><input type="text" value="8" data-toggle="tooltip" title="You can change this number by simply clicking on it and typing in a new one."></input></div>
            <div class="numsm"><input type="text" value="19" data-toggle="tooltip" title="You can change this number by simply clicking on it and typing in a new one."></input></div>
            <div class="numsm"><input type="text" value="27" data-toggle="tooltip" title="You can change this number by simply clicking on it and typing in a new one."></input></div>
            <div class="numsm"><input type="text" value="34" data-toggle="tooltip" title="You can change this number by simply clicking on it and typing in a new one."></input></div>
            <div class="numsm pbsm"><input type="text" value="10" data-toggle="tooltip" title="You can change this number by simply clicking on it and typing in a new one."></input></div>
          </div>
        </div>
        <div class="pb-buttons">
          <button id="btnGet" type="button" class="btn btn-danger">Get Started!</button>
          <button id="btnClear" type="button" class="btn btn-info">Start Over</button>
        </div>
        <div id="demo">
          <h3>Your Numbers</h3>
          <div id="numgroup">
            <div id="num1" class="num flash">
              <span>#</span>
            </div>
            <div id="num2" class="num flash">
              <span>#</span>
            </div>
            <div id="num3" class="num flash">
              <span>#</span>
            </div>
            <div id="num4" class="num flash">
              <span>#</span>
            </div>
            <div id="num5" class="num flash">
              <span>#</span>
            </div>
            <div id="num6" class="num flash pb">
              <span>#</span>
            </div>
          </div>

          <div class="clearfix"></div>
        </div>
        <div id="matches">
          <h3>
            Current Results
          </h3>
          <b class="title">White Ball: </b><span class="wbmatch flash"></span><br/>
          <b class="title">Powerball: </b><span class="pbmatch flash"></span><br/>
          <b class="title">Winnings: </b><span class="thiswon number"></span><br/>
        </div>
        <div id="Totals">
          <h3>
            Totals
          </h3>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="clearfix">
                <div class="title">Total Tries: </div><span id="tries">0</span>
              </div>
              <div class="clearfix">
                <div class="title">Total Spent: </div><span id="tspent" class="number">$0.00</span>
              </div>
              <div class="clearfix">
                <div class="title">Total Won: </div><span id="twon" class="number">$0.00</span>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <button id="share-results" type="button" class="btn btn-success btn-sm">Share Your Results!</button>
            </div>
          </div>
        </div>
        <div id="myResults">
          <h3>
          </h3>
          <div id="results" class="clearfix"></div>
        </div>
      </div>

<?php get_template_part('templates/socialshare'); ?>
<?php comments_template('/templates/comments.php'); ?>
