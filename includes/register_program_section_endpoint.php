<?php

add_action('init', function() {
	add_rewrite_endpoint('program_section', EP_ROOT | EP_PAGES);
});


add_action('woocommerce_account_program_section_endpoint', function() {
	$product_id = get_query_var('program_section');

	wc_get_template('myaccount/program_section.php', [
		'product_id' => $product_id
	]);
});