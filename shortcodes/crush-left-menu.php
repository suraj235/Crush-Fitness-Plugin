<?php


// Put the code of your snippet below this comment.
function left_menu_v2($atts)
{
	$atts = shortcode_atts(
		array(
			'name' => '',
			'image_src' => '',
			'device' => '',
		),
		$atts
	);
	$menu = $atts['name'];
	$icon = $atts['image_src'];
	$device = $atts['device'];
	$cond = crushfitness_customer_stage();
	// var_dump($cond);
	//$ques_cond = crush_questionnaire_data_function();
	// var_dump( $ques_cond);

// **************************** Menu for Desktop View **********************//
	if($device == 'Desktop'){
		$content = "<div class='left-menu desk-menu'>";
		$content .= "<ul>";
		/********** Dashboard ************/
		if($atts['name'] == 'Dashboard'){
			$content .= "<li><a href='/dashboard' style='color: #d3f800'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/Group-1910.svg'>Dashboard</a></li>";
		}
		else{
			$content .= "<li><a href='/dashboard'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_dashboard_2057781.svg'>Dashboard</a></li>";}
		/********* Upcoming Classes *******/
		if($atts['name'] == 'Upcoming Classes'){
			$content .= "<li><a href='/upcoming-classes' style='color: #d3f800'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_workout_1343029-1.svg'>Upcoming Classes</a></li>";}
		else{
			$content .= "<li><a href='/upcoming-classes'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_workout_1343029.svg'>Upcoming Classes</a></li>";}       /********* Group Classes *********/
		if ($cond == 2 || $cond == 3) //Conditional display Group Classes
		{
			if($atts['name'] == 'Group Classes'){
				$content .= "<li><a href='/classes'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_workout_1343029-1.svg'><p style='color: #d3f800'>Group Classes</p></a></li>";}
			else{
				$content .= "<li><a href='/classes'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_workout_1343029.svg'><p>Group Classes</p></a></li>";}
		}
		if ($cond == 1 || $cond == 3)
		{
			/********* Fitness Profile *********/
			if($atts['name'] == 'Fitness Profile'){
				$content .= "<li><a href='/fitness-profile'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_profile_339269-1.svg'><p style='color: #d3f800'>Fitness Profile</p></a></li>";}
			else{
				$content .= "<li><a href='/fitness-profile'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_profile_339269.svg'><p>Fitness Profile</p></a></li>";}
			/********* Fitness Lessons *********/
			if($atts['name'] == 'Fitness Lessons'){
				$content .= "<li><a href='/lessons'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/Group.svg'><p style='color: #d3f800'>Fitness Lessons</p></a></li>";}
			else{
				$content .= "<li><a href='/lessons'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_education_1476947.svg'><p>Fitness Lessons</p></a></li>";}
			/********* Workout Videos *********/
			if($atts['name'] == 'Workout Videos'){
				$content .= "<li><a href='/videos'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/Group-1569-1.svg'><p style='color: #d3f800'>Workout Videos</p></a></li>";}
			else{
				$content .= "<li><a href='/videos'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/Group-1569.svg'><p>Workout Videos</p></a></li>";}
		}
		if ($cond !== 0) //conditinal display Subscription
		{
			/********* Subscriptions *********/
			if($atts['name'] == 'Subscriptions'){
				$content .= "<li><a href='/subscriptions'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_subscribe_1175154-1.svg'><p style='color: #d3f800'>Subscriptions</p></a></li>";}
			else{
				$content .= "<li><a href='/subscriptions'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_subscribe_1175154.svg'><p>Subscriptions</p></a></li>";}
		}
		/********* Settings *********/
		if($atts['name'] == 'Settings'){
			$content .= "<li><a href='/account-setting' style='color: #d3f800'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_Settings_2324598-1.svg'>Settings</a></li>";}
		else{
			$content .= "<li><a href='/account-setting'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_Settings_2324598.svg'>Settings</a></li>";}
		/********* Logout *********/
		$content .= "<li style='display:flex'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/Group-1577-1.svg'>[wpv-logout-link]<p>Logout</p>[/wpv-logout-link]</li>";
		$content .= "</ul>";
		$content .= "</div>";}


// **************************** Menu for Mobile View **********************//

	if($device == 'Mobile'){
		$content = "<div class='left-menu mob-menu'>";
		$content .= "<ul class='accordion'>";
		$content .= "<li style='border-bottom: 0.5px solid #343333;'><div><a><img src='$icon'><p style='color: #d3f800'>$menu</p></a><img id='toggle-arrow' src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/Path-251.svg'></div></li>";
		$content .= "</ul>";

		$content .= "<ul class='newpanel'>";
		if($atts['name'] !== 'Dashboard'){
			$content .= "<li><a href='/dashboard'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_dashboard_2057781.svg'><p>Dashboard</p></a></li>";}
		if($atts['name'] !== 'Upcoming Classes'){
			$content .= "<li><a href='/upcoming-classes'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_workout_1343029.svg'><p>Upcoming Classes</p></a></li>";}
		if ($cond == 2 || $cond == 3) ///Conditional display Group Classes
		{
			if($atts['name'] !== 'Group Classes'){
				$content .= "<li><a href='/classes'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_workout_1343029.svg'><p>Group Classes</p></a></li>";}
		}
		if ($cond == 1 || $cond == 3)
		{
			if($atts['name'] !== 'Fitness Profile'){
				$content .= "<li><a href='/fitness-profile'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_profile_339269.svg'><p>Fitness Profile</p></a></li>";}
			if($atts['name'] !== 'Fitness Lessons'){
				$content .= "<li><a href='/lessons'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_education_1476947.svg'><p>Fitness Lessons</p></a></li>";}
			if($atts['name'] !== 'Workout Videos'){
				$content .= "<li><a href='/videos'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/Group-1569.svg'><p>Workout Videos</p></a></li>";}
		}
		if ($cond !== 0) //conditinal display Subscription
		{
			if($atts['name'] !== 'Subscriptions'){
				$content .= "<li><a href='/subscriptions'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_subscribe_1175154.svg'><p>Subscriptions</p></a></li>";}
		}
		if($atts['name'] !== 'Settings'){
			$content .= "<li><a href='/account-setting'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/noun_Settings_2324598.svg'><p>Settings</p></a></li>";}
		$content .= "<li style='display:flex'><img src='https://online.crushfitnessindia.com/wp-content/uploads/2020/04/Group-1577-1.svg'>[wpv-logout-link]<p>Logout</p>[/wpv-logout-link]</li>";
//  $content .= "<div>";
		$content .= "</ul>";
		$content .= "</div>";
		$content .= "<script>
  $(document).ready(function(){
  if (window.matchMedia('(max-width: 767px)').matches)
  {
    $('.accordion').click(function() {
    $('.accordion').toggleClass('active');
    $('.newpanel').slideToggle('active');
  });
  }
  });
  </script>";}
	//styling
	$content .= "<style>
  .footer
  {
     display: none !important;
  }
  .mob-menu
  {
    display: none;
  }
  .desk-menu
  {
    display: block;
  }
  .left-menu
  {
    background: #191818;
    color: #797979;
    font-weight: bold;
    height: 100%;
    width: 15%;
    position: fixed;
  }
  #toggle-arrow
  {
    display: none;
  }
  .left-menu ul li
  {
    padding: 20px;
    border-bottom: 0.5px solid #343333;
    display: flex;
    width: 100%;
  }
  .left-menu ul li:last-child 
  {
  border-bottom: none;
  }
  .left-menu ul li a
   {
      display: flex;
      font-size: 13px;
      color: #797979;
      width: 100%;
   }
  .left-menu ul li  img
  {
    margin-right: 15px;
  }
  .left-menu ul li  p
  {
    font-size: 13px;
  }
  .menus ul .signup
  {
    display: none !important;
  }
  .container-fluid
  {
    padding: 0 0 !important;
  }
  .row
  {
    margin: 0 0 !important;
  }
  @media only screen and (max-width: 728px)
  {
    .mob-menu
  {
    display: block;
  }
    .desk-menu
  {
    display: none;
  }
   .left-menu
   {
    position: static;
    width: 100%;
   }
   .left-menu ul li
   {
     padding: 20px 80px;
   }
  .accordion
  {
     height: 100%;
     transition: all .1s ease;
     outline: none;
  }
  .newpanel
  {
     display: none;
     width: 100%;
     overflow: hidden;
     overflow-y : auto;
     z-index: 90;
     outline: none;
     background: #191818;
  }
  .left-menu ul li:nth-child(1) div
  {
   display: flex;
  }
  .left-menu ul li  p
  {
    font-size: 15px;
  }
  .active
  {
    transition: all .1s ease;
  }
  #toggle-arrow
  {
     display: block;
     margin-left: 80px;
     margin-right: 0!important;
  }
  }
  </style>";

	return $content;
}
add_shortcode('left_menu_v2', 'left_menu_v2');