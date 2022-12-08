<?php

require_once('../../private/initialize.php');

if(is_post_request()){
	// Handle form values sent by new.php
	
	$insur_name = $_POST['insur_name'] ?? '';
	$pfname = $_POST['pfname'] ?? '';
	$plname = $_POST['plname'] ?? '';
	$flight = $_POST['flight'] ?? '';
	$cfname = $_POST['cfname'] ?? '';
	
	$result = insert_record($insur_name, $pfname, $plname, $flight, $cfname);
    $new_id = mysqli_insert_id($db);
  	redirect_to(url_for('/insurance_plan/show.php?id=' . $new_id));
}else{
	redirect_to(url_for('/insurance_plan/new.php'));
}

?>show