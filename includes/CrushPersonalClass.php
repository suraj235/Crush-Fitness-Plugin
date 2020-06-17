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

	}