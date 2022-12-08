<?php

require_once('../../../private/initialize.php');

if(is_post_request()){
	// Handle form values sent by new.php
	
	$first_name = $_POST['first_name'] ?? '';
	$last_name = $_POST['last_name'] ?? '';
	$password = $_POST['password'] ?? '';
	$nationality = $_POST['nationality'] ?? '';
	$gender = $_POST['gender'] ?? '';
	$addr_stree = $_POST['addr_stree'] ?? '';
	$addr_city = $_POST['addr_city'] ?? '';
	$addr_state = $_POST['addr_state'] ?? '';
	$zipcode = $_POST['zipcode'] ?? '';
	$email = $_POST['email'] ?? '';
	$contact_num = $_POST['contact_num'] ?? '';
    $eme_first_name = $_POST['eme_first_name'] ?? '';
    $eme_last_name = $_POST['eme_last_name'] ?? '';
    $eme_contact_num = $_POST['eme_contact_num'] ?? '';
	
//	echo "Form parameters<br />";
//	echo "Menu name: " . $menu_name . "<br />";
//	echo "Position: " . $position . "<br />";
//	echo "Visible: " . $visible . "<br />";
	
	$result = insert_customer($first_name, $last_name, $nationality, $gender, $addr_stree, $addr_city, $addr_state,
        $zipcode, $email, $contact_num, $eme_first_name, $eme_last_name, $eme_contact_num);
    $new_id = mysqli_insert_id($db);
  	redirect_to(url_for('/staff/customer/show.php?id=' . $new_id));
}else{
	redirect_to(url_for('/staff/customer/new.php'));
}

?>