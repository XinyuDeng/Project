<?php require_once('../../private/initialize.php'); ?>

<?php

  $shop_record = find_all_shoprecord();

?>

<?php $page_title = 'Shopping Records'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="Shopping listing">
    <h1>Shopping Records</h1>


  	<table class="list">
  	  <tr>
        <th>id</th>
        <th>insurance name</th>
        <th>passenger first name</th>
  	    <th>passenger last name</th>
  	    <th>flight</th>
  	    <th>customer first name</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($record = mysqli_fetch_assoc($shop_record)) { ?>
        <tr>
          <td><?php echo h($record['id']); ?></td>
          <td><?php echo h($record['insur_name']); ?></td>
    	  <td><?php echo h($record['pfname']); ?></td>
    	  <td><?php echo h($record['plname']); ?></td>
    	  <td><?php echo h($record['flight']); ?></td>
    	  <td><?php echo h($record['cfname']); ?></td>
    	  <td><a class="action" href="<?php echo url_for('/insurance_plan/edit.php?id=' . h(u($record['id']))); ?>">Edit</a></td>
        <td><a class="action" href="<?php echo url_for('/insurance_plan/delete.php?id=' . h(u($record['id']))); ?>">Delete</a></td>
          </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($shop_record);
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>