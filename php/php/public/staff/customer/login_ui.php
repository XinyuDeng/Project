<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title = 'Show Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
    <form name="login" action="login.php" method="post">
        <p>First_Name: <input type=text name="first_name"></p>
        <p>Password: <input type=password name="password"></p>
        <p><input type="submit" name="submit" value="Login"></p>
    </form>
    </body>
    </html>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>