<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$product = new CrushPersonalClass();
$check = $product->customer_allowed_for($product_id);

if($check){
	$product->render_fitness_program($product_id);
}

get_footer();
