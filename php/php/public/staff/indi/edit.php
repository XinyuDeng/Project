<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/indi/index.php'));
}
$spon_id = $_GET['id'];

if(is_post_request()) {

    // Handle form values sent by new.php

    $indi = [];
    $indi['spon_id'] = $spon_id;
    $indi['first_name'] = $_POST['first_name'] ?? '';
    $indi['last_name'] = $_POST['last_name'] ?? '';
    $indi['password'] = $_POST['password'] ?? '';


    $result = update_indi($indi);
    if($result === true) {
        redirect_to(url_for('/staff/indi/show.php?id=' . $spon_id));
    } else {
        $errors = $result;
        //var_dump($errors);
    }

} else {

    $indi = find_individual_by_id($spon_id);

}

$indi_set = find_all_individual();
$indi_count = mysqli_num_rows($indi_set);
mysqli_free_result($indi_set);

?>

<?php $page_title = 'Edit individual'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">

        <!--<a class="back-link" href="<?php echo url_for('/staff/indi/index.php'); ?>">&laquo; Back to List</a>
-->
        <div class="indi edit">
            <h1>Edit indi</h1>

            <?php echo display_errors($errors); ?>

            <form action="<?php echo url_for('/staff/indi/edit.php?id=' . h(u($spon_id))); ?>" method="post">
                <dl>
                    <dt>First Name:</dt>
                    <dd><input type="text" name="first_name" value="<?php echo h($indi['first_name']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Last Name:</dt>
                    <dd><input type="text" name="last_name" value="<?php echo h($indi['last_name']); ?>" /></dd>
                </dl>
                <dl>
                    <dt>Set Password:</dt>
                    <dd><input type="text" name="password" value="<?php echo h($indi['password']); ?>" /></dd>
                </dl>

                <div id="operations">
                    <input type="submit" value="Edit indi" />
                </div>
            </form>

        </div>

    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>