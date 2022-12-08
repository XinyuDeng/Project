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
  $customer['password'] = $_POST['password'] ?? '';
  $customer['nationality'] = $_POST['nationality'] ?? '';
  $customer['gender'] = $_POST['gender'] ?? '';
  $customer['addr_stree'] = $_POST['addr_stree'] ?? '';
  $customer['addr_city'] = $_POST['addr_city'] ?? '';
  $customer['addr_state'] = $_POST['addr_state'] ?? '';
  $customer['zipcode'] = $_POST['zipcode'] ?? '';
  $customer['email'] = $_POST['email'] ?? '';
  $customer['contact_num'] = $_POST['contact_num'] ?? '';


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
        <dt>First Name</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($customer['first_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Last Name</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($customer['last_name']); ?>" /></dd>
      </dl>
      <dl>
        <dt>password</dt>
        <dd><input type="text" name="password" value="<?php echo h($customer['password']); ?>" /></dd>
      </dl>
      <dl>
        <dt>nationality</dt>
        <dd><input type="text" name="nationality" value="<?php echo h($customer['nationality']); ?>" /></dd>
      </dl>
      <dl>
        <dt>gender</dt>
        <dd><input type="text" name="gender" value="<?php echo h($customer['gender']); ?>" /></dd>
      </dl>
      <dl>
        <dt>addr_stree</dt>
        <dd><input type="text" name="addr_stree" value="<?php echo h($customer['addr_stree']); ?>" /></dd>
      </dl>
      <dl>
        <dt>addr_city</dt>
        <dd><input type="text" name="addr_city" value="<?php echo h($customer['addr_city']); ?>" /></dd>
      </dl>
      <dl>
        <dt>addr_state</dt>
        <dd><input type="text" name="addr_state" value="<?php echo h($customer['addr_state']); ?>" /></dd>
      </dl>
      <dl>
        <dt>zipcode</dt>
        <dd><input type="text" name="zipcode" value="<?php echo h($customer['zipcode']); ?>" /></dd>
      </dl>
      <dl>
        <dt>email</dt>
        <dd><input type="text" name="email" value="<?php echo h($customer['email']); ?>" /></dd>
      </dl>
      <dl>
        <dt>contact_num</dt>
        <dd><input type="text" name="contact_num" value="<?php echo h($customer['contact_num']); ?>" /></dd>
      </dl>

      <div id="operations">
        <input type="submit" value="Edit Customer" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>