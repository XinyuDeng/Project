<?php
require_once('../../private/initialize.php');

if(is_post_request()) {
	$record = [];
	$record['insur_name'] = $_POST['insur_name'] ?? '';
	$record['pfname'] = $_POST['pfname'] ?? '';
	$record['plname'] = $_POST['plname'] ?? '';
	$record['flight'] = $_POST['flight'] ?? '';
	$record['cfname'] = $_POST['cfname'] ?? '';

    $result = insert_record($record);

    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        insert_invoice($record['insur_name'], $record['cfname']);
        redirect_to(url_for('/insurance_plan/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }
} else {
  // display the blank form
    $record = [];
    $pass_info = [];
	$record['insur_name'] = '';
	$record['pfname'] = '';
	$record['plname'] = '';
	$record['flight'] = '';
	$record['cfname'] = '';
}


$record_set = find_all_shoprecord();
$record_count = mysqli_num_rows($record_set) + 1;
mysqli_free_result($record_set);

?>

<?php $page_title = 'Shop Insurance'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <div class="shopping record new">
    <h1>Shop Insurance</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/insurance_plan/new.php'); ?>" method="post">
      <dl>
        <dt>Insurance Name:</dt>
        <dd>
          <select name="insur_name">
          <?php
            $plan_set = find_all_plan();
            while($plan = mysqli_fetch_assoc($plan_set)) {
              echo "<option value=\"" . h($plan['name']) . "\"";
              if($record["insur_name"] == $plan['name']) {
                echo " selected";
              }
              echo ">" . h($plan['name']) . "</option>";
            }
            mysqli_free_result($plan_set);
          ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Passenger First Name:</dt>
        <dd><input type="text" name="pfname" value="<?php echo h($record['pfname']); ?>"/></dd>
      </dl>
      <dl>
        <dt>Passenger Last Name:</dt>
        <dd><input type="text" name="plname" value="<?php echo h($record['plname']); ?>"/></dd>
      </dl>

      <dl>
        <dt>Flight:</dt>
        <dd><input type="text" name="flight" value="<?php echo h($record['flight']); ?>" /></dd>
      </dl>
      <dl>
        <dt>cfname:</dt>
        <dd><input type="text" name="cfname" value="<?php echo h($record['cfname']); ?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Shop Insurance" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>