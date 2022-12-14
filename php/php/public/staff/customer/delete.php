<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/index.php'));
}
$customer_id = $_GET['id'];

if(is_post_request()) {

    $result = delete_customer($customer_id);
    redirect_to(url_for('/staff/index.php'));

} else {
    $customer = find_customer_by_id($customer_id);
}

?>

<?php $page_title = 'Delete customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/staff/index.php'); ?>">&laquo; Back to List</a>

    <div class="customer delete">
        <h1>Delete customer</h1>
        <p>Are you sure you want to delete this customer?</p>
        <p class="item"><?php echo h($customer['first_name']); ?></p>

        <form action="<?php echo url_for('/staff/customer/delete.php?id=' . h(u($customer['customer_id']))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete customer" />
            </div>
        </form>
    </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
