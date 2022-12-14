<?php require_once('../../../private/initialize.php'); ?>

<?php

$customer_set = find_all_customer();

?>

<?php $page_title = 'Manager Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">
        <div class="Manager">
            <h1>Manager Menu</h1>
        </div>
        <ul>
            <li><a href="<?php echo url_for('/staff/customer/index.php'); ?>">View Customers</a></li>
            <li><a href="<?php echo url_for('/staff/author/index.php'); ?>">View Authors</a></li>
            <li><a href="<?php echo url_for('/staff/indi/index.php'); ?>">View Individuals</a></li>
            <li><a href="<?php echo url_for('/staff/org/index.php'); ?>">View Organizations</a></li>
        </ul>

    </div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>