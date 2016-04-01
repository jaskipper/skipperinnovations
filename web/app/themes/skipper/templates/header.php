<header class="banner">
  <nav class="navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div id="skippertoggle" class="navbar-toggle">
          <span>Menu</span>
        </div>
        <div id="skipperbrand" class="navbar-toggle">
          <a <?php if ( is_front_page() ) { echo 'href="#" class="sk-smoothscroll"'; } else { echo 'href="/"'; } ?> data-target="body"><!--<img src="<?php echo get_header_image(); ?>">--><div class="headerlogo"></div></a>
        </div>
      </div>
      <div class="collapse navbar-collapse">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);
        endif;
        ?>
        <?php
          $defaults = array(
            'theme_location'  => 'social_menu',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'nav navbar-nav',
            'menu_id'         => 'menu-social-items',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '<span class="sr-only">',
            'link_after'      => '</span>',
            'items_wrap'      => '<ul id="%1$s" class="%2$s menu-item">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
          );

          wp_nav_menu( $defaults );
        ?>
      </div>
    </div>
  </nav>
</header>
