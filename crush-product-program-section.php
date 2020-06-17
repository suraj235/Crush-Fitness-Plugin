<?php
/*
Plugin Name: Crush Product, Program Section
Plugin URI: http://agency.krenovate.com
description: Manage Product Views, Class Views and Program Section
Version: 1.0
Author: Krenovate
Author URI: http://agency.krenovate.com
License: GPL2
*/


// Adding this line for security
if(!defined('ABSPATH')){
	exit;
}

require_once(plugin_dir_path(__FILE__).'includes/crush-product-program-section-scripts.php');

require_once(plugin_dir_path(__FILE__).'shortcodes/crush-personal-products-data.php');

require_once(plugin_dir_path(__FILE__).'includes/personal-fitness-plan-class.php');



$class = new PersonalFitnessClass();



