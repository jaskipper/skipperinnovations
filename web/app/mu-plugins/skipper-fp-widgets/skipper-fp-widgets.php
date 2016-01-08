<?php
/*
Plugin Name: Skipper FP Widgets
Plugin URI: https://skipperinnovations.com
Description: A plugin containing various widgets
Version: 0.1
Author: SkipperInnovations
Author URI: https://skipperinnovations.com
Text Domain: skipper
License: GPLv2

Copyright 2016  SkipperInnovations

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Adds Skipper_FP_Widget widget.
 */

namespace Roots\Sage\Extras;

class Skipper_FP_Widget extends \WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'skipper_fp_widget', // Base ID
			__( 'Skipper FP Widget', 'skipper' ), // Name
			array( 'description' => __( 'Skipper Front Page Widgets', 'skipper' ), ) // Args
		);
	}

  /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        extract( $args );

        if (! empty( $instance['title'] ) ) { $title = apply_filters( 'widget_title', $instance['title'] ); }
        if (! empty( $instance['glyphicon'] ) ) { $glyphicon = $instance['glyphicon']; }
        if (! empty( $instance['message'] ) ) { $message = $instance['message']; }
        if (! empty( $instance['buttontext'] ) ) { $buttontext = $instance['buttontext']; }
        if (! empty( $instance['buttonlink'] ) ) { $buttonlink = $instance['buttonlink']; }
        if (! empty( $instance['linktargetmode'] ) ) { $linktargetmode = $instance['linktargetmode']; }
        if (! empty( $instance['linktarget'] ) ) { $linktarget = $instance['linktarget']; }
        if (! empty( $instance['widgetcolor'] ) ) { $widgetcolor = $instance['widgetcolor']; }

        echo $before_widget; ?>

        <aside id="fptext_widget-<?php if ( ! empty( $instance['widgetcolor'] ) ) { echo $widgetcolor; } ?>" class="col-md-3 col-sm-3 skipper-text-widget">
          <a href="<?php if ( ! empty( $instance['buttonlink'] ) ) { echo $buttonlink; } ?>"
            class="aglyph
            <?php if ( ! empty( $instance['linktargetmode'] ) )
              if ($linktargetmode == 'linktargetmode') echo 'sk-smoothscroll'  ?>"
            data-target="<?php if ( ! empty( $instance['linktarget'] ) ) { echo $linktarget; } ?>"><span class="glyphicon <?php if ( ! empty( $instance['glyphicon'] ) ) { echo $glyphicon; } ?>" aria-hidden="true"></span></a>
          <h3 class="home-widget-title"><a href="/skipper"><?php if ( ! empty( $instance['title'] ) ) { echo $title; } ?></a></h3>
          <div class="textwidget">
            <?php if ( ! empty( $instance['message'] ) ) { echo $message; } ?>
          </div>
          <a href="<?php if ( ! empty( $instance['buttonlink'] ) ) { echo $buttonlink; } ?>"
            class="btn
            btn-<?php if ( ! empty( $instance['widgetcolor'] ) ) { echo $widgetcolor; } ?>
            btn-lg
            <?php if ( ! empty( $instance['linktargetmode'] ) )
              if ($linktargetmode == 'linktargetmode') echo 'sk-smoothscroll'  ?>"
            data-target="<?php if ( ! empty( $instance['linktarget'] ) ) { echo $linktarget; } ?>">
            <?php if ( ! empty( $instance['buttontext'] ) ) { echo $buttontext; } ?>
          </a>
        </aside>

        <?php

        echo $after_widget;

    }


    /**
      * Sanitize widget form values as they are saved.
      *
      * @see WP_Widget::update()
      *
      * @param array $new_instance Values just sent to be saved.
      * @param array $old_instance Previously saved values from database.
      *
      * @return array Updated safe values to be saved.
      */
    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['glyphicon'] = ( ! empty( $new_instance['glyphicon'] ) ) ? strip_tags( $new_instance['glyphicon'] ) : '';
        $instance['message'] = ( ! empty( $new_instance['message'] ) ) ? strip_tags( $new_instance['message'] ) : '';
        $instance['buttontext'] = ( ! empty( $new_instance['buttontext'] ) ) ? strip_tags( $new_instance['buttontext'] ) : '';
        $instance['buttonlink'] = ( ! empty( $new_instance['buttonlink'] ) ) ? strip_tags( $new_instance['buttonlink'] ) : '';
        $instance['linktargetmode'] = ( ! empty( $new_instance['linktargetmode'] ) ) ? strip_tags( $new_instance['linktargetmode'] ) : '';
        $instance['linktarget'] = ( ! empty( $new_instance['linktarget'] ) ) ? strip_tags( $new_instance['linktarget'] ) : '';
        $instance['widgetcolor'] = ( ! empty( $new_instance['widgetcolor'] ) ) ? strip_tags( $new_instance['widgetcolor'] ) : '';

        return $instance;

    }

    /**
      * Back-end widget form.
      *
      * @see WP_Widget::form()
      *
      * @param array $instance Previously saved values from database.
      */
    public function form( $instance ) {

        $title      = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'skipper' );
        $glyphicon  = ! empty( $instance['glyphicon'] ) ? $instance['glyphicon'] : __( '', 'skipper' );
        $message    = ! empty( $instance['message'] ) ? $instance['message'] : __( '', 'skipper' );
        $buttontext = ! empty( $instance['buttontext'] ) ? $instance['buttontext'] : __( '', 'skipper' );
        $buttonlink = ! empty( $instance['buttonlink'] ) ? $instance['buttonlink'] : __( '', 'skipper' );
        $linktargetmode = ! empty( $instance['linktargetmode'] ) ? $instance['linktargetmode'] : __( '', 'skipper' );
        $linktarget = ! empty( $instance['linktarget'] ) ? $instance['linktarget'] : __( '', 'skipper' );
        $widgetcolor = ! empty( $instance['widgetcolor'] ) ? $instance['widgetcolor'] : __( '', 'skipper' );

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('glyphicon'); ?>"><?php _e('Glyphicon:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('glyphicon'); ?>" name="<?php echo $this->get_field_name('glyphicon'); ?>" type="text" value="<?php echo $glyphicon; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Simple Message'); ?></label>
            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>"><?php echo $message; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('buttontext'); ?>"><?php _e('Button Text:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('buttontext'); ?>" name="<?php echo $this->get_field_name('buttontext'); ?>" type="text" value="<?php echo $buttontext; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('buttonlink'); ?>"><?php _e('Button Link:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('buttonlink'); ?>" name="<?php echo $this->get_field_name('buttonlink'); ?>" type="text" value="<?php echo $buttonlink; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linktargetmode'); ?>"><?php _e('Smooth Scroll to Target?:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linktargetmode'); ?>" name="<?php echo $this->get_field_name('linktargetmode'); ?>" type="checkbox" value="linktargetmode" <?php if ($linktargetmode == "linktargetmode") echo "checked"; ?>/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('linktarget'); ?>"><?php _e('Link Target:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linktarget'); ?>" name="<?php echo $this->get_field_name('linktarget'); ?>" type="text" value="<?php echo $linktarget; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('widgetcolor'); ?>"><?php _e('Widget Color:'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('widgetcolor'); ?>" name="<?php echo $this->get_field_name('widgetcolor'); ?>">
              <option value="info" <?php if ($widgetcolor == "info") echo "selected" ?>>Info</option>
              <option value="danger" <?php if ($widgetcolor == "danger") echo "selected" ?>>Danger</option>
              <option value="warning" <?php if ($widgetcolor == "warning") echo "selected" ?>>Warning</option>
              <option value="success" <?php if ($widgetcolor == "success") echo "selected" ?>>Success</option>
            </select>
        </p>

    <?php
    }

}

// register Skipper_FP_Widget widget
add_action( 'widgets_init', function(){
     register_widget( 'Roots\Sage\Extras\Skipper_FP_Widget' );
});
