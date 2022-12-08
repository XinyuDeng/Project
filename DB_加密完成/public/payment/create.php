<?php

require_once('../../private/initialize.php');

if(is_post_request()){
    // Handle form values sent by new.php

    $pay_date = $_POST['pay_date'] ?? '';
    $amount = $_POST['amount'] ?? '';
    $method = $_POST['method'] ?? '';
    $card_num = $_POST['card_num'] ?? '';
    $name_on_card_first = $_POST['name_on_card_first'] ?? '';
    $name_on_card_last = $_POST['name_on_card_last'] ?? '';
    $expiry_date = $_POST['expiry_date'] ?? '';

    $result = insert_payment($pay_date,$amount, $method, $card_num, $name_on_card_first, $name_on_card_last, $expiry_date);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/payment/show.php?id=' . $new_id));
}else{
    redirect_to(url_for('/payment/new.php'));
}

?>