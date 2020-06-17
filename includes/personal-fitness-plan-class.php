<?php

class PersonalFitnessClass {





	public function __construct(){

		$query = new \WC_Order_Query(array(
			'limit' => - 1,
			'orderby' => 'date',
			'order' => 'DESC',
			'customer_id' => get_current_user_id() ,
			'status' => array(
				'completed',
				'processing'
			) ,
		));

		if ($query) {

			$orders = $query->get_orders();

			if (!empty($orders))
			{
				foreach ($orders as $order)
				{
					$items = $order->get_items();
					if (!empty($items))
					{
						foreach ($items as $item)
						{
							$product_id = $item->get_product_id();
							$term_list = wp_get_post_terms($product_id,'product_cat',array('fields'=>'ids'));
							var_dump($item);
						}
					}
				}
			}
		}

	}
}