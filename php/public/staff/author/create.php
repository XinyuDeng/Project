<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {
    // Handle form values sent by new.php

    $author = [];
    $author['first_name'] = $_POST['first_name'] ?? '';
    $author['last_name'] = $_POST['last_name'] ?? '';
    $author['password'] = $_POST['password'] ?? '';
    $author['street'] = $_POST['street'] ?? '';
    $author['city'] = $_POST['city'] ?? '';
    $author['state'] = $_POST['state'] ?? '';
    $author['country'] = $_POST['country'] ?? '';
    $author['email'] = $_POST['email'] ?? '';

//    echo "Form parameters<br />";
//    echo "Menu name: " . $menu_name . "<br />";
//    echo "Position: " . $position . "<br />";
//    echo "Visible: " . $visible . "<br />";

    $result = insert_customer($author);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('/staff/author/show.php?id=' . $new_id));
}else{
    redirect_to(url_for('/staff/author/new.php'));
}

?>