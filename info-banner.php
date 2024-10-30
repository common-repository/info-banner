<?php

/*
Plugin Name: Info-Banner
Description: Display your Info-Banner on the site
Version: 1.0.3
Author: Philipp Dalheimer
Author URI: https://profiles.wordpress.org/philippdalheimer
*/

//Exit if accessed directly
if(!defined('ABSPATH')){
	exit;
}

//Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/info-banner-scripts.php');

//Load Class
require_once(plugin_dir_path(__FILE__).'/includes/info-banner-class.php');

//Register Widget
function register_infobanner(){
	register_widget('InfoBanner_Widget');
}

//Hook in function
add_action('widgets_init', 'register_infobanner');