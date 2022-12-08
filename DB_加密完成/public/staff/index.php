<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
    	<li><a href="<?php echo url_for('/staff/customer/create.php'); ?>">Register</a></li>
    	<li><a href="<?php echo url_for('/staff/customer/login_ui.php'); ?>">Login</a></li>
        <li><a href="<?php echo url_for('/insurance_plan/index.php'); ?>">Insurance Product Introduction</a></li>
        <li><a href="<?php echo url_for('/staff/manager/login_ui.php'); ?>">Manager Login</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
