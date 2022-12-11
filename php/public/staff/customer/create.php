<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {
    // Handle form values sent by new.php

    $customer = [];
    $customer['first_name'] = $_POST['first_name'] ?? '';
    $customer['last_name'] = $_POST['last_name'] ?? '';
    $customer['password'] = $_POST['password'] ?? '';
    $customer['phone'] = $_POST['phone'] ?? '';
    $customer['email'] = $_POST['email'] ?? '';
    $customer['id_type'] = $_POST['id_type'] ?? '';
    $customer['id_num'] = $_POST['id_num'] ?? '';

//    echo "Form parameters<br />";
//    echo "Menu name: " . $menu_name . "<br />";
//    echo "Position: " . $position . "<br />";
//    echo "Visible: " . $visible . "<br />";

    $result = insert_customer($customer);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/customer/show.php?id=' . $new_id));
}else{
    redirect_to(url_for('/staff/customer/new.php'));
}
redirect_to(url_for('/staff/customer/new.php'));
?>