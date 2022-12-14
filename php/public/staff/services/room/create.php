<?php

require_once('../../../../private/initialize.php');

if(is_post_request()){
    // Handle form values sent by new.php
    $cus_room = [];
    $cus_room['customer_id'] = $_POST['customer_id'] ?? '';
    $cus_room['room_id'] = $_POST['room_id'] ?? '';
    $cus_room['timeslot'] = $_POST['timeslot'] ?? '';
    $cus_room['date'] = $_POST['date'] ?? '';

    $result = insert_cus_room($cus_room);

    redirect_to(url_for('/staff/services/room/show.php?id=' . h(u($cus_room['customer_id']))));
}else{
    redirect_to(url_for('/staff/services/room/new.php'));
}

?>