<?php require_once('../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0
$record = find_record_by_id($id);

?>

<?php $page_title = 'Show Shop Record'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

 <!-- <a class="back-link" href="<?php echo url_for('/staff/customer/index.php'); ?>">&laquo; Back to List</a>
-->
  <div class="Customer show">

    <h1>Customer First Name: <?php echo h($record['cfname']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Passenger First Name:</dt>
        <dd><?php echo h($record['pfname']); ?></dd>
      </dl>
      <dl>
        <dt>Passenger Last Name:</dt>
        <dd><?php echo h($record['plname']); ?></dd>
      </dl>
      <dl>
        <dt>Flight:</dt>
        <dd><?php echo h($record['flight']); ?></dd>
      </dl>
      <dl>
        <dt>Insurance Name:</dt>
        <dd><?php echo h($record['insur_name']); ?></dd>
      </dl>
    </div>

  </div>
  <ul>
        <li><a href="<?php echo url_for('/insurance_plan/new.php?id=' . h($record['id'])); ?>">Keep Shopping</a></li>
    	<li><a href="<?php echo url_for('/insurance_plan/edit.php?id=' . h($record['id'])); ?>">Edit</a></li>
    	<li><a href="<?php echo url_for('/insurance_plan/delete.php?id=' . h($record['id'])); ?>">Delete</a></li>
   </ul>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>