<?php

class CrushPersonalClass extends CrushCustomerOrder {

	private $orders;
	private $products;

	public function __construct() {
	$this->orders	= new CrushCustomerOrder();
	$this->products = $this->orders->get_customer_products();
	}

	public function get_id_of_personal_product() {
		$products = $this->products;
		$orders = $this->orders;
		return $orders->get_product_id_of_category('Personal Fitness', $products);
	}

	public function customer_allowed_for($product_id){
		$product_ids = $this->get_id_of_personal_product();
		if(in_array( $product_id, $product_ids)){
			return true;
		}
		return false;
	}

	public function render_fitness_program($product_id) {
		$product = wc_get_product( $product_id );
		$categories = wp_get_post_terms($product_id, 'product_cat');
		$categories = wp_list_pluck($categories, 'name', 'slug');
		var_dump($categories);

	}


}