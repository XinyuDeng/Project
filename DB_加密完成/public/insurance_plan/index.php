<?php require_once('../../private/initialize.php'); ?>

<?php

  $plan_set = find_all_plan();

?>

<?php $page_title = 'Plans'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div class="Plans listing">
    <h1>Plans</h1>

    <!--<div class="actions">
      <a class="action" href="<?php echo url_for('/staff/customer/new.php'); ?>">Create New Subject</a>
    </div>-->

  	<table class="list">
  	  <tr>
        <th>plan_id</th>
        <th>name</th>
        <th>description</th>
  	    <th>cost per person</th>
  	  </tr>

      <?php while($plan = mysqli_fetch_assoc($plan_set)) { ?>
        <tr>
          <td><?php echo h($plan['id']); ?></td>
          <td><?php echo h($plan['name']); ?></td>
    	  <td><?php echo h($plan['descrip']); ?></td>
    	  <td><?php echo h($plan['cost']); ?></td>
          </tr>
      <?php } ?>
  	</table>

      <ul>
          <li><a href="<?php echo url_for('/staff/customer/login_ui.php'); ?>">Shop Insurance</a></li>
          <li><a href="<?php echo url_for('/staff/customer/new.php'); ?>">Not A Customer? Register</a></li>
      </ul>

    <?php
      mysqli_free_result($plan_set);
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>