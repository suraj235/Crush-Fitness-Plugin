<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$product = new CrushPersonalClass();
$check = $product->customer_allowed_for($product_id);

?>
<div class="profile-section">
    <div class="dashboard-wrapper" style="display: flex;justify-content: space-between;">
        <div class="dashboard-left" style="width: 15%">
  <?php
  $left_menu_desktop = do_shortcode("[left_menu_v2 name='Dashboard' device='Desktop']");
  $left_menu_mobile = do_shortcode("[left_menu_v2 name='Dashboard' image_src='https://crushv2.local/wp-content/uploads/2020/04/Group-1910.svg' device='Mobile']");
echo $left_menu_desktop;
echo $left_menu_mobile;
  ?>
        </div>
        <div class="dashboard-right" style="width: 85%">
            <?php

            if($check){
	            $program_data = $product->render_fitness_program($product_id);
	            foreach ($program_data as $program) {
		            ?>
                    <div style="margin-bottom: 30px; border-bottom: 1px solid black">
                        <h1> <?php echo $program['title'] ?></h1>
                        <p> Order of Program : <?php echo $program['order'] ?></p>

                        <p>Lessons</p>
			            <?php
			            foreach ($program['lessons'] as $lesson){
				            ?>
                            <p>Lesson id: <?php echo $lesson ?></p>

				            <?php
			            }

			            ?>

                        <p>Videos</p>
	                    <?php
	                    foreach ($program['videos'] as $video){
		                    ?>
                            <p>Video id: <?php echo $video ?></p>

		                    <?php
	                    }

	                    ?>




                    </div>

		            <?php

                    echo wp_logout_url();
	            }


            }

            ?>
        </div>
    </div>
</div>

<?php

get_footer();




