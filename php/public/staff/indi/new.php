<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

    $indi = [];
    $indi['fname'] = $_POST['fname'] ?? '';
    $indi['lname'] = $_POST['lname'] ?? '';
    $indi['password'] = $_POST['password'] ?? '';

    $result = insert_individual($indi);
    if($result === true) {
        $hash = password_hash($indi['password'], PASSWORD_BCRYPT);
        $new_id = mysqli_insert_id($db);
        insert_indi_hash($new_id, $indi['password'], $hash);
        redirect_to(url_for('/staff/indi/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }


} else {
    // display the blank form
    $indi = [];
    $indi['fname'] = $_POST['fname'] ?? '';
    $indi['lname'] = $_POST['lname'] ?? '';
    $indi['password'] = $_POST['password'] ?? '';
}

$indi_set = find_all_individual();
$indi_count = mysqli_num_rows($indi_set) + 1;
mysqli_free_result($indi_set);

?>

<?php $page_title = 'Create Individual'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <div class="individual new">
            <h1>Create individual</h1>

            <?php echo display_errors($errors); ?>

            <form action="<?php echo url_for('/staff/indi/new.php'); ?>" method="post">
                <dl>
                    <dt>First Name:</dt>
                    <dd><input type="text" name="fname" value="<?php echo h($indi['fname']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Last Name:</dt>
                    <dd><input type="text" name="lname" value="<?php echo h($indi['lname']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Set Password:</dt>
                    <dd><input type="text" name="password" value="<?php echo h($indi['password']); ?>" /></dd>
                </dl>

                <div id="operations">
                    <input type="submit" value="Create individual" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>