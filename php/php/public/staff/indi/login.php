<?php

require_once('../../../private/initialize.php');
if(!isset($_POST['first_name'])) {
    redirect_to(url_for('/staff/indi/login_ui.php'));
}
$first_name = $_POST['first_name'];
$password = $_POST['password'];
// echo ($hash);
if(is_post_request()) {
    if ($first_name && $password){
//           $sql = "select * from customer where first_name = '$first_name' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
//           $result = mysqli_query($db,$sql);
//           $customer_id = $_GET['id'];
        $indi1 = find_individual_by_firstname($first_name);

        $hash = get_indi_hash($indi1);
        if (password_verify($password, $hash)) {
            $indi2 = find_individual_by_password($password);
            if ($indi1 == $indi2){

                redirect_to(url_for('/staff/indi/show.php?id=' . h(u($indi1['spon_id']))));//如果成功跳转至welcome.html页面
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