<?php

function function_to_show_personal_product() {

	$product = new CrushPersonalClass();

	$product_ids = $product->get_id_of_personal_product();

	foreach ($product_ids as $product_id) {

		$product = wc_get_product( $product_id );
		$product_name = $product->get_name();
		$url = get_site_url() . "/fitness-program/" .$product_id ;
		$content = $product_name;
		$content .= $url;
		return $content;
	}

}


add_shortcode('crush_personal_products_purchased', 'function_to_show_personal_product');