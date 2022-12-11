<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    $customer = [];
    $customer['first_name'] = $_POST['first_name'] ?? '';
    $customer['last_name'] = $_POST['last_name'] ?? '';
    $customer['password'] = $_POST['password'] ?? '';
    $customer['phone'] = $_POST['phone'] ?? '';
    $customer['email'] = $_POST['email'] ?? '';
    $customer['id_type'] = $_POST['id_type'] ?? '';
    $customer['id_num'] = $_POST['id_num'] ?? '';

    $result = insert_customer($customer);
    if($result === true) {
        $hash = password_hash($customer['password'], PASSWORD_BCRYPT);
        $new_id = mysqli_insert_id($db);
        insert_cus_hash($new_id, $customer['password'], $hash);
        redirect_to(url_for('/staff/customer/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }


} else {
    // display the blank form
    $customer = [];
    $customer['first_name'] = $_POST['first_name'] ?? '';
    $customer['last_name'] = $_POST['last_name'] ?? '';
    $customer['password'] = $_POST['password'] ?? '';
    $customer['phone'] = $_POST['phone'] ?? '';
    $customer['email'] = $_POST['email'] ?? '';
    $customer['id_type'] = $_POST['id_type'] ?? '';
    $customer['id_num'] = $_POST['id_num'] ?? '';
}

$customer_set = find_all_customer();
$customer_count = mysqli_num_rows($customer_set) + 1;
mysqli_free_result($customer_set);

?>

<?php $page_title = 'Create Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <div class="customer new">
            <h1>Create customer</h1>

            <?php echo display_errors($errors); ?>

            <form action="<?php echo url_for('/staff/customer/new.php'); ?>" method="post">
                <dl>
                    <dt>First Name:</dt>
                    <dd><input type="text" name="first_name" value="<?php echo h($customer['first_name']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Last Name:</dt>
                    <dd><input type="text" name="last_name" value="<?php echo h($customer['last_name']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Set Password:</dt>
                    <dd><input type="text" name="password" value="<?php echo h($customer['password']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Phone:</dt>
                    <dd><input type="text" name="nationality" value="<?php echo h($customer['phone']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Email:</dt>
                    <dd><input type="text" name="gender" value="<?php echo h($customer['email']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>ID_type:</dt>
                    <dd><input type="text" name="addr_city" value="<?php echo h($customer['id_type']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>ID_num:</dt>
                    <dd><input type="text" name="addr_state" value="<?php echo h($customer['id_num']); ?>" /></dd>
                </dl>
                <div id="operations">
                    <input type="submit" value="Create customer" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>