<?php

add_shortcode('crush_personal_products' , 'function_get_all_personal_products');

function function_get_all_personal_products() {

	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => -1,
		'product_cat'    => 'personal-fitness'
	);

	$loop = new WP_Query( $args );

	$content = "";

	while ( $loop->have_posts() ) : $loop->the_post();

		$product_id =  get_the_ID();
		$product = wc_get_product( $product_id );
		// $categories = wp_get_post_terms($product_id, 'product_cat');
		// $categories = wp_list_pluck($categories, 'name', 'slug');
		$title = $product->get_name();
		$content .= $title;
	endwhile;
	wp_reset_postdata();
	return $content;
}