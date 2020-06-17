<?php

add_filter( 'generate_rewrite_rules', function ( $wp_rewrite ){
	$wp_rewrite->rules = array_merge(
		['fitness-program/(\d+)/?$' => 'index.php?dl_id=$matches[1]'],
		$wp_rewrite->rules
	);
} );


add_filter( 'query_vars', function( $query_vars ){
	$query_vars[] = 'dl_id';
	return $query_vars;
} );


add_action( 'template_redirect', function(){
	$product_id = intval( get_query_var( 'dl_id' ) );
	if ( $product_id ) {
		include plugin_dir_path( __FILE__ ) . 'template/fitness_program.php';
		die;
	}
} );
