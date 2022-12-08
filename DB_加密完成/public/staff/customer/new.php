<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {

  $customer = [];
  $pass_info = [];
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
  $customer['eme_first_name'] = $_POST['eme_first_name'] ?? '';
  $customer['eme_last_name'] = $_POST['eme_last_name'] ?? '';
  $customer['eme_contact_num'] = $_POST['eme_contact_num'] ?? '';
  $pass_info['first_name'] = $customer['first_name'] ?? '';
  $pass_info['last_name'] = $customer['last_name'] ?? '';
  $pass_info['DOB'] = $_POST['DOB'] ?? '';
  $pass_info['nationality'] = $customer['nationality'] ?? '';
  $pass_info['gender'] = $customer['gender'] ?? '';
  $pass_info['passport_num'] = $_POST['passport_num'] ?? '';
  $pass_info['passport_expiry_date'] = $_POST['passport_expiry_date'] ?? '';

  $if_pass = insert_passenger($pass_info);

  if($if_pass === true){
      $result = insert_customer($customer);
      $if_member = isset($_POST['member_check']);
      $if_agent = isset($_POST['agent_check']);

      if($result === true) {
          $hash = password_hash($customer['password'], PASSWORD_BCRYPT);
          $new_id = mysqli_insert_id($db);
          insert_hash($new_id, $customer['password'], $hash);
          if(!$if_member and !$if_agent) {
              redirect_to(url_for('/staff/customer/show.php?id=' . $new_id));
          }
          elseif ($if_member) {
              redirect_to(url_for('/staff/customer/member.php?id=' . $new_id));
          }

          elseif ($if_agent) {
              redirect_to(url_for('/staff/customer/agent.php?id=' . $new_id));
          }
  }

  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $customer = [];
  $pass_info = [];
  $customer['first_name'] = '';
  $customer['last_name'] = '';
	$customer['password'] = '';
	$customer['nationality'] = '';
	$customer['gender'] = '';
    $pass_info['DOB'] = '';
    $pass_info['passport_num'] = '';
    $pass_info['passport_expiry_date'] = '';
	$customer['addr_stree'] = '';
	$customer['addr_city'] = '';
	$customer['addr_state'] = '';
	$customer['zipcode'] = '';
	$customer['email'] = '';
	$customer['contact_num'] = '';
    $customer['eme_first_name'] = '';
    $customer['eme_last_name'] = '';
    $customer['eme_contact_num'] = '';
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

      <dl>
          <dt>Date of Birth:</dt>
          <dd><input type="date" name="DOB" value="<?php echo h($pass_info['DOB']); ?>"/></dd>
      </dl>

        <dt>Set Password:</dt>
        <dd><input type="text" name="password" value="<?php echo h($customer['password']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Nationality:</dt>
        <dd><input type="text" name="nationality" value="<?php echo h($customer['nationality']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Gender:</dt>
        <dd><input type="text" name="gender" value="<?php echo h($customer['gender']); ?>" /></dd>
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

        <dt>Address:</dt>
        <dd><input type="text" name="addr_stree" value="<?php echo h($customer['addr_stree']); ?>" /></dd>
      </dl>
      <dl>
        <dt>City:</dt>
        <dd><input type="text" name="addr_city" value="<?php echo h($customer['addr_city']); ?>" /></dd>
      </dl>
      <dl>
        <dt>State:</dt>
        <dd><input type="text" name="addr_state" value="<?php echo h($customer['addr_state']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Zipcode:</dt>
        <dd><input type="number" name="zipcode" value="<?php echo h($customer['zipcode']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Email:</dt>
        <dd><input type="text" name="email" value="<?php echo h($customer['email']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Contact Number:</dt>
        <dd><input type="text" name="contact_num" value="<?php echo h($customer['contact_num']); ?>" /></dd>
      </dl>
        <dl>
            <dt>Emergency First Name:</dt>
            <dd><input type="text" name="eme_first_name" value="<?php echo h($customer['eme_first_name']); ?>" /></dd>
        </dl>
        <dl>
            <dt>Emergency Last Name:</dt>
            <dd><input type="text" name="eme_last_name" value="<?php echo h($customer['eme_last_name']); ?>" /></dd>
        </dl>
        <dl>
            <dt>Emergency Contact Number:</dt>
            <dd><input type="text" name="eme_contact_num" value="<?php echo h($customer['eme_contact_num']); ?>" /></dd>
        </dl>

        <dl>
            <dt>Member ?:</dt>
            <dd><input type="checkbox" name="member_check" /></dd>
        </dl>

        <dl>
            <dt>Agent ?:</dt>
            <dd><input type="checkbox" name="agent_check" /></dd>
        </dl>

      <div id="operations">
        <input type="submit" value="Create customer" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>