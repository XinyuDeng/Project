<?php

require_once('../../../../private/initialize.php');

if(is_post_request()){
    // Handle form values sent by new.php
    $semi_aur = [];
    $semi_aur['invitation_id'] = $_POST['invitation_id'] ?? '';
    $semi_aur['event_id'] = $_POST['event_id'] ?? '';
    $semi_aur['aur_id'] = $_POST['aur_id'] ?? '';

    $result = insert_semi_aur($semi_aur);

    redirect_to(url_for('/staff/services/seminar/show.php?id=' . h(u($semi_aur['invitation_id']))));
}else{
    redirect_to(url_for('/staff/services/seminar/new.php'));
}

?>