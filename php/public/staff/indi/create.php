<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {
    // Handle form values sent by new.php

    $indi = [];
    $indi['fname'] = $_POST['fname'] ?? '';
    $indi['lname'] = $_POST['lname'] ?? '';

//    echo "Form parameters<br />";
//    echo "Menu name: " . $menu_name . "<br />";
//    echo "Position: " . $position . "<br />";
//    echo "Visible: " . $visible . "<br />";

    $result = insert_individual($indi);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/indi/show.php?id=' . $new_id));
}else{
    redirect_to(url_for('/staff/indi/new.php'));
}

?>