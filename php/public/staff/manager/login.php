<?PHP

require_once('../../../private/initialize.php');
if(!isset($_POST['username'])) {
    redirect_to(url_for('/staff/manager/login_ui.php'));
}
$username = $_POST['username'];
$password = $_POST['password'];

if(is_post_request()) {
    if ($username && $password){
//           $sql = "select * from customer where first_name = '$first_name' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
//           $result = mysqli_query($db,$sql);
//           $passenger_id = $_GET['id'];
        $manager1 = find_manager_by_username($username);
        $manager2 = find_manager_by_password($password);

        if ($manager1 == $manager2){
            redirect_to(url_for('/staff/manager/index.php'));
        }
        else{
            echo "Wrong username or password!";
        }
    }else{
        echo "Imcomplete!";

    }
}

?>