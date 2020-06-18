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
		$categories = wp_get_post_terms($product_id, 'product_cat');
		$categories = wp_list_pluck($categories, 'name', 'slug');
		unset($categories['personal-fitness']);
		$program_ids = $this->get_program_section_with_category($categories);

		$program_data = [];
		foreach ($program_ids as $key => $program_id){
			$lesson_ids = $this->get_lesson_data($program_id['id']);
			$video_ids = $this->get_video_data($program_id['id']);
			$program_id['lessons'] = $lesson_ids;
			$program_id['videos'] = $video_ids;
			array_push($program_data, $program_id);
		}

		return $program_data;
	}


	private function get_program_section_with_category(array $category) {

		$posts = [];

		// WP_Query arguments
		$args = array(
			'post_type'              => array( 'program-section' ),
			'nopaging'               => true,
			'category_name'          => $category,
			'post_per_page'          => -1,
			'meta_key'   => 'wpcf-position-number-for-ordering',
			'orderby'    => 'meta_value',
			'order'      => 'ASC',

		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$post_data['id'] = get_the_ID();
				$post_data['title'] = get_the_title();
				$post_data['order'] = get_post_meta(get_the_ID(),'wpcf-position-number-for-ordering')[0];
				array_push($posts, $post_data);
			}
		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
		return $posts;
	}


	private function get_lesson_data($program_id){
		$relationship_slug = 'program-section-lecture' ;
		$lesson_ids = toolset_get_related_posts(
			$program_id, //get posts related to this one
			$relationship_slug, //relationship between the posts
			['query_by_role' => 'parent']  //get relationship by role
		);
		return $lesson_ids;
	}

	private function get_video_data($program_id){
		$relationship_slug = 'program-section-video' ;
		$video_ids = toolset_get_related_posts(
			$program_id, //get posts related to this one
			$relationship_slug, //relationship between the posts
			['query_by_role' => 'parent']  //get relationship by role
		);
		return $video_ids;
	}


}