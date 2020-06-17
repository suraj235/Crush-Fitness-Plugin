<?php

class CrushCustomerOrder {

	private $product_ids = array();

	public function __construct() {

	    $query = new WC_Order_Query( array(
			'limit' => -1,
			'orderby' => 'date',
			'order' => 'DESC',
			'return' => 'ids',
			'customer_id' => get_current_user_id(),
		) );

		$orders = $query->get_orders();

		foreach($orders as $order_id ) {
			// Get an instance of the WC_Order object
			$order = wc_get_order($order_id);

			// Iterating through each WC_Order_Item_Product objects
			foreach ($order->get_items() as $item_key => $item ):

				$product_id   = $item->get_product_id(); // the Product id
				$item_name    = $item->get_name(); // Name of the product

				$product = wc_get_product( $product_id );
				$categories = wp_get_post_terms($product_id, 'product_cat');
				$categories = wp_list_pluck($categories, 'name', 'slug');

				$product_array = array();
				$product_array['product_name'] = $item_name;
				$product_array['product_id'] = $product_id;
				$product_array['product_category'] = $categories;
				array_push($this->product_ids, $product_array);
			endforeach;

		}

	}

	public function get_customer_products() {
		return $this->product_ids;
	}

	public function get_product_id_of_category($category, $array) {
		foreach ($array as $key => $val) {
			if ($key == 'product_category'){
				foreach ($array as $inner_key => $inner_val){
					if ($inner_val['category'] === $category) {
						return $key;
					}
				}
			}

		}
		return null;
	}
}