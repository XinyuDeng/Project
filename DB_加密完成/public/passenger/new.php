<?php

require_once('../../private/initialize.php');

if(is_post_request()) {

    $pass_info = [];
    $pass_info['first_name'] = $_POST['first_name'] ?? '';
    $pass_info['last_name'] = $_POST['last_name'] ?? '';
    $pass_info['DOB'] = $_POST['DOB'] ?? '';
    $pass_info['nationality'] = $_POST['nationality'] ?? '';
    $pass_info['gender'] = $_POST['gender'] ?? '';
    $pass_info['passport_num'] = $_POST['passport_num'] ?? '';
    $pass_info['passport_expiry_date'] = $_POST['passport_expiry_date'] ?? '';

    $result = insert_passenger($pass_info);

    if($result === true){
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/passenger/show.php?id=' .$new_id));
    } else {
        $errors = $result;
    }

} else {
    // display the blank form
    $pass_info = [];

    $pass_info['first_name'] = '';
    $pass_info['last_name'] = '';
    $pass_info['DOB'] = '';
    $pass_info['nationality'] = '';
    $pass_info['gender'] = '';
    $pass_info['passport_num'] = '';
    $pass_info['passport_expiry_date'] = '';

}


?>

<?php $page_title = 'Add Passenger'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <div class="passenger new">
        <h1>Add passenger</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for('/passenger/new.php'); ?>" method="post">
            <dl>
                <dt>First Name:</dt>
                <dd><input type="text" name="first_name" value="<?php echo h($pass_info['first_name']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Last Name:</dt>
                <dd><input type="text" name="last_name" value="<?php echo h($pass_info['last_name']); ?>" /></dd>
            </dl>
            <dl>

                <dl>
                    <dt>Date of Birth:</dt>
                    <dd><input type="date" name="DOB" value="<?php echo h($pass_info['DOB']); ?>"/></dd>
                </dl>

                <dt>Nationality:</dt>
                <dd><input type="text" name="nationality" value="<?php echo h($pass_info['nationality']); ?>" /></dd>
            </dl>
            <dl>
                <dt>Gender:</dt>
                <dd><input type="text" name="gender" value="<?php echo h($pass_info['gender']); ?>" /></dd>
            </dl>
            <dl>
                <dl>
                    <dt>Passport Number:</dt>
                    <dd><input type="text" name="passport_num" value="<?php echo h($pass_info['passport_num']); ?>"/></dd>
                </dl>

                <dl>
                    <dt>Passport Expiry Date:</dt>
                    <dd><input type="date" name="passport_expiry_date" value="<?php echo h($pass_info['passport_expiry_date']); ?>"/></dd>
                </dl>
            <div id="operations">
                <input type="submit" value="Create customer" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
