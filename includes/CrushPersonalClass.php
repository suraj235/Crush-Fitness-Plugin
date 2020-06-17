<?php

	class CrushPersonalClass extends CrushCustomerOrder {

		public function __construct() {
		$orders = new CrushCustomerOrder();

		$products = $orders->get_customer_products();
		// var_dump($products['product_category']);
		// $products->get_product_id_of_category('Personal Fitness', $products);
			
		$key = array_search('Personal Fitness', array_column($products, 'product_category'));
		// var_dump($key);
		}
	}