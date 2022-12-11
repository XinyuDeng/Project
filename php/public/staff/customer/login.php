<?php

require_once('../../../private/initialize.php');
if(!isset($_POST['first_name'])) {
    redirect_to(url_for('/staff/customer/login_ui.php'));
}
$first_name = $_POST['first_name'];
$password = $_POST['password'];
// echo ($hash);
if(is_post_request()) {
    if ($first_name && $password){
//           $sql = "select * from customer where first_name = '$first_name' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
//           $result = mysqli_query($db,$sql);
//           $customer_id = $_GET['id'];
        $customer1 = find_customer_by_firstname($first_name);

        $hash = get_hash($customer1);
        if (password_verify($password, $hash)) {
            $customer2 = find_customer_by_password($password);
            if ($customer1 == $customer2){

                redirect_to(url_for('/staff/customer/show.php?id=' . h(u($customer1['customer_id']))));//如果成功跳转至welcome.html页面
            }
            else{
                echo "Wrong first_name or password!";
            }
        }

        else{
            echo "Wrong password!";
        }

//           $rows=mysqli_num_rows($result);
//           if($rows){
    }else{
        echo "Incomplete!";

    }
}

?>