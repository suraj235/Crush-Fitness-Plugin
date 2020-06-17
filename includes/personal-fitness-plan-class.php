<?php

class PersonalFitnessClass {

	public function __construct(){

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

				var_dump($product_id, $item_name);
			endforeach;
		}
	}
}