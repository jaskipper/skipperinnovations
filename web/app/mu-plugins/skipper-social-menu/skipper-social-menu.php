<?php

namespace JAS\Skipper\Customizer;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {

} //Customize Register
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('skipper/skippercustomizer', Assets\asset_path('scripts/skippercustomizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');

?>

<ul id="menu-social-items" class="nav navbar-nav">
  <li class="menu-item menu-twitter">
    <a href="http://www.twitter.com/jasonaskipper" target="_blank"><span class="sr-only">Twitter</span></a>
  </li>
  <li class="menu-item menu-facebook">
    <a href="http://facebook.com/jasonaskipper" target="_blank"><span class="sr-only">Facebook</span></a>
  </li>
  <li class="menu-item menu-googleplus">
    <a href="https://plus.google.com/+JasonSkipperImpact/" target="_blank"><span class="sr-only">Google+</span></a>
  </li>
  <li class="menu-item menu-youtube">
    <a href="https://www.youtube.com/user/jasonaskipper" target="_blank"><span class="sr-only">YouTube</span></a>
  </li>
  <li class="menu-item menu-linkedin">
    <a href="http://www.linkedin.com/in/jasonaskipper/" target="_blank"><span class="sr-only">LinkedIn</span></a>
  </li>
</ul>
