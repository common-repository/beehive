<?php
/*
Plugin Name: Beehive
Plugin URI: http://www.zendtheme.com/wp-beehive
Description: Serve your readers an easy access to your posts or pages through WordPress widgets.
Author: Ermin Islamagic
Version: 1.0.1
Author URI: http://www.zendtheme.com/
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit( _( '' ) );
}

// add jQuery
function beehive_scripts() {
    wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'beehive_scripts' );

// require basic file
require_once(dirname(__FILE__) . '/basic.php');