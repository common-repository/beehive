<?php
/**
 * Created by PhpStorm.
 * User: Ermin Islamagic 
 * Web: http://islamagic.com/
 * Date: 23.5.2015
 * Time: 23:51
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit( _( '' ) );
}

function beehive_activation() {

    $wp_version_required = '3.8'; // basic version supported from 3.8

    $wp_valid = version_compare( get_bloginfo( "version" ), $wp_version_required, '>=' );

    if ( ! $wp_valid ) {

        deactivate_plugins( plugin_basename( __FILE__ ) );

        wp_die( sprintf( __('Sorry, this version of the Beehive pro plugin requires WordPress %s or greater. <br /><a href="%s">Go back to the Dashboard > Plugins screen</a>.' ), $wp_version_required, network_admin_url() . '/plugins.php' ) );
    }
}

register_activation_hook( __FILE__, 'beehive_activation' );

class beehive_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(

        // Base ID of your widget
            'beehive_widget',

            // Widget name will appear in UI
            __('Beehive cells', 'beehive_widget_domain'),

            // Widget description
            array('description' => __('Make hexagons out of your posts or pages widget', 'beehive_widget_domain'),)
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
        //echo __('Beehive cells', 'beehive_widget_domain');

        include_once('partials/website/render_beehive.php');

        render_widget($instance);

        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $config['title'] = $instance['title'];
        } else {
            $config['title'] = __('Beehive title', 'beehive_widget_domain');
        }

        $config['render_pages'] = $instance['render_pages'];
        $config['animate_hover'] = $instance['animate_hover'];
        $config['items_to_display'] = (is_numeric($instance['items_to_display'])) ? (int)$instance['items_to_display'] : 20;

        require_once('partials/admin/beehive_widget_settings.php');
        widget_settings_gui($this, $config);
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['render_pages'] = $new_instance['render_pages'];
        $instance['animate_hover'] = $new_instance['animate_hover'];
        $instance['items_to_display'] = (is_numeric($new_instance['items_to_display'])) ? (int)$new_instance['items_to_display'] : 20;

        return $instance;
    }
}

// Register and load the widget
function load_beehive_widget()
{
    register_widget('beehive_widget');
}

add_action('widgets_init', 'load_beehive_widget');