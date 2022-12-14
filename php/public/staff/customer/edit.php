<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/customer/index.php'));
}
$customer_id = $_GET['id'];

if(is_post_request()) {

    // Handle form values sent by new.php

    $customer = [];
    $customer['customer_id'] = $customer_id;
    $customer['first_name'] = $_POST['first_name'] ?? '';
    $customer['last_name'] = $_POST['last_name'] ?? '';
    $customer['cus_pass'] = $_POST['password'] ?? '';
    $customer['phone'] = $_POST['phone'] ?? '';
    $customer['id_type'] = $_POST['id_type'] ?? '';
    $customer['email'] = $_POST['email'] ?? '';
    $customer['id_number'] = $_POST['id_number'] ?? '';


    $result = update_customer($customer);
    if($result === true) {
        redirect_to(url_for('/staff/customer/show.php?id=' . $customer_id));
    } else {
        $errors = $result;
        //var_dump($errors);
    }

} else {

    $customer = find_customer_by_id($customer_id);

}

$customer_set = find_all_customer();
$customer_count = mysqli_num_rows($customer_set);
mysqli_free_result($customer_set);

?>
<?php print_r($customer); ?>
<?php $page_title = 'Edit customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <!--<a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>
-->
        <div class="customer edit">
            <h1>Edit customer</h1>

            <?php echo display_errors($errors); ?>

            <form action="<?php echo url_for('/staff/customer/edit.php?id=' . h(u($customer_id))); ?>" method="post">
                <dl>
                    <dt>First Name:</dt>
                    <dd><input type="text" name="first_name" value="<?php echo h($customer['first_name']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Last Name:</dt>
                    <dd><input type="text" name="last_name" value="<?php echo h($customer['last_name']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Password:</dt>
                    <dd><input type="text" name="password" value="<?php echo h($customer['cus_pass']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Phone:</dt>
                    <dd><input type="text" name="phone" value="<?php echo h($customer['phone']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Email:</dt>
                    <dd><input type="text" name="email" value="<?php echo h($customer['email']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>ID Type:</dt>
                    <dd><input type="text" name="id_type" value="<?php echo h($customer['id_type']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>ID Number:</dt>
                    <dd><input type="text" name="id_number" value="<?php echo h($customer['id_number']); ?>" /></dd>
                </dl>

                <div id="operations">
                    <input type="submit" value="Edit Customer" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>