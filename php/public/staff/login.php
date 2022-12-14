<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">
        <div id="main-menu">
            <h2>You are a:</h2>
            <ul>
                <li><a href="<?php echo url_for('/staff/manager/login_ui.php'); ?>">Manager</a></li>
                <li><a href="<?php echo url_for('/staff/customer/login_ui.php'); ?>">Customer</a></li>
                <li><a href="<?php echo url_for('/staff/author/login_ui.php'); ?>">Author</a></li>
                <li><a href="<?php echo url_for('/staff/indi/login_ui.php'); ?>">Individual</a></li>
                <li><a href="<?php echo url_for('/staff/org/login_ui.php'); ?>">Organization</a></li>
            </ul>
        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>