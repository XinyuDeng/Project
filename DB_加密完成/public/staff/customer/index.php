<?php require_once('../../../private/initialize.php'); ?>

<?php

  $customer_set = find_all_customer();

?>

<?php $page_title = 'Customers'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="customers listing">
    <h1>Customers</h1>

    <!--<div class="actions">
      <a class="action" href="<?php echo url_for('/staff/customer/new.php'); ?>">Create New Subject</a>
    </div>-->

  	<table class="list">
  	  <tr>
        <th>customer_id</th>
        <th>first_name</th>
        <th>last_name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($customer = mysqli_fetch_assoc($customer_set)) { ?>
        <tr>
          <td><?php echo h($customer['customer_id']); ?></td>
          <td><?php echo h($customer['first_name']); ?></td>
    	  	<td><?php echo h($customer['last_name']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/customer/show.php?id=' . h(u($customer['customer_id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/customer/edit.php?id=' . h(u($customer['customer_id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/customer/delete.php?id=' . h(u($customer['customer_id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($customer_set);
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
