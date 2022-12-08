<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/insurance_plan/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $record = [];
  $record['id'] = $id;
  $record['insur_name'] = $_POST['insur_name'] ?? '';
  $record['pfname'] = $_POST['pfname'] ?? '';
  $record['plname'] = $_POST['plname'] ?? '';
  $record['flight'] = $_POST['flight'] ?? '';
  $record['cfname'] = $_POST['cfname'] ?? '';

  $result = update_record($record);
  if($result === true) {
    redirect_to(url_for('/insurance_plan/show.php?id=' . $id));
  } else {
    $errors = $result;
    //var_dump($errors);
  }

} else {

  $record = find_record_by_id($id);

}

$record_set = find_all_shoprecord();
$record_count = mysqli_num_rows($record_set);
mysqli_free_result($record_set);

?>

<?php $page_title = 'Edit Shop Recprd'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <!--<a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>
-->
  <div class="Edit Shop Record">
    <h1>Edit Shop Record</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/insurance_plan/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Insurance Name</dt>
        <dd>
          <input type="text" name="insur_name" value="<?php echo h($record['insur_name']); ?>" />
        </dd>
      </dl>
      <?php echo "Trip Cancellation, Trip Interruption, Medical Insurance, Baggage Insurance, Accidential Death Insurance or All-inclusive Insurance."?>
      <dl>
        <dt>pfname</dt>
        <dd><input type="text" name="pfname" value="<?php echo h($record['pfname']); ?>" /></dd>
      </dl>
      <dl>
        <dt>plname</dt>
        <dd><input type="text" name="plname" value="<?php echo h($record['plname']); ?>" /></dd>
      </dl>
      <dl>
        <dt>flight</dt>
        <dd><input type="text" name="flight" value="<?php echo h($record['flight']); ?>" /></dd>
      </dl>
      <dl>
        <dt>cfname</dt>
        <dd><input type="text" name="cfname" value="<?php echo h($record['cfname']); ?>" /></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit Shop Record" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>