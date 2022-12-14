<?php

require_once('../../../private/initialize.php');
if(!isset($_POST['name'])) {
    redirect_to(url_for('/staff/org/login_ui.php'));
}
$name = $_POST['name'];
$password = $_POST['password'];
// echo ($hash);
if(is_post_request()) {
    if ($name && $password){
//           $sql = "select * from customer where first_name = '$first_name' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
//           $result = mysqli_query($db,$sql);
//           $customer_id = $_GET['id'];
        $org1 = find_organization_by_name($name);

        $hash = get_org_hash($org1);
        if (password_verify($password, $hash)) {
            $org2 = find_organization_by_password($password);
            if ($org1 == $org2){

                redirect_to(url_for('/staff/org/show.php?id=' . h(u($org1['spon_id']))));//如果成功跳转至welcome.html页面
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