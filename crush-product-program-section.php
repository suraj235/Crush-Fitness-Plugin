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

add_action('plugins_loaded', 'my_plugin_init');


function my_plugin_init() {

	if ( class_exists('WC_Order_Query') ) {
		// Put your plugin code here
		require_once(plugin_dir_path(__FILE__).'includes/crush-product-program-section-scripts.php');

		require_once(plugin_dir_path(__FILE__).'shortcodes/crush-personal-products-data.php');

		add_action( 'woocommerce_after_register_post_type', 'crush_get_order_data' );


	} else {
		add_action('admin_notices', 'wc_not_loaded');
	}
}

function wc_not_loaded() {
	printf(
		'<div class="error"><p>%s</p></div>',
		__('Sorry cannot create coupon because WooCommerce is not loaded')
	);
}


function crush_get_order_data(){
	require_once(plugin_dir_path(__FILE__).'includes/CrushCustomerOrder.php');
	require_once(plugin_dir_path(__FILE__).'includes/CrushPersonalClass.php');
	$product = new CrushPersonalClass();
}


