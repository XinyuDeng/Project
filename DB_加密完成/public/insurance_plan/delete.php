<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/insurance_plan/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_record($id);
  redirect_to(url_for('/insurance_plan/index.php'));

} else {
  $record = find_record_by_id($id);
}

?>

<?php $page_title = 'Delete Record'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="record delete">
    <h1>Delete Shopping Record</h1>
    <p>Are you sure you want to delete this shopping record?</p>
    <p class="item"><?php echo h($record['insur_name']); ?></p>

    <form action="<?php echo url_for('/insurance_plan/delete.php?id=' . h(u($record['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete record" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
