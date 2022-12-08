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
      <li><a href="<?php echo url_for('/passenger/index.php'); ?>">View Passengers</a></li>
      <li><a href="<?php echo url_for('/insurance_plan/shoplist.php'); ?>">Shopping Records</a></li>
      <li><a href="<?php echo url_for('/invoice/index.php'); ?>">View Invoice</a></li>
      <li><a href="<?php echo url_for('/payment/index.php'); ?>">Payment Record</a></li>
  </ul>

</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>